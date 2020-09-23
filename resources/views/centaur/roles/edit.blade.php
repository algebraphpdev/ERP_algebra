@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Ažuriraj Uloge')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Ažuriraj uloge</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('roles.update', $role->id) }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Name" name="name" type="text" value="{{ $role->name }}" />
                        {!! ($errors->has('name') ? $errors->first('name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('slug')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="slug" name="slug" type="text" value="{{ $role->slug }}" />
                        {!! ($errors->has('slug') ? $errors->first('slug', '<p class="text-danger">:message</p>') : '') !!}
                    </div>

                    <h5>Korisnička prava:</h5>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permissions[posts.create]" value="1" {{ $role->hasAccess('posts.create') ? 'checked' : '' }}>
                            Stvori blog
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[posts.update]" value="1" {{ $role->hasAccess('posts.update') ? 'checked' : '' }}>
                            Ažuriraj blog
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[posts.view]" value="1" {{ $role->hasAccess('posts.view') ? 'checked' : '' }}>
                            Pregledaj blog
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[posts.destroy]" value="1" {{ $role->hasAccess('posts.destroy') ? 'checked' : '' }}>
                            Obriši blog
                        </label>
                    </div>
                    <h5>Kreiranje uloga</h5>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permissions[roles.create]" value="1" {{ $role->hasAccess('roles.create') ? 'checked' : '' }}>
                            Kreiraj ulogu
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[roles.update]" value="1" {{ $role->hasAccess('roles.update') ? 'checked' : '' }}>
                            Ažuriraj ulogu
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[roles.view]" value="1" {{ $role->hasAccess('roles.view') ? 'checked' : '' }}>
                            Pregledaj uloge
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[roles.delete]" value="1" {{ $role->hasAccess('roles.delete') ? 'checked' : '' }}>
                            Obriši ulogu
                        </label>
                    </div>
                    <h5>Kreiranje autora:</h5>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permissions[users.create]" value="1" {{ $role->hasAccess('users.create') ? 'checked' : '' }}>
                            Stvori autora
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[users.update]" value="1" {{ $role->hasAccess('users.update') ? 'checked' : '' }}>
                            Ažuriraj autora
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[users.view]" value="1" {{ $role->hasAccess('users.view') ? 'checked' : '' }}>
                            Pregledaj autore
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[users.destroy]" value="1" {{ $role->hasAccess('users.destroy') ? 'checked' : '' }}>
                            Obriši autora
                        </label>
                    </div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input name="_method" value="PUT" type="hidden">
                    <input class="btn btn-md btn-success btn-block" type="submit" value="Ažuriraj">
                    <a href="{{ route('roles.index') }}" type="button" class="btn btn-md btn-primary btn-block">Povratak</a>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
