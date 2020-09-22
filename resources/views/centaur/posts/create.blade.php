@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Dodajte novi post.')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @component('Centaur::components.panel.content', [
            'class'   => 'panel-primary',
            'heading' => [
                'visible' => true,
                'title'   => 'Dodajte novi post'
            ],
            'body'    => [
                'visible' => true,
                'component' => true,
                'content' => [
                       [
                        'component_path' => 'Centaur::components.form.posts.create',
                        'component_options' => [
                            'method' => 'POST',
                            'route' => 'posts.store',
                            'param' => false
                        ]
                    ]
                            ]
            ],
            'footer'  => [
                'visible' => false,
                'content' => 'Footer'
            ]])

        @endcomponent
</div>
@stop
