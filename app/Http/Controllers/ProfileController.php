<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.profile', ['user' => $user]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'u_nom' => ['required', 'string'],
            'u_prenom' => ['required', 'string'],
            'u_pseudo' => ['required', 'string'],
            'u_mail' => ['required', 'email', Rule::unique('tbl_users')->ignore(Auth::id(), 'id_u')],
            'u_mdp' => ['required', 'string', 'min:8'], // Password is optional
        ]);
        // Retrieve the authenticated user
        $user = Auth::user();

        // Update user information based on form input
        $user->u_nom = $request->input('u_nom');
        $user->u_prenom = $request->input('u_prenom');
        $user->u_pseudo = $request->input('u_pseudo');
        $user->u_mail = $request->input('u_mail');
        $user->u_mdp = $request->input('u_mdp'); // Hash the password

        if ($user->save()) {
            Session::flash('success', 'Informations edited successfully');
        } else {
            Session::flash('error', 'Failed to edit informations. Please try again.');
        }

        // Redirect back to the profile page with a success message
        return redirect()->back();
    }
}
