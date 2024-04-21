@extends('layouts.app')
@section('title', 'Profile page')
@section('content')
    <h1 class="center mt-4 mb-3">Profile Informations</h1>
    <form class="row g-3" action="{{ route('profile.edit') }}" method="POST">
        @csrf
        <div class="col-md-6">
            <label for="u_nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="u_nom" name="u_nom" value="{{ $user->u_nom }}">
        </div>
        <div class="col-md-6">
            <label for="u_prenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="u_prenom" name="u_prenom" value="{{ $user->u_prenom }}">
        </div>
        <div class="col-md-6">
            <label for="u_pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="u_pseudo" name="u_pseudo" value="{{ $user->u_pseudo }}">
        </div>
        <div class="col-md-6">
            <label for="u_mail" class="form-label">Email</label>
            <input type="email" class="form-control" id="u_mail" name="u_mail" value="{{ $user->u_mail }}">
        </div>
        <div class="col-md-6">
            <label for="u_mdp" class="form-label">Password</label>
            <input type="password" class="form-control" id="u_mdp" name="u_mdp" value="{{ $user->u_mdp }}">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Edit info.</button>
        </div>
    </form>
@endsection
