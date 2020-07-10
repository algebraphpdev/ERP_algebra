@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Create New Role')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Create New Role</h3>
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

                    <h5>User Permissions:</h5>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permissions[offices.create]" value="1" >
                            offices.create
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[offices.update]" value="1" >
                            offices.update
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[offices.view]" value="1" >
                            offices.view
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[offices.destroy]" value="1" >
                            offices.destroy
                        </label>
                    </div>
                    <h5>Role Permissions:</h5>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permissions[roles.create]" value="1" >
                            roles.create
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[roles.update]" value="1" >
                            roles.update
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[roles.view]" value="1" >
                            roles.view
                        </label>

                        <label>
                            <input type="checkbox" name="permissions[roles.delete]" value="1" >
                            roles.delete
                        </label>
                    </div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Create">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
