<?php

namespace App\Http\Controllers\People;

use App\Models\Product;
use App\Models\StoreOwner;
use App\Mail\MailFromAdmin;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use App\Models\People\FoodPartner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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

    public function foodpartner($id)
    {
        $foodpartner = FoodPartner::find($id);
        $foodpartnerProducts = Product::where('store_id', $foodpartner->id)->get();
        return view('people.foodpartner', compact('foodpartner', 'foodpartnerProducts'));
    }

    // accept new application
    // public function accept(Request $request, FoodPartner $foodpartner)
    // {
    //     $foodpartner->update(['status' => 'a']);

    //     // Redirect or display a success message as needed
    //     return back()->with('success', 'Food partner accepted successfully!');
    // }

    public function accept(Request $request, StoreOwner $storeowner, FoodPartner $foodpartner)
    {
        $storeowner = $storeowner->find($foodpartner->user_id);
        $foodpartner->update(['status' => 'a']);

        // Send store activation mail to user
        Mail::to($storeowner->email)->send(new MailFromAdmin($foodpartner->store_name));
    
        session()->flash('success', 'Food partner accepted successfully! Notification Email sent.');

        return back();
    }
}
