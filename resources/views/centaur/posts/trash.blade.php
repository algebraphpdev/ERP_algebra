@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Trash')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('posts.index') }}">
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
                            <th>Avatar</th>
                            <th>Naslov</th>
                            <th>Kategorija</th>
                            <th>Sadržaj</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->author }}</td>
                                <td>{{ $post->avatar }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category }}</td>
                                <td>{{ $post->content }}</td>
                                <tr>
                                    <td><a href="{{ route('posts.restore', $post) }}" class="btn btn-primary btn-xs btn-block">Vrati</a></td>
                                   <td> <a href="{{ route('posts.destroy', $post) }}" type="button" class="btn btn-danger btn-xs action_confirm btn-block" data-method="DELETE" data-token="{{ csrf_token() }}">Obriši</a></td>
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
