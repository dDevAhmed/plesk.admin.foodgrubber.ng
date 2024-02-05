<?php

namespace App\Models\People;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory, MustVerifyEmail;

    protected $connection = 'foodgrubber_admin';
    protected $table = 'users'; 

    protected $fillable = [
        'name',
        'phone',
        'email',
    ];
}