@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Offices')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('offices.trash') }}">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                Trash
            </a>
            <a class="btn btn-primary btn-lg" href="{{ route('offices.create') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Create Offices
            </a>
        </div>
        <h1>Offices</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Country</th>
                            <th>Postal Code</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offices as $office)
                            <tr>
                                <td>{{ $office->city }}</td>
                                <td>{{ $office->phone }}</td>
                                <td>{{ $office->addressLine1 }}</td>
                                <td>{{ $office->postalCode }}</td>
                                <td>{{ $office->country }}</td>
                                <td>
                                    <a href="{{ route('offices.edit', $office) }}" type="button" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="{{ route('offices.destroy', $office) }}" type="button" class="btn btn-danger btn-xs action_confirm" data-method="DELETE" data-token="{{ csrf_token() }}">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $offices->links() }}
            </div>
        </div>
    </div>
@stop
