<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodPartner extends Model
{
    use HasFactory;

    protected $connection = 'foodgrubber_foodpartners';
    protected $table = 'users_stores'; 


}
