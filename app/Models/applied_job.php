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
    'job_post_id'
];
   
}


