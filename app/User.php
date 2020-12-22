<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
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
     * The activities to be shown for a loged user
     * 
     * 
     */
    public function userActivities(){

        return $this->hasMany(UserActivity::class);
    }

    public function userActivitiesReports(){

        return $this->hasMany(UserActivityReport::class);
    }
}
