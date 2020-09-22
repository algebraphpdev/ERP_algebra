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
    <div class="form-group @error ('avatar') has-error @enderror">
    <label for="avatar">Naslovna slika</label>
    <input class="form-control-file" name="avatar" type="file" id="image" value="{{ $param->avatar }}">
    @error('avatar')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group @error ('author') has-error @enderror">
        <label for="author">Autor*</label>
        <input class="form-control" name="author" type="text" id="author" value="{{ $param->author }}">
        @error('author')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group @error ('title') has-error @enderror">
        <label for="title">Naslov bloga*</label>
        <input class="form-control" name="title" type="text" id="title" value="{{ $param->title }}">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="category">Kategorija</label>
        <input class="form-control" name="category" type="text" id="category" value="{{ $param->category }}">
        @error('category')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">Sadržaj bloga</label>
        <textarea class="form-control" name="content" type="text" id="content" cols="30" rows="10" >{{ $param->content }}</textarea>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
@endslot
@slot('hidden')
    @method('PUT')
@endslot
@slot('buttons')
<button type="submit" class="btn btn-success btn-lg btn-block">Spremi promjene</button>
<a href="{{ route('posts.index') }}" type="button" class="btn btn-danger btn-lg btn-block">Prekid</a>
@endslot
@endcomponent
