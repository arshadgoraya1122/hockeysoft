@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-10">
        @if (Session::has('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{!! Session('msg') !!}</strong>
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
                        <h6 class="fs-17 font-weight-600 mb-0">Testamonials</h6>
                    </div>
						  <div class="text-right">
									<a class="btn btn-success" href="{{ route('testimonial.index') }}">Back</a>
							</div>
                </div>
            </div>
    
            <div class="card-body">
                <form method="POST" action="{{route('testimonial.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name:</label>
								<input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Designation:</label>
								<input type="text" name="designation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Rating:</label>
								<input type="number" name="rating" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>detail:</label>
                        <textarea id="m" name="detail" rows="3" class="form-control oneditor" id="oneditor"
                            placeholder="detail"></textarea>
                    </div>
						  <div class="form-group">
									<label>Image:</label>
									<input type="file" name="image" class="form-control">
							</div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
