@extends('Centaur::layout', ['navbar' => true])

@section('title', 'Trash')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('offices.index') }}">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                Go back
            </a>
        </div>
        <div>
        <h1>Deleted offices</h1>
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
                        @forelse ($offices as $office)
                            <tr>
                                <td>{{ $office->city }}</td>
                                <td>{{ $office->phone }}</td>
                                <td>{{ $office->addressLine1 }}</td>
                                <td>{{ $office->postalCode }}</td>
                                <td>{{ $office->country }}</td>
                                <td>
                                <a href="{{ route('offices.restore', $office) }}" type="button" class="btn btn-success btn-xs">Restore</a>
                                    <a href="{{ route('offices.destroy', $office) }}" type="button" class="btn btn-danger btn-xs action_confirm" data-method="DELETE" data-token="{{ csrf_token() }}">Permanent Delete</a>
                                </td>

                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Trash is empty!</td>
                                </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $offices->links() }}
            </div>
        </div>
    </div>
@stop
