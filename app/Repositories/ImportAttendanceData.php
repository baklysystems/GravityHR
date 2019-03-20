<?php

/**
 * Created by PhpStorm.
 * User: Kanak
 * Date: 13/8/16
 * Time: 10:43 PM
 */

namespace App\Repositories;


use App\EmployeeLeaves;
use App\Models\AttendanceManager;
use App\Models\Employee;
use App\Models\Holiday;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportAttendanceData
{
    var $attendance_data = [];

    /**
     * @param $filename
     */
    public function Import($filename)
    {
        Excel::load(storage_path('attendance/' . $filename), function ($reader)
        {

            // Initial variables
            $all_emp_shifts = $this->getEmployeeShifts();
            $all_work_shifts = $this->getAllShifts();
            $current_date = (object)[
                'in_time' => null,
                'out_time'  => null
            ];
            $in_time = null;
            $out_time = null;
            $debug = false;
            $cutoff_start_date = null;
            $cutoff_end_date = null;

            //$rows = $reader->get(['name', 'code', 'date', 'days', 'in_time', 'out_time', 'hours_worked', 'over_time', 'status']);
            $rows = $reader->get(['name', 'code', 'date_time']);

            $counter = 0;
            $saturdays = 0;
            $totalSaturdaysBetweenDates = 0;
            $saturdayWithoutNotice = 0;
            foreach($rows as $row)
            {
                // Set cutoff start date
                if ($cutoff_start_date == null) $cutoff_start_date = date('n/j/Y', strtotime($row->date_time));

                // Define missing data
                $row->date = date('n/j/Y', strtotime($row->date_time));
                $row->days = date('l', strtotime($row->date_time));
                $row->in_time = null;
                $row->out_time = null;
                $row->hours_worked = 0;
                $row->over_time = null;
                $row->status = 'A';
                $row->leave_status = '';

                $emp_shift = $this->getEmployeeShift($row->code, $all_emp_shifts);
                if ($emp_shift !== false) {

                    // If date in/out is empty, set new date
                    if ($current_date->in_time == null && $current_date->out_time == null) $current_date = $row;
                    
                    // Get shift details
                    $shift_details = $this->getShiftDetails($emp_shift->shift_id, $all_work_shifts);

                    // Determine the TIME IN
                    // Get the earliest time in given a 4-hr allowance of the shift time
                    if ($current_date->in_time == null) {
                        $shift_date = $current_date->date . ' ' . $shift_details->in_time;
                        $shift_in = strtotime($current_date->date . ' ' . $shift_details->in_time . ' -4 hours');   // 4 hours earlier for allowance
                        $shift_out = strtotime($current_date->date . ' ' . $shift_details->in_time . ' +6 hours');
                        $emp_time_in = strtotime($row->date_time);
                        
                        // 1st condition assumes same day
                        if (($emp_time_in > $shift_in) && ($emp_time_in < $shift_out)) {
                            $current_date->in_time = $row->date_time;

                            if ($debug) echo '<span style="color:green">' . $row->name . ' ' . $shift_date . ' - ' .  $row->date_time . '(IN)</span> <br>';
                        }
                        else {
                            // Check if time in crosses over past midnight
                            $previous_date = date('n/j/Y', strtotime($current_date->date . ' -1 day'));
                            $shift_in = strtotime($previous_date . ' ' . $shift_details->in_time);
                            $shift_out = strtotime($previous_date . ' ' . $shift_details->in_time . ' +6 hours');

                            // Also check if previous date doesn't exist already
                            if (($emp_time_in > $shift_in) && ($emp_time_in < $shift_out) && !$this->isAttendanceDateExist($previous_date, $row->code)) {
                                $current_date->date = $previous_date;
                                $current_date->in_time = $row->date_time;
                                $shift_date = $current_date->date . ' ' . $shift_details->in_time;

                                if ($debug) echo '<span style="color:red">' . $row->name . ' ' . $shift_date . ' - ' .  $row->date_time . '(IN2)</span> <br>';
                            }
                            else {
                                if ($debug) echo $row->name . ' ' . $shift_date . ' - ' .  $row->date_time . ' ------ <br>';
                            }
                        }
                    }

                    // Determine the TIME OUT
                    $shift_date = $current_date->date . ' ' . $shift_details->out_time;
                    $shift_in = strtotime($current_date->date . ' ' . $shift_details->in_time . ' +4 hours');   //threshold
                    $shift_out = strtotime($current_date->date . ' ' . $shift_details->in_time . ' +12 hours');
                    $emp_time_out = strtotime($row->date_time);

                    // If time is within work period
                    if (($emp_time_out > $shift_in) && ($emp_time_out < $shift_out)) {
                        $current_date->out_time = $row->date_time;

                        // ADD to Attendance Data
                        if ($debug) echo '<span style="color:blue">' . $row->name . ' ' . $shift_date . ' - ' .  $row->date_time . '(OUT)</span> <br>';
                    }
                    // If time is beyond the shift out, mark shift out to -1 and save
                    else if (($emp_time_out > $shift_out) && ($current_date->in_time != null) && ($current_date->out_time == null)) {
                        $current_date->out_time = '-1';

                        if ($debug) echo $row->name . ' ' . $shift_date . ' - ' .  $row->date_time . ' +++ <br>';

                        // At this point, we're closing the current date and creating a new one
                        // So we will save the current date
                        $current_date->hours_worked = 0;
                        //AttendanceManager::saveExcelData($current_date, $current_date->hours_worked, 0);
                        $this->attendance_data[] = $current_date;

                        echo '<pre>';
                        echo '<legend>shift out -1</legend>';
                        print_r($current_date);
                        echo '</pre>';

                        $current_date = null; //$this->getTimeIn($current_date, $row, $shift_details);
                        $current_date->out_time = null;
                    }
                    // If time is beyond shift out and shift out is already filled, proceed to save
                    else if (($emp_time_out > $shift_out) && ($current_date->in_time != null) && ($current_date->out_time != null)) {

                        if ($debug) echo $row->name . ' ' . $shift_date . ' - ' .  $row->date_time . ' <<< <br>';

                        $current_date->hours_worked = round((strtotime($current_date->out_time) - strtotime($current_date->in_time)) / 60 / 60, 2) . ' hrs';
                        //AttendanceManager::saveExcelData($current_date, $current_date->hours_worked, 0);
                        $this->attendance_data[] = $current_date;

                        echo '<pre>';
                        echo '<legend>shift out complete</legend>';
                        print_r($current_date);
                        echo '</pre>';

                        $current_date = $row;
                        $current_date->in_time = $row->date_time;
                        $current_date->out_time = null;
                    }
                    // If user has changed and time out is still empty
                    else if (($current_date->out_time == null) && ($current_date->code != $row->code)) {
                        $current_date->out_time = '-1';

                        if ($debug) echo $row->name . ' ' . $shift_date . ' - ' .  $row->date_time . ' @@@ <br>';

                        // At this point, we're closing the current date and creating a new one
                        // So we will save the current date
                        $current_date->hours_worked = 0;
                        //AttendanceManager::saveExcelData($current_date, $current_date->hours_worked, 0);
                        $this->attendance_data[] = $current_date;

                        echo '<pre>';
                        echo '<legend>exceed next day</legend>';
                        print_r($current_date);
                        echo '</pre>';

                        // Create a new record
                        $current_date = $row;
                        $current_date->in_time = $row->date_time;
                        $current_date->out_time = null;
                    }
                    else {
                        if ($debug) echo $row->name . ' ' . $shift_date . ' - ' .  $row->date_time . ' >>> <br>';
                    }



                    // Get next day and check if leave

                    //check if user has applied for leave on this day
                    /*$user = Employee::where('biometric_id', $row->code)->first();
                    if ($user) {
                        $employeeLeave = EmployeeLeaves::where('user_id', $user->id)->where('date_from', '>=', $row->date)->where('date_to', '<=', $row->date)->first();
                        //dd(\DB::getQueryLog());

                        if ($employeeLeave) {
                            $row_leave = (object)[
                                'date'      => date('n/j/Y', strtotime($row->date_time)),
                                'days'      => date('l', strtotime($row->date_time)),
                                'in_time'   => null,
                                'out_time'  => null,
                                'hours_worked' => 0,
                                'over_time' => null,
                                'status'    => 'A',
                                'leave_status' => '',
                            ];

                            if ($employeeLeave->status == '1') {
                                $row_leave->leave_status = 'Approved';
                            }
                            else if ($employeeLeave->status == '2') {
                                //set the leave_status column of this date as unapproved
                                $row_leave->leave_status = 'Unapproved';
                            }
                            else {
                                $row_leave->leave_status = 'Pending';
                            }

                            $this->attendance_data[] = $row_leave;
                            echo '<pre>';
                            echo '<legend>leave</legend>';
                            print_r($row_leave);
                            echo '</pre>';

                        }
                    }
                }*/

                /*if (!$row->leave_status) {
                    if($row->days == 'Sat')
                    {
                        if($saturdays < 2)
                        {
                            $saturdays++;
                            $row->leave_status = 'Weekly Off';
                        }
                    }
                }*/

                /*if (!$row->leave_status) {
                    $holidays = Holiday::get();

                    foreach($holidays as $holiday) {
                        $dates = $this->createDateRangeArray($holiday->date_from, $holiday->date_to);
                        if (in_array($row->date, $dates)) {
                            $row->leave_status = $holiday->occasion. ' holiday';
                        }
                    }
                }*/

                /*if (!$row->leave_status) {
                    $row->leave_status = 'Unplanned leave';
                }*/

                /*elseif ($row->status == 'MIS')
                {
                    $row->leave_status = 'Missed punching';
                }
                elseif ($row->status == 'WO')
                {
                    $row->leave_status = 'Sunday';
                }*/
            }
            \Session::flash('success', ' Uploaded successfully.');
        });
    }

    public function createDateRangeArray($strDateFrom,$strDateTo)
    {
        // takes two dates formatted as YYYY-MM-DD and creates an
        // inclusive array of the dates between the from and to dates.

        // could test validity of dates here but I'm already doing
        // that in the main script

        $aryRange=array();

        $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
        $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

        if ($iDateTo>=$iDateFrom)
        {
            array_push($aryRange,date('d-m-Y',$iDateFrom)); // first entry
            while ($iDateFrom<$iDateTo)
            {
                $iDateFrom+=86400; // add 24 hours
                array_push($aryRange,date('d-m-Y',$iDateFrom));
            }
        }
        return $aryRange;
    }

    public function changeDateFormat($date)
    {
        $dateArray = explode("/",$date); // split the array
        $varDay = $dateArray[0]; //day seqment
        $varMonth = $dateArray[1]; //month segment
        $varYear = $dateArray[2]; //year segment
        $newDateFormat = "$varYear-$varDay-$varMonth"; // join them together
        return $newDateFormat;
    }

    public function validateDate($date)
    {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date))
        {
            return true;
        }else{
            return false;
        }
    }

    /*public function getTimeIn($current_date, $emp_row, $shift_details) 
    {
        $shift_in = strtotime($current_date->date . ' ' . $shift_details->in_time . ' -4 hours');   // 4 hours earlier for allowance
        $shift_out = strtotime($current_date->date . ' ' . $shift_details->in_time . ' +6 hours');
        $emp_time_in = strtotime($emp_row->date_time);
        
        // 1st condition assumes same day
        if (($emp_time_in > $shift_in) && ($emp_time_in < $shift_out)) {
            $current_date->in_time = $emp_row->date_time;
            return $current_date;
        }
        else {
            // Check if time in crosses over past midnight
            $previous_date = date('n/j/Y', strtotime($current_date->date . ' -1 day'));
            $shift_in = strtotime($previous_date . ' ' . $shift_details->in_time);
            $shift_out = strtotime($previous_date . ' ' . $shift_details->in_time . ' +6 hours');

            // Also check if previous date doesn't exist already
            if (($emp_time_in > $shift_in) && ($emp_time_in < $shift_out) && !$this->isAttendanceDateExist($previous_date, $emp_row->code)) {
                $current_date->date = $previous_date;
                $current_date->in_time = $emp_row->date_time;
                return $current_date;
            }
        }

        return false;
    }*/

    /**
     * Load all employee shifts from the database
     */ 
    public function getEmployeeShifts()
    {
        $shifts = \DB::table('employees')
                    ->select('id', 'biometric_id', 'shift_id')
                    ->whereNotNull('biometric_id')
                    ->where('shift_id', '>', 0)
                    ->get();
        return $shifts;
    }

    /**
     * Gets the shift for 1 employee from the getEmployeeShifts array
     */
    public function getEmployeeShift($code, $shifts_arr)
    {
        foreach ($shifts_arr as $shift) {
            if ($code == $shift->biometric_id) {
                return $shift;
            }
        }

        return false;
    }

    public function getAllShifts()
    {
        $shifts = \DB::table('shift_managers')
                    ->select('id', 'in_time', 'out_time', 'type')
                    ->get();
        return $shifts;
    }

    public function getShiftDetails($shift_id, $shifts_arr)
    {
        foreach ($shifts_arr as $shift) {
            if ($shift_id == $shift->id) {
                return $shift;
            }
        }

        return false;
    }

    public function isAttendanceDateExist($date, $code) {
        foreach ($this->attendance_data as $data) {
            if (($data->code == $code) && ($data->date == $date)) {
                return true;
            }
        }

        return false;
    }
}