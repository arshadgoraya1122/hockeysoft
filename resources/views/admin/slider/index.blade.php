@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-10">
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{!! Session('success') !!}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
<div class="card mb-4">
	<div class="card-header">
		 <div class="d-flex justify-content-between align-items-center">
			  <div>
					<h6 class="fs-17 font-weight-600 mb-0">Header</h6>
			  </div>
			  @if(count($slider)<1)
			  <div class="text-right">
					<a class="btn btn-success" href="{{ route('header.create') }}"> Create New</a>
			  </div>
			  @endif
		 </div>
	</div>
	<div class="card-body">
		 <div class="table-responsive">
			  <table class="table table-borderless">
					<thead>
						 <tr>
							  <th scope="col">#</th>
							  <th scope="col">Title</th>
							  <th scope="col">action</th>
						 </tr>
					</thead>
					<tbody>
						@foreach ($slider as $key => $s)
							<tr>
							  <th scope="row">{{$key+1}}</th>
							  <td>{{$s->title ?? ''}}</td>
							  <td>
								<form action="{{ route('header.destroy',$s->id) }}" method="POST">
									@can('admin-edit')
									<a class="btn btn-primary" href="{{ route('header.edit',$s->id) }}">Edit</a>
									@endcan
		 
		 
									@csrf
									@method('DELETE')
									@can('admin-delete')
									<button type="submit" class="btn btn-danger">Delete</button>
									@endcan
							  </form>
							  </td>
						 </tr>
						@endforeach
						
					</tbody>
			  </table>
		 </div>
	</div>
</div>
    </div>
</div>
@endsection
