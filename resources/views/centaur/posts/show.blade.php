@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Blog posts')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-md" href="{{ route('posts.trash') }}">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                Otpad
            </a>
            <a class="btn btn-primary btn-md" href="{{ route('posts.create') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Stvori novi blog post
            </a>
        </div>
    <h2>Broj bloga: {{$post->id }}</h2>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                    <div>
                        <h1>{{ $post ->title}}</h1>
                        <div><img class="rounded-circle" src="{{ asset( '/storage' . '/' . $post->avatar) }}" width="" height="400" /></div>
                        <div>Autor: {{ $post->author }}</div><br>
                        <div>Kategorija: {{ $post->category }}</div><br>
                        <div><p>{{  $post->content }}</p></div><br>
                        <table><tr>
                            <td><a href="{{ route('posts.edit', $post) }}" type="button" class="btn btn-primary btn-xs btn-block ">Uredi</a></td>
                            <td><a href="{{ route('posts.destroy', $post) }}" type="button" class="btn btn-danger btn-xs action_confirm btn-block" data-method="DELETE" data-token="{{ csrf_token() }}">Obriši</a></td>
                            <td><a href="{{ route('posts.index', $post) }}" type="button" class="btn btn-primary btn-xs btn-block">Povratak</a></td>
                        </tr></table>
            </div>
        </div>
    </div>
@stop
