@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Dashboard')

@section('content')
<div class="row">
    @if (Sentinel::check())
    <div class="jumbotron">
        <h4>Pozdrav, {{ Sentinel::getUser()->email }}!</h4>
        <p>{!! UserActivity::generate() !!}</p>
    </div>
    @else
        <div class="jumbotron">
            <h1>Dobrodošli na BLOG</h1>
            <p>Prijavite se za nastavak!</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('auth.login.form') }}" role="button">Prijava</a></p>
        </div>
    @endif
</div>
@stop


