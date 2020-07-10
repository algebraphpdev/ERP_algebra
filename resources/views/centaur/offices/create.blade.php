@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Create New Office')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @component('Centaur::components.panel.content', [
            'class'   => 'panel-primary',
            'heading' => [
                'visible' => true,
                'title'   => 'Create a new office'
            ],
            'body'    => [
                'visible' => true,
                'component' => true,
                'content' => [
                       [
                        'component_path' => 'Centaur::components.form.offices.create',
                        'component_options' => [
                            'method' => 'POST',
                            'route' => 'offices.store',
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
