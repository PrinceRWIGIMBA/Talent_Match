<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\EmployeeController;
class employee extends Model
{
    use HasFactory;
    protected $fillable=[
            'name',
            'employee_id',
            'employee_email',
            'avilability',
            'phone',
            'gender',
            'dob',
            'region',
            'address',
            'patch',
            'file',
            'link',
            'profile',
            'about'
    ];

    public function user(){
        return $this->belongTo(User::class);
    }
}
