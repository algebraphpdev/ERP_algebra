@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Edit Role')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Role</h3>
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

                    <h5>User Permissions:</h5>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permissions[offices.create]" value="1" {{ $role->hasAccess('offices.create') ? 'checked' : '' }}>
                            offices.create
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[offices.update]" value="1" {{ $role->hasAccess('offices.update') ? 'checked' : '' }}>
                            offices.update
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[offices.view]" value="1" {{ $role->hasAccess('offices.view') ? 'checked' : '' }}>
                            offices.view
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[offices.destroy]" value="1" {{ $role->hasAccess('offices.destroy') ? 'checked' : '' }}>
                            offices.destroy
                        </label>
                    </div>
                    <h5>Permissions:</h5>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permissions[employees.create]" value="1" {{ $role->hasAccess('employees.create') ? 'checked' : '' }}>
                            employees.create
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[employees.update]" value="1" {{ $role->hasAccess('employees.update') ? 'checked' : '' }}>
                            employees.update
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[employees.view]" value="1" {{ $role->hasAccess('employees.view') ? 'checked' : '' }}>
                            employees.view
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[employees.destroy]" value="1" {{ $role->hasAccess('employees.destroy') ? 'checked' : '' }}>
                            employees.destroy
                        </label>
                    </div>

                    <h5>Role Permissions</h5>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permissions[roles.create]" value="1" {{ $role->hasAccess('roles.create') ? 'checked' : '' }}>
                            roles.create
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[roles.update]" value="1" {{ $role->hasAccess('roles.update') ? 'checked' : '' }}>
                            roles.update
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[roles.view]" value="1" {{ $role->hasAccess('roles.view') ? 'checked' : '' }}>
                            roles.view
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[roles.delete]" value="1" {{ $role->hasAccess('roles.delete') ? 'checked' : '' }}>
                            roles.delete
                        </label>
                    </div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input name="_method" value="PUT" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Update">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
