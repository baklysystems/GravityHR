@extends('hrms.layouts.base')

@section('content')

    <section id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-success profbox-empname">
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <span class="panel-title">{{$details->name}}</span>
                        </div>
                        <div class="panel-body pn pb5 text-center">
                            <img src="{{($details->photo) ? $details->photo : '/assets/img/avatars/profile_pic.png'}}" width="80px" height="80px" class="img-circle img-thumbnail" alt="User Image">

                        </div>
                        <p class="text-center no-margin prof-name">{{$details->userrole->role->name}}</p>
											
                        <p class="small text-center no-margin prof-dept"><span class="text-muted">Department:</span> {{$details->department}}</p>
                        <p class="small text-center no-margin emp-ID"><span class="text-muted">Employee ID:</span> {{$details->code}}</p>
                    </div>
                </div>


                <div class="box box-success profbox">
                    <div class="panel">

                        <div class="panel-heading">
                            <span class="panel-title">Personal Detail</span>
                        </div>
                        <div class="panel-body pn pb5">
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-birthday-cake"></i>
                                        </td>
                                        <td><strong>Birthday</strong></td>
                                        <td>{{$details->date_of_birth}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-genderless"></i>
                                        </td>
                                        <td><strong>Gender</strong></td>
                                        <td>{{getGender($details->gender)}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-envelope-o"></i>
                                        </td>
                                        <td><strong>Father's Name</strong></td>
                                        <td>{{$details->father_name}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-mobile-phone"></i>
                                        </td>
                                        <td><strong>Cellphone</strong></td>
                                        <td>{{$details->number}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-map-marker"></i>
                                        </td>
                                        <td><strong>Qualification</strong></td>
                                        <td>{{$details->qualification}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-map-marker"></i>
                                        </td>
                                        <td><strong>Current Address</strong></td>
                                        <td>{{$details->current_address}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-map-marker"></i>
                                        </td>
                                        <td><strong>Permanent Address</strong></td>
                                        <td>{{$details->permanent_address}}</td>
                                    </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-3 pull-right">
                <div class="small-box">
                    <div class="inner datebar bg-black" align="center">
                        <p style="color:ghostwhite">{{\Carbon\Carbon::now()->format('l, jS \\of F, Y')}}</p>
                        <h3 style="color: ghostwhite" id="clock"></h3>
                        <br/>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="box box-success profbox">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title">Employment Details</span>
                        </div>
                        <div class="panel-body pn pb5">
                            <div class="box-body no-padding">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-key"></i></td>
                                        <td><strong>Employee ID</strong></td>
                                        <td>{{$details->code}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-briefcase"></i></td>
                                        <td><strong>Department</strong></td>
                                        <td>{{$details->department}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-cubes"></i></td>
                                        <td><strong>Designation</strong></td>
                                        <td>{{$details->userrole->role->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-calendar"></i></td>
                                        <td><strong>Date Joined</strong></td>
                                        <td>{{$details->date_of_joining}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-calendar"></i></td>
                                        <td><strong>Date Confirmed</strong></td>
                                        <td>{{$details->date_of_confirmation}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-credit-card"></i></td>
                                        <td><strong>Salary</strong></td>
                                        <td>{{$details->salary}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="box box-success profbox">
                    <div class="panel">

                        <div class="panel-heading">
                            <span class="panel-title">Leave Balances</span>
                        </div>
                        <div class="panel-body pn pb5">
                            <div class="box-body no-padding">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Vacation Leave</td>
                                            <td>{{ $leave_balances[0]->allocated - $leave_balances[0]->used }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sick Leave</td>
                                            <td>{{ $leave_balances[1]->allocated - $leave_balances[1]->used }}</td>
                                        </tr>
                                        <tr>
                                            <td>Birthday Leave</td>
                                            <td>{{ $leave_balances[2]->allocated - $leave_balances[2]->used }}</td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>
                </div>

            </div>
                    </div>
            </div>

        </div>

    </section>

@endsection
<script type="text/javascript">
    function startTime() {
        var today = new Date(),
                curr_hour = today.getHours(),
                curr_min = today.getMinutes(),
                curr_sec = today.getSeconds();
        curr_hour = checkTime(curr_hour);
        curr_min = checkTime(curr_min);
        curr_sec = checkTime(curr_sec);
        document.getElementById('clock').innerHTML = curr_hour + ":" + curr_min + ":" + curr_sec;
    }
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(startTime, 500);
</script>
