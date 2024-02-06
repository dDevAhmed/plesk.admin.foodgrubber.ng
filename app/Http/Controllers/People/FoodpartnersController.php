<?php

namespace App\Http\Controllers\People;

use Illuminate\Http\Request;
use App\Models\People\FoodPartner;
use App\Http\Controllers\Controller;

class FoodpartnersController extends Controller
{
    public function index()
    {
        $foodpartners = FoodPartner::where('status', 'a')->get();
        $newFoodpartners = FoodPartner::where('status', 'p')->get();
        $newFoodpartnersCount = FoodPartner::where('status', 'p')->count();

        return view('people\foodpartners', compact(
            'foodpartners',
            'newFoodpartners',
            'newFoodpartnersCount'
        ));
    }
}
