<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applied_job extends Model
{
    use HasFactory;
protected $fillable =[
    'employee_id',
    'recruiter_id',
    'job_post_id',
    'status'
];
public function Recruiter(){
    return $this->belongTo(Recruiter::class);
}
public function employee(){
    return $this->belongTo(employee::class);
}
public function job_post(){
    return $this->belongTo(job_post::class);
} 
}


