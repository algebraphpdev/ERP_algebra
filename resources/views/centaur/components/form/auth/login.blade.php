@component('Centaur::components.form.main', [
    'id'      => $id ?? '',
    'name'    => $name ?? '',
    'class'   => $class ?? '',
    'method'  => $method ?? '',
    'param'   => $param ?? '',
    'route'   => $route ?? '',
])
    @slot('csrf')
        @csrf
    @endslot
    @slot('elements')

        <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
            <input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}">
            {!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
        </div>
        <div class="form-group  {{ ($errors->has('password')) ? 'has-error' : '' }}">
            <input class="form-control" placeholder="Lozinka" name="password" type="password" value="">
            {!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
        </div>
        <div class="checkbox">
            <label>
                <input name="remember" type="checkbox" value="true" {{ old('remember') == 'true' ? 'checked' : ''}}> Zapamti Me
            </label>
        </div>
    @endslot
    @slot('buttons')
        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
        <p style="margin-top:5px; margin-bottom:0"><a href="{{ route('auth.password.request.form') }}" type="submit">Zaboravili ste lozinku?</a></p>
    @endslot
@endcomponent
