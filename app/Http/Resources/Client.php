<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Client extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'fname' => $this-> fname,
            'mname' => $this-> mname,
            'lname' => $this-> lname,
            'gender' => $this-> gender,
            'email' => $this-> email,
            'contact' => $this-> contact,
            'address' => $this-> address,
            
        ];
        
    }
}
