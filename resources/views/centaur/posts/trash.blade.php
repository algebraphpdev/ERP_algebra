@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Trash')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-md" href="{{ route('posts.index') }}">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                Vrati se nazad
            </a>
        </div>
        <div>
        <h1>Obrisani blogovi</h1>
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
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->author }}</td>
                                <td><img class="rounded-circle" src="{{ asset( '/storage/avatars' . '/' . $post->avatar) }}" width="100" height="100" /></td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category }}</td>
                                <td>{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 50) }}
                                    @if (strlen(strip_tags($post->content)) > 50)...
                                    @endif</td>
                                <tr>
                                    <td><a href="{{ route('posts.restore', $post) }}" class="btn btn-success btn-sm btn-block">Vrati</a></td>
                                   <td> <a href="{{ route('posts.destroy', $post) }}" type="button" class="btn btn-danger btn-sm action_confirm btn-block" data-method="DELETE" data-token="{{ csrf_token() }}">Obriši</a></td>
                                </tr>

                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Otpad je prazan!</td>
                                </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@stop
