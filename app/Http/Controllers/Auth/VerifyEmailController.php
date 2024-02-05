<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));

            // // Check if the user's status is 0
            // if ($request->user()->status == 0) {
            //     // Redirect to a different page with a flash message
            //     return redirect('welcome')->with('message', 'Registration and verification successful. <br> A notification will be sent to you when the super admin activates your account.');
            // }
        }

        return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
    }
}
