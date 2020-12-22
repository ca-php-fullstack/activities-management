<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivityReport extends Model
{
    protected $fillable = [
        'user_id',
        'activity_name_report',
        'activity_start_date_report',
        'activity_end_date_report',
        'activity_description_report',
        'activity_duration_report'        
    ];
}
