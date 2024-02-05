<?php

namespace App\Http\Controllers\People;

use Illuminate\Http\Request;
use App\Models\People\FoodPartner;
use App\Http\Controllers\Controller;

class FoodpartnersController extends Controller
{
    public function index()
    {
        $foodpartners = FoodPartner::all();
        // $newFoodpartners = FoodPartner::where('application_status', '0')->get();
        $newFoodpartners = FoodPartner::where('id', '1')->get();

        return view('people\foodpartners', [
            'foodpartners' => $foodpartners,
            'newFoodpartners' => $newFoodpartners,
        ]);
    }
}
