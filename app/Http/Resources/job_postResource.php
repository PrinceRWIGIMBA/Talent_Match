<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class job_postResource extends JsonResource
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
                'type'=>$this->type,
                'no_opening'=>$this->no_opening,
                'working_days'=>$this->working_days,
                'position'=>$this->position,
                'category'=>$this->category,
                'description'=>$this->description,
                'starting_date'=>$this->starting_date,
                'ending_date'=>$this->ending_date,
                'to_do'=>$this->to_do,
                'experience'=>$this->experience,
                'requirement'=>$this->requirement,
                'status'=>$this->status
            ],

        ];
    }
}
