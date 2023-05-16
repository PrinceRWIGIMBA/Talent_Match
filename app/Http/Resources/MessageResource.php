<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return  [
             'id' =>(string)$this->id,
        'attributes' =>[
            'Full_Name'=>$this->fullname,
            'Email'=>$this->email,
            'Message'=>$this->message,
           
        ],
    ];
    }
}
