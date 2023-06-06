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
                        <h6 class="fs-17 font-weight-600 mb-0">About Us</h6>
                    </div>
						  {{-- <div class="text-right">
									<a class="btn btn-success" href="{{ route('about.us') }}">Back</a>
							</div> --}}
                </div>
            </div>
    
            <div class="card-body">
					<form method="POST"enctype="multipart/form-data">
						@csrf
							<input type="text" name="id" value="{{$about->id ?? ''}}" hidden>
                    <div class="form-group">
                        <label>Title:</label>
								<input type="text" name="title" class="form-control" value="{{$about->title ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label>H2:</label>
								<input type="text" name="heading" class="form-control" value="{{$about->heading ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label>Free Text:</label>
                        <textarea id="m" name="detail" rows="12" class="form-control oneditor" id="oneditor"
                            placeholder="description">{{$about->detail ?? ''}}</textarea>
                    </div>
						  {{-- <div class="form-group">
									<label>Image:</label>
									<input type="file" name="image" class="form-control">
							</div> --}}

							<div class="form-group">
								<label>Image:</label>
								<input type="file" name="image" id="imageUpload" accept="image/*" class="form-control-file">
							</div>
								<div class="form-group">
									<img src="{{asset($about->image)}}" id="previewImage" alt="Preview" style="max-width: 200px; @if(empty($about->image)) display: none; @endif">
								</div>
								<div class="form-group">
									<button type="button" onclick="cancelImage()" class="btn btn-danger">Cancel</button>
									
								</div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
	var selectedImage1 = null;
	var previewImage1 = document.getElementById("previewImage");

	// Function to handle the file selection
	function handleImageSelect(event) {
	  selectedImage1 = event.target.files[0];
	  previewImage1.src = URL.createObjectURL(selectedImage1);
	  previewImage1.style.display = "block";
	}

	// Function to cancel the selected image
	function cancelImage() {
	  selectedImage1 = null;
	  previewImage1.src = "";
	  previewImage1.style.display = "none";
	  document.getElementById("imageUpload").value = "";
	}

	// Function to upload the selected image
	function uploadImage() {
	  if (selectedImage1) {
		 // Perform the upload process here
		 console.log("Uploading image:", selectedImage1);
	  } else {
		 console.log("No image selected.");
	  }
	}

	// Attach an event listener to the file input element
	document.getElementById("imageUpload").addEventListener("change", handleImageSelect);
 </script>


@endsection
