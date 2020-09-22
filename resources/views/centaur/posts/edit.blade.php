@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Uredi blog post')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @component('Centaur::components.panel.content', [
            'class'   => 'panel-primary',
            'heading' => [
                'visible' => true,
                'title'   => 'Uredi blog post'
            ],
            'body'    => [
                'visible' => true,
                'component' => true,
                'content' => [
                       [
                        'component_path' => 'Centaur::components.form.posts.edit',
                        'component_options' => [
                            'method' => 'POST',
                            'route' => 'posts.update',
                            'param' => $post
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
