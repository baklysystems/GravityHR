<?php
namespace App\Http\Controllers;

use App\Jobs\ExportData;
use App\Models\Employee;
use App\Models\EmployeeUpload;
use App\Models\LeaveBalances;
use App\Models\Role;
use App\Models\ShiftManagers;
use App\Models\UserRole;
use App\Promotion;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class EmpController extends Controller
{
    public function addEmployee()
    {
        $roles = Role::get();
        $shifts = ShiftManagers::get();
        $form_action = '/employee/add';

        return view('hrms.employee.add', compact('roles', 'form_action', 'shifts'));
    }

    public function processEmployee(Request $request)
    {
        $filename = public_path('img/avatar.png');
        if ($request->file('photo')) {
            $file             = $request->file('photo');
            $filename         = str_random(12);
            $fileExt          = $file->getClientOriginalExtension();
            $allowedExtension = ['jpg', 'jpeg', 'png'];
            $destinationPath  = public_path('photos');
            if (!in_array($fileExt, $allowedExtension)) {
                return redirect()->back()->with('message', 'Extension not allowed');
            }
            $filename = $filename . '.' . $fileExt;
            $file->move($destinationPath, $filename);
        }

        $user           = new User;
        $user->name     = sprintf('%s %s', $request->first_name, $request->last_name);
        $user->email    = (strlen($request->work_email) > 0) ? $request->work_email : $request->personal_email;
        $user->password = bcrypt('GravityBPO123');
        $user->save();

        $emp                = new Employee;
        $emp->photo         = $filename;
        $emp->code          = $request->code;
        $emp->first_name    = $request->first_name;
        $emp->middle_name   = $request->middle_name;
        $emp->last_name     = $request->last_name;
        //$emp->suffix       = $request->suffix;
        //$emp->nickname     = $request->nickname;
        $emp->job_title     = $request->job_title;
        $emp->gender        = $request->gender;
        $emp->status        = $request->status;
        $emp->civil_status  = $request->civil_status;
        $emp->date_of_birth    = date_format(date_create($request->date_of_birth), 'Y-m-d');
        $emp->date_of_joining  = date_format(date_create($request->date_of_joining), 'Y-m-d');
        $emp->qualification    = $request->qualification_list;
        $emp->primary_phone    = $request->primary_phone;
        $emp->secondary_phone  = $request->secondary_phone;
        $emp->work_email       = $request->work_email;
        $emp->personal_email   = $request->personal_email;
        $emp->contact_person   = $request->contact_person;
        $emp->contact_person_relationship  = $request->contact_person_relationship;
        $emp->contact_person_phone         = $request->contact_person_phone;
        $emp->contact_person_alt_phone     = $request->contact_person_alt_phone;
        $emp->sss_number           = $request->sss_number;
        $emp->pagibig_number       = $request->pagibig_number;
        $emp->philhealth_number    = $request->philhealth_number;
        $emp->tin_number           = $request->tin_number;
        $emp->health_insurance_number       = $request->health_insurance_number;
        $emp->current_address      = $request->current_address;
        $emp->permanent_address    = $request->permanent_address;
        $emp->shift_id      = $request->shift;
        $emp->reporting_to  = 1;
        $emp->user_id       = $user->id;
        $emp->save();

        $user_roles          = new UserRole();
        $user_roles->role_id = $request->role;
        $user_roles->user_id = $user->id;
        $user_roles->save();
        //$emp->userrole()->create(['role_id' => $request->role]);

        //return json_encode(['title' => 'Success', 'message' => 'Employee added successfully', 'class' => 'modal-header-success']);
        return redirect()->back();
    }

    public function showEmployee($id)
    {
        $details = Employee::where('user_id', $id)->with('userrole.role')->first();
        $leave_balances = LeaveBalances::where('user_id', $id)->get();

        return view('hrms.profile', compact('details', 'leave_balances'));
    }

    public function listEmployees()
    {
        $emps   = User::with('employee', 'role.role')->paginate(15);
        $column = '';
        $string = '';
        return view('hrms.employee.show_emp', compact('emps', 'column', 'string'));
    }

    public function showEdit($id)
    {
        //$emps = Employee::whereid($id)->with('userrole.role')->first();
        $emps = User::where('id', $id)->with('employee', 'role.role')->first();
        $roles = Role::get();
        $shifts = ShiftManagers::get();
        $form_action = '/employee/' . $id . '/edit';
        return view('hrms.employee.add', compact('emps', 'roles', 'form_action', 'shifts'));
    }

    public function doEdit(Request $request, $id)
    {
        $filename = public_path('img/avatar.png');
        if ($request->file('photo')) {
            $file             = $request->file('photo');
            $filename         = str_random(12);
            $fileExt          = $file->getClientOriginalExtension();
            $allowedExtension = ['jpg', 'jpeg', 'png'];
            $destinationPath  = public_path('photos');
            if (!in_array($fileExt, $allowedExtension)) {
                return redirect()->back()->with('message', 'Extension not allowed');
            }
            $filename = $filename . '.' . $fileExt;
            $file->move($destinationPath, $filename);
        }

        //$edit = Employee::findOrFail($id);
        $edit = Employee::where('id', $id)->first();

        //$edit->photo        = (!empty($request->$filename)) ? $request->$filename : '/img/avatar.png';
        //$edit->code         = $request->code;
        $edit->first_name   = $request->first_name;
        $edit->middle_name  = $request->middle_name;
        $edit->last_name    = $request->last_name;
        $edit->suffix       = $request->suffix;
        $edit->nickname     = $request->nickname;
        $edit->job_title    = $request->job_title;
        $edit->gender       = $request->gender;
        $edit->status       = $request->status;
        $edit->civil_status = $request->civil_status;
        $edit->date_of_birth    = date_format(date_create($request->date_of_birth), 'Y-m-d');
        $edit->date_of_joining  = date_format(date_create($request->date_of_joining), 'Y-m-d');
        $edit->qualification    = $request->qualification_list;
        $edit->primary_phone    = $request->primary_phone;
        $edit->secondary_phone  = $request->secondary_phone;
        $edit->work_email       = $request->work_email;
        $edit->personal_email   = $request->personal_email;
        $edit->contact_person   = $request->contact_person;
        $edit->contact_person_relationship  = $request->contact_person_relationship;
        $edit->contact_person_phone         = $request->contact_person_phone;
        $edit->contact_person_alt_phone     = $request->contact_person_alt_phone;
        $edit->sss_number           = $request->sss_number;
        $edit->pagibig_number       = $request->pagibig_number;
        $edit->philhealth_number    = $request->philhealth_number;
        $edit->tin_number           = $request->tin_number;
        $edit->health_insurance_number       = $request->health_insurance_number;
        $edit->current_address      = $request->current_address;
        $edit->permanent_address    = $request->permanent_address;
        $edit->shift_id     = $request->shift;
        $edit->save();

        $request->session()->flash('success', 'Employee updated successfully!');

        // Update the user role
        $user_roles = UserRole::firstOrNew(['user_id' => $id]);
        $user_roles->role_id = $request->role;
        $user_roles->save();

        return redirect()->back(); //json_encode(['title' => 'Success', 'message' => 'Employee details successfully updated', 'class' => 'modal-header-success']);
    }

    public function doDelete($id)
    {

        $emp = Employee::find($id);
        $emp->delete();

        \Session::flash('flash_message', 'Employee successfully Deleted!');

        return redirect()->back();
    }

    public function importFile()
    {
        return view('hrms.employee.upload');
    }

    /**
     * Uploads an employee list.
     *
     * @param Request $request The uploaded file
     */
    public function uploadFile(Request $request)
    {
        $files = Input::file('upload_file');

        foreach ($files as $file) {
            Excel::load($file, function ($reader) {
                $rows = $reader->get(['code', 'biometric_id', 'first_name', 'middle_name', 'last_name', 'suffix', 'job_title', 'gender', 'date_of_birth', 'date_of_joining', 'primary_phone', 'secondary_phone', 'work_email', 'personal_email', 
                    'contact_person', 'contact_person_phone', 'sss_number', 'pagibig_number', 'tin_number', 'philhealth_number', 'civil_status', 'current_address']);

                foreach ($rows as $row) {

                    // if has work or personal email, create user
                    if ((strlen(trim($row->work_email)) > 0) || (strlen(trim($row->personal_email)) > 0)) {

                        // Create user access
                        $user           = new User;
                        $user->name     = sprintf('%s %s', $row->first_name, $row->last_name);
                        $user->email    = (strlen(trim($row->work_email)) > 0) ? $row->work_email : $row->personal_email;
                        $user->password = bcrypt('123456');
                        $user->save();

                        /// Create employee record
                        $attachment                     = new Employee();
                        $attachment->code               = $row->code;
                        $attachment->biometric_id       = $row->biometric_id;
                        $attachment->first_name         = $row->first_name;
                        $attachment->middle_name        = $row->middle_name;
                        $attachment->last_name          = $row->last_name;
                        $attachment->suffix             = $row->suffix;
                        $attachment->job_title          = $row->job_title;
                        $attachment->gender             = ($row->gender == 'male') ? 0: 1;
                        $attachment->status             = ($row->status == 'Active') ? 1 : 0;
                        $attachment->date_of_birth      = ($row->date_of_birth) ? $row->date_of_birth->toDateTimeString() : null;
                        $attachment->date_of_joining    = ($row->date_of_joining) ? $row->date_of_joining->toDateTimeString() : null;
                        $attachment->primary_phone      = $row->primary_phone;
                        $attachment->secondary_phone    = $row->secondary_phone;
                        $attachment->work_email         = $row->work_email;
                        $attachment->personal_email     = $row->personal_email;
                        $attachment->contact_person     = $row->contact_person;
                        $attachment->contact_person_phone  = $row->contact_person_phone;
                        $attachment->sss_number         = $row->sss_number;
                        $attachment->pagibig_number     = $row->pagibig_number;
                        $attachment->tin_number         = $row->tin_number;
                        $attachment->philhealth_number  = $row->philhealth_number;
                        $attachment->civil_status       = $row->civil_status;
                        $attachment->current_address    = $row->current_address;
                        $attachment->photo              = '/img/avatar.png';
                        $attachment->user_id            = $user->id;
                        $attachment->save();

                        // Create default role (Employee Role)
                        $user_roles = new UserRole();
                        $user_roles->user_id = $user->id;
                        $user_roles->role_id = 4;
                        $user_roles->save();
                    }
                }
            });
        }

        \Session::flash('success', ' Employee details uploaded successfully.');

        return redirect()->back();
    }

    public function searchEmployee(Request $request)
    {
        $string = $request->string;
        $column = $request->column;
        if ($request->button == 'Search') {
            if ($string == '' && $column == '') {
                return redirect()->to('employee-manager');
            } elseif ($column == 'email') {
                $emps = User::with('employee')->where($column, $string)->paginate(20);
            } else {
                $emps = User::whereHas('employee', function ($q) use ($column, $string) {
                    $q->whereRaw($column . " like '%" . $string . "%'");
                })->with('employee')->paginate(20);
            }

            return view('hrms.employee.show_emp', compact('emps', 'column', 'string'));
        } else {
            if ($column == '') {
                $emps = User::with('employee')->get();
            } elseif ($column == 'email') {
                $emps = User::with('employee')->where($request->column, $request->string)->paginate(20);
            } else {
                $emps = User::whereHas('employee', function ($q) use ($column, $string) {
                    $q->whereRaw($column . " like '%" . $string . "%'");
                })->with('employee')->get();
            }

            $fileName = 'Employee_Listing_' . rand(1, 1000) . '.xlsx';
            $filePath = storage_path('export/') . $fileName;
            $file     = new \SplFileObject($filePath, "a");
            // Add header to csv file.
            $headers = ['id', 'photo', 'code', 'name', 'status', 'gender', 'date_of_birth', 'date_of_joining', 'number', 'qualification', 'emergency_number', 'pan_number', 'father_name', 'current_address', 'permanent_address', 'formalities', 'offer_acceptance', 'probation_period', 'date_of_confirmation', 'department', 'salary', 'account_number', 'bank_name', 'ifsc_code', 'pf_account_number', 'un_number', 'pf_status', 'date_of_resignation', 'notice_period', 'last_working_day', 'full_final', 'user_id', 'created_at', 'updated_at'];
            $file->fputcsv($headers);
            foreach ($emps as $emp) {
                $file->fputcsv([
                    $emp->id,
                    (
                        $emp->employee->photo) ? $emp->employee->photo : 'Not available',
                    $emp->employee->code,
                    $emp->employee->name,
                    $emp->employee->status,
                    $emp->employee->gender,
                    $emp->employee->date_of_birth,
                    $emp->employee->date_of_joining,
                    $emp->employee->number,
                    $emp->employee->qualification,
                    $emp->employee->emergency_number,
                    $emp->employee->pan_number,
                    $emp->employee->father_name,
                    $emp->employee->current_address,
                    $emp->employee->permanent_address,
                    $emp->employee->formalities,
                    $emp->employee->offer_acceptance,
                    $emp->employee->probation_period,
                    $emp->employee->date_of_confirmation,
                    $emp->employee->department,
                    $emp->employee->salary,
                    $emp->employee->account_number,
                    $emp->employee->bank_name,
                    $emp->employee->ifsc_code,
                    $emp->employee->pf_account_number,
                    $emp->employee->un_number,
                    $emp->employee->pf_status,
                    $emp->employee->date_of_resignation,
                    $emp->employee->notice_period,
                    $emp->employee->last_working_day,
                    $emp->employee->full_final
                ]);
            }

            return response()->download(storage_path('export/') . $fileName);
        }
    }

    public function doPromotion()
    {
        $emps  = User::get();
        $roles = Role::get();
        return view('hrms.promotion.add_promotion', compact('emps', 'roles'));
    }

    public function getPromotionData(Request $request)
    {
        $result = Employee::with('userrole.role')->where('id', $request->employee_id)->first();
        if ($result) {
            $result = ['salary' => $result->salary, 'designation' => $result->userrole->role->name];
        }
        return json_encode(['status' => 'success', 'data' => $result]);
    }

    public function processPromotion(Request $request)
    {

        $newDesignation  = Role::where('id', $request->new_designation)->first();
        $process         = Employee::where('id', $request->emp_id)->first();
        $process->salary = $request->new_salary;
        $process->save();

        \DB::table('user_roles')->where('user_id', $process->user_id)->update(['role_id' => $request->new_designation]);

        $promotion                    = new Promotion();
        $promotion->emp_id            = $request->emp_id;
        $promotion->old_designation   = $request->old_designation;
        $promotion->new_designation   = $newDesignation->name;
        $promotion->old_salary        = $request->old_salary;
        $promotion->new_salary        = $request->new_salary;
        $promotion->date_of_promotion = date_format(date_create($request->date_of_promotion), 'Y-m-d');
        $promotion->save();

        \Session::flash('flash_message', 'Employee successfully Promoted!');
        return redirect()->back();
    }

    public function showPromotion()
    {
        $promotions = Promotion::with('employee')->paginate(10);
        return view('hrms.promotion.show_promotion', compact('promotions'));
    }

}
