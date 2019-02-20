<?php

namespace App;
use App\Models\Employee;
use App\Models\Project;
use App\Models\UserRole;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->hasOne('App\Models\UserRole', 'user_id', 'id');
    }

    public function isHR()
    {
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        if (isset($userRole) && ($userRole->role_id == 1 || $userRole->role_id == 2)) {
            return true;
        }
        return false;
    }

    public function notAnalyst()
    {
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        if (isset($userRole) && $userRole->role_id != 3) {
            return true;
        }
        return false;
    }

    public function isCoordinator()
    {
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        $roleIds = [2,5,7,8,9,10,14,16];
        if (isset($userRole) && in_array($userRole->role_id, $roleIds)) {
            return true;
        }
        return false;
    }

    public function isManager()
    {
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        if (isset($userRole) && $userRole->role_id == 3) {
            return true;
        }
        return false;
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
