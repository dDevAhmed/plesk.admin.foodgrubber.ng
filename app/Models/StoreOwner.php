<?php

namespace App\Models;

use App\Models\People\FoodPartner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreOwner extends Model
{
    use HasFactory;

    protected $connection = 'foodgrubber_foodpartners';
    protected $table = 'users'; 

    public function store()
    {
        return $this->hasOne(FoodPartner::class, 'store_id');
    }
}
