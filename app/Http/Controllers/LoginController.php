<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {

        if (Auth::attempt(['email' => $request->get('username'), 'password' => $request->get('password')])) {
            // Authentication passed...
            return response('success',200);
        }

        return response('fail',401);
    }
}
