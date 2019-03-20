<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceManager extends Model
{
    public static function getFilterdSearchResults($request)
    {
        $string = $request['string'];
        $column = $request['column'];
        if($column == 'status')
        {
            $string = convertAttendanceTo($string);
        }
        $dateTo =  date_format(date_create($request['dateTo']), 'Y-m-d');
        $dateFrom =  date_format(date_create($request['dateFrom']), 'Y-m-d');

        if(!empty($column) && !empty($string) && empty($dateFrom) && empty($dateTo))
        {
            $attendances = AttendanceManager::whereRaw($column . " like '%" . $string . "%'")->paginate(20);
        }
        elseif(!empty($dateFrom) && !empty($dateTo) && empty($column) && empty($string))
        {
            $attendances = AttendanceManager::whereBetween('date', [$dateFrom, $dateTo])->paginate(20);
        }
        elseif(!empty($column) && !empty($string) && !empty($dateFrom) && !empty($dateTo)) {
            $attendances = AttendanceManager::whereRaw($column . " like '%" . $string . "%'")->whereBetween('date', [$dateFrom, $dateTo])->paginate(20);
        }
        else
        {
            $attendances = AttendanceManager::paginate(20);
        }

        return $attendances;
    }

    public static function saveExcelData($row, $hoursWorked, $difference)
    {
        $user = Employee::where('biometric_id', $row->code)->first();
        $attendance = new AttendanceManager();
        $attendance->name = $row->name;
        $attendance->code = $row->code;
        $attendance->date = date('Y-m-d', strtotime($row->date));
        $attendance->day = $row->days;
        //\Log::info('inTime='.$row->in_time);
        $attendance->in_time = date('H:i:s', strtotime($row->in_time));
        $attendance->out_time = date('H:i:s', strtotime($row->out_time));
        $attendance->status = 0; //convertAttendanceTo(preg_replace('/\s+/', '', $row->status));
        $attendance->leave_status = $row->leave_status;
        $attendance->user_id = $user->id;
        $attendance->hours_worked = $hoursWorked;
        $attendance->difference = $difference;
        $attendance->save();
    }
}
