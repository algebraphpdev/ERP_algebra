@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Korisnici')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-warning btn-md" href="{{ route('users.create') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Stvori korisnika
            </a>
        </div>
        <h1>Korisnici</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @foreach ($users as $user)
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <img src="//www.gravatar.com/avatar/{{ md5($user->email) }}?d=mm" alt="{{ $user->email }}" class="img-circle">
                            @if (!empty($user->first_name . $user->last_name))
                                <h4>{{ $user->first_name . ' ' . $user->last_name}}</h4>
                                <p>{{ $user->email }}</p>
                            @else
                                <h4>{{ 'Nepoznati korisnik' }}</h4>
                                <p>{{ $user->email }}</p>
                            @endif
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                            @if ($user->roles->count() > 0)
                                {{ $user->roles->implode('name', ', ') }}
                            @else
                                <em>Nije dodijeljena uloga</em>
                            @endif
                            </li>
                        </ul>
                        <div class="panel-footer">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-md btn-block">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                Uredi
                            </a>
                            <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger btn-md action_confirm btn-block" data-method="delete" data-token="{{ csrf_token() }}">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                Obriši
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {!! $users->render() !!}
@stop
