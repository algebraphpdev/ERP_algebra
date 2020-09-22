<form
    role="form"
    accept-charset="UTF-8"
    id="{{ $id ?? ''}}"
    name="{{ $name ?? ''}}"
    class="{{ $class ?? ''}}"
    method="{{ $method ?? ''}}"
    action="{{ $param ? route($route, $param) : route($route) }}"
    enctype="{{ $enctype ?? 'multipart/form-data'}}">

    {{$csrf ?? ''}}
    {{ $elements ?? '' }}
    {{ $hidden ?? '' }}
    {{ $buttons ?? '' }}

</form>
