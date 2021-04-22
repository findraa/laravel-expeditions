<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade
        $role = Auth::user()->role;
        $checkrole = explode(',', $role);  // However you get role

        if (in_array('0', $checkrole)) {
            Session::put('isadmin', 'admin');
           return redirect('/dashboard');
        } else {
            return redirect('/home');
        }


        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended(config('fortify.home'));
    }


}
