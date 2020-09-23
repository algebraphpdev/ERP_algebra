@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Stvori novog korisnika')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Stvori novog korisnika</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('users.store') }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Ime" name="first_name" type="text" value="{{ old('first_name') }}" />
                        {!! ($errors->has('first_name') ? $errors->first('first_name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Prezime" name="last_name" type="text" value="{{ old('last_name') }}" />
                        {!! ($errors->has('last_name') ? $errors->first('last_name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}">
                        {!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <h5>Uloga</h5>
                    @foreach ($roles as $role)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="roles[{{ $role->slug }}]" value="{{ $role->id }}">
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                    <hr/>
                    <div class="form-group  {{ ($errors->has('password')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Lozinka"  name="password" type="password" >
                        {!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Potvrdi lozinku" name="password_confirmation" type="password" />
                        {!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="activate" type="checkbox" value="true" {{ old('activate') == 'true' ? 'checked' : ''}}> Aktiviraj korisnika
                        </label>
                    </div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-md btn-success btn-block" type="submit" value="Stvori">
                    <a href="{{ route('users.index') }}" type="button" class="btn btn-md btn-primary btn-block">Poništi</a>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
