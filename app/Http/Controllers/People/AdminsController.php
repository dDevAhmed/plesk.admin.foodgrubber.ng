<?php

namespace App\Http\Controllers\People;

use App\Models\People\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class AdminsController extends Controller
{
    public function index()
    {
        // $admins = Admin::all();
        $admins = Admin::where('level', 1)->get();

        return view('people.admins', [
            'admins' => $admins,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            // Add validation rules for other fields
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        // Assign other fields
        $admin->save();

        // After saving the admin, fire the Registered event which will send the email verification
        // fixme -  send register notication
        event(new Registered($admin));

        return redirect()->route('admins.index')->with('success', 'Admin created successfully.');
    }

    public function admin($id)
    {
        $admin = Admin::find($id);
        return view('people\admin', ['admin' => $admin]);
    }
}
