<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminActivities extends Model
{
    protected $fillable = ['admin_name', 'process_type','created_at','updated_at'];
}
