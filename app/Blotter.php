<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blotter extends Model
{
    protected $guard = [];
    protected $fillable = ['comp_name','residences_id','comp_age','comp_gender', 'comp_nat', 'comp_nat','comp_address','resp_name', 'resp_age', 'resp_gender','resp_nat','resp_address','serial_number', 'blotter_type','location', 'comp_statement', 'resp_statement', 'created_at','updated_at'];

    public function residence(){
    	return $this->belongsTo(Residences::class);
    }
}
