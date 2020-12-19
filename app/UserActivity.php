<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $fillable = [
        'user_id',
        'activity_name',
        'activity_start_date',
        'activity_end_date',
        'activity_description',
        'activity_duration'        
    ];
}
