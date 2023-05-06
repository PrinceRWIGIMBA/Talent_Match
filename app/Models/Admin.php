<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AdminController;
use App\Http\Resources\AdminResource;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
                'name',
                'admin_id',
                'admin_email',
                'profile',
                'phone',
                'address',
                'professional'
    ];

    public function user(){
        return $this->belongTo(User::class);
    }
}
