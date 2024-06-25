
@extends('layouts.welcome')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>Welkom bij ons CRM-systeem</h1>
            <p class="lead">Beheer uw profiel eenvoudig met behulp van ons krachtige CRM-systeem.</p>
            <a class="btn btn-lg btn-primary" href="/login" role="button">Login</a>
            <a class="btn btn-lg btn-success" href="/register" role="button">Register</a>
        </div>
    </div>
@endsection
