<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\RecruiterController;
use App\Http\Resources\RecruiterResource;
class Recruiter extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_email',
        'recruiter_id',
        'contact',
        'address',
        'about',
        'profile'
    ];

    public function user(){
        return $this->belongTo(User::class);
    }
}
