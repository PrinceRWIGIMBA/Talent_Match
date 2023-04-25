<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable=[
            'employee_email',
            'avilability',
            'phone',
            'gender',
            'dob',
            'region',
            'patch',
            'file',
            'link',
            'profile',
            'about'
    ];
}
