@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Dashboard')

@section('content')
<div class="row">
    @if (Sentinel::check())
    <div class="jumbotron">
        <h1 style="margin-bottom: 50px">Pozdrav, {{ Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name }}</h1>
        <h2>Posljednja aktivnost na BLOGu bila je :</h2>
        <h4>{!! UserActivity::generate() !!}</h4>
    </div>
    @else
       <div class="row">
        <div class="jumbotron" >
            <h1>Dobrodošli na BLOG</h1>
            <p>Prijavite se za nastavak!</p>
            <p><a class="btn btn-success btn-lg btn-block" href="{{ route('auth.login.form') }}" role="button">Prijava</a></p>
        </div>
       </div>
    @endif
</div>
@stop


