@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Blog posts')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-success btn-md" href="{{ route('posts.create') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Stvori novi blog post
            </a>
            <a class="btn btn-danger btn-md" href="{{ route('posts.trash') }}">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                Otpad
            </a>
        </div>
        <h1>Blog post</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Autor</th>
                            <th>Naslovna slika</th>
                            <th>Naslov</th>
                            <th>Kategorija</th>
                            <th>Sadržaj</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->author }}</td>
                                <td><img class="rounded-circle" src="{{ asset( '/storage/avatars' . '/' . $post->avatar) }}" width="100" height="100" /></td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category }}</td>
                                <td>{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 50) }}
                                    @if (strlen(strip_tags($post->content)) > 50)...
                                    @endif
                                </td>
                                <tr>
                                    <td><a href="{{ action('PostsController@show', $post) }}" class="btn btn-warning btn-sm btn-block">Pročitaj više</a></td>
                                    <td><a href="{{ route('posts.edit', $post) }}" type="button" class="btn btn-primary btn-sm btn-block">Uredi</a>
                                    </td>
                                   <td> <a href="{{ route('posts.destroy', $post) }}" type="button" class="btn btn-danger btn-sm action_confirm btn-block" data-method="DELETE" data-token="{{ csrf_token() }}">Obriši</a></td>
                                </tr>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@stop
