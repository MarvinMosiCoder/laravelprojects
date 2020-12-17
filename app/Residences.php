<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residences extends Model
{  
	protected $guard = [];
    protected $fillable = ['fname','mname','lname', 'gender', 'date_of_birth','address','birthplace', 'contact', 'email','area','civil_status','voters_status', 'image', 'created_at','updated_at'];

     public function blotter(){
    	return $this->hasMany(Blotter::class,'residences_id','id');
    }
}
