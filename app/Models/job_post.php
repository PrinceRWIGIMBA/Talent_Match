<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_post extends Model
{
    use HasFactory;
    protected $fillable = [
        'recruiter_id',
        'typer',
        'no_opening',
        'working_days',
        'position',
        'category',
        'description',
        'starting_date',
        'ending_date',
        'to_do',
        'experience',
        'requirement',
        'status'
        
        ];
}
