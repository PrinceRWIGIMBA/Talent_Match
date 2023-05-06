<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Recruiter;

class RecruiterResource extends JsonResource
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
            'attributes' =>[
                'company_name'=>$this->company_name,
                'company_email'=>$this->company_email,
                'recruiter_email'=>$this->recruiter_email,
                'company_address'=>$this->address,
                'comapany_contact'=>$this->contact,
                'about_company'=>$this->about
            ],

            // 'relationship'=>[
            //     'id'=>(string)$this->user->id,
            //     'recruiter_email'=>$this->user->email
            // ]
        ];
    }
}
