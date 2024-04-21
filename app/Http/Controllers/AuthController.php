<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'u_mail' => ['required', 'string', 'email'],
            'u_mdp' => ['required', 'string'],
        ])->validate();

        $credentials = $request->only('u_mail', 'u_mdp');

        $user = DB::connection('db1')->table('tbl_users')
            ->where('u_mail', $credentials['u_mail'])
            ->first();

        if ($user && ($credentials['u_mdp'] == $user->u_mdp)) {
            Auth::loginUsingId($user->id_u);
            // Authentication successful, redirect to home route
            return redirect()->route('home');
        }

        // Authentication failed, redirect back with error message
        return back()->withErrors(['u_mail' => trans('auth.failed')]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
}
