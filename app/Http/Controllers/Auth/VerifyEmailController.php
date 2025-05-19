<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            //return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
            return $this->redirectUser($request->user());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        //return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        //return redirect()->intended(route('frontend.home', absolute: false).'?verified=1');
        return $this->redirectUser($request->user());
    }

    protected function redirectUser($user)
    {
        if ($user->isAdmin()) {
            return redirect()->intended(route('admin.dashboard', absolute: false).'?verified=1');
        }
        return redirect()->intended(route('frontend.home', absolute: false).'?verified=1');
    }
}
