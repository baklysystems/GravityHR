<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveBalances;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function show()
    {

        $details = Employee::where('user_id', \Auth::user()->id)->with('userrole.role')->first();
        $leave_balances = LeaveBalances::where('user_id', \Auth::user()->id)->get();

        return view('hrms.profile', compact('details', 'leave_balances'));
    }
}
