<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>(string)$this->id,
            'Attributes' => [
                'name'=>$this->name,
                'admin_id' =>$this->admin_id,
                'admin_email' =>$this->admin_email,
                'profile' =>$this->profile,
                'phone'=>$this->phone,
                'address' =>$this->address,
                'professional' =>$this->professional
            ],
         
        ];
    }
}
