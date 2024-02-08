<?php

namespace App\Models\People;

use App\Models\Product;
use App\Models\People\FoodPartner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodPartner extends Model
{
    use HasFactory;

    protected $connection = 'foodgrubber_foodpartners';
    protected $table = 'users_stores'; 
    protected $fillable = ['status']; 

    public function product()
    {
        return $this->hasMany(Product::class, 'store_id');
    }

}
