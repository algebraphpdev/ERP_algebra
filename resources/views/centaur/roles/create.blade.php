@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Stvori novu ulogu')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Stvori novu ulogu:</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('roles.store') }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Name" name="name" type="text" value="{{ old('name') }}" />
                        {!! ($errors->has('name') ? $errors->first('name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('slug')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="slug" name="slug" type="text" value="{{ old('slug') }}" />
                        {!! ($errors->has('slug') ? $errors->first('slug', '<p class="text-danger">:message</p>') : '') !!}
                    </div>

                    <h5>Korisnička prava:</h5>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permissions[posts.create]" value="1" >
                            Stvori blog
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[posts.update]" value="1" >
                            Ažuriraj blog
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[posts.view]" value="1" >
                            Pregledaj blog
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[posts.destroy]" value="1" >
                            Obriši blog
                        </label>
                    </div>
                    <h5>Kreiranje uloga:</h5>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permissions[roles.create]" value="1" >
                            Stvori ulogu
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[roles.update]" value="1" >
                            Ažuriraj ulogu
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[roles.view]" value="1" >
                            Pregledaj uloge
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[roles.delete]" value="1" >
                            Obriši ulogu
                        </label>
                    </div>
                    <h5>Kreiranje autora:</h5>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permissions[users.create]" value="1" >
                            Stvori autora
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[users.update]" value="1" >
                            Ažuriraj autora
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[users.view]" value="1" >
                            Pregledaj autore
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[users.delete]" value="1" >
                            Obriši autora
                        </label>
                    </div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-md btn-success btn-block" type="submit" value="Stvori">
                    <a href="{{ route('roles.index') }}" type="button" class="btn btn-md btn-primary btn-block">Povratak</a>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
