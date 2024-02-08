<?php

namespace App\Models;

use App\Models\People\FoodPartner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $connection = 'foodgrubber_foodpartners';
    protected $table = 'products';

    public function foodpartner()
    {
        return $this->belongsTo(FoodPartner::class, 'store_id');
    }
}
