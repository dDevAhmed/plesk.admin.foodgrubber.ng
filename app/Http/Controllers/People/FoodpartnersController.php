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

        return view('people.foodpartners', compact(
            'foodpartners',
            'newFoodpartners',
            'newFoodpartnersCount'
        ));
    }

    public function foodpartner($id){
        $foodpartner = FoodPartner::find($id);
        return view('people.foodpartner', compact('foodpartner'));
    }

    // accept new application
    public function accept(Request $request, FoodPartner $foodpartner)
    {
        $foodpartner->update(['status' => 'a']);

        // Redirect or display a success message as needed
        return back()->with('success', 'Food partner accepted successfully!');
    }
}
