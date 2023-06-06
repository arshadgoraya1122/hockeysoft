@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Permissions Management</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="col-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-box">
            <h4 class="header-title text-right">
                <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permission</a>
            </h4>
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($permissions as $key => $role)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('permissions.show',$role->id) }}">Show</a>
                            @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('permissions.edit',$role->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy',
                            $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>


</div>
@endsection
