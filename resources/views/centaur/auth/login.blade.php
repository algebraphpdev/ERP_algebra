@extends('Centaur::layout', ['navbar' => false])

@section('title', 'Prijava')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        @component('Centaur::components.panel.content', [
            'class'   => 'panel-primary',
            'heading' => [
                'visible' => true,
                'title'   => 'Prijava'
            ],
            'body'    => [
                'visible' => true,
                'component' => true,
                'content' => [
                       [
                        'component_path' => 'Centaur::components.form.auth.login',
                        'component_options' => [
                            'method' => 'POST',
                            'route' => 'auth.login.attempt',
                            'param' => false
                        ]
                    ]
                            ]
            ],
            'footer'  => [
                'visible' => false,
                'content' => 'Footer'
            ]
        ])

        @endcomponent

    </div>
</div>
@stop
