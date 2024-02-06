<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    // display dashboard
    public function index()
    {
        $user = Auth::user();

        if ($user && $user->hasVerifiedEmail() && $user->active == 1 && $user->level == 2) {     //fixme - use base controller
            return view('dashboard');
        }

        // Redirect to a different page if the user is not logged in, not verified, or status is not 1
        return redirect('welcome')->with(
            'message', 
            '<i class="fa fa-check" style="font-size:48px; color: #01c324;"></i> <br> Registration and verification successful. <br> A notification will be sent to you once the admin activates your account.'
        );
    }

    public function settings(){
        $categories = Category::all();
        return view('settings', compact('categories'));
    }

    public function categories(Request $request){

        $category = new Category;
        $category->category = $request->category;
        // $category->image = $request->image;

        $category->save();

        return back()->with('success', "Category Added successfully");
    }
}
