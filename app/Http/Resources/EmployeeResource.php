<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [

            'id'=>(string)$this->id,
            'Attributs'=>[
                'name'=>$this->name,
                'employee_id'=>$this->employee_id,
                'employee_email'=>$this->employee_email,
                'avilability'=>$this->avilability,
                'phone'=>$this->phone,
                'gender'=>$this->gender,
                'dob'=>$this->dob,
                'region'=>$this->region,
                'address'=>$this->address,
                'patch'=>$this->patch,
                'file'=>$this->file,
                'link'=>$this->link,
                'profile'=>$this->profile,
                'about'=>$this->about
            ]
        ];
    }
}
