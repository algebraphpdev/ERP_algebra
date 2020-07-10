@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Edit Office')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @component('Centaur::components.panel.content', [
            'class'   => 'panel-primary',
            'heading' => [
                'visible' => true,
                'title'   => 'Edit Office'
            ],
            'body'    => [
                'visible' => true,
                'component' => true,
                'content' => [
                       [
                        'component_path' => 'Centaur::components.form.offices.edit',
                        'component_options' => [
                            'method' => 'POST',
                            'route' => 'offices.update',
                            'param' => $office
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
