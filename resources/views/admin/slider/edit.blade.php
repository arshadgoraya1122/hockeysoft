@extends('layouts.admin')
@section('styles')

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
                        <h6 class="fs-17 font-weight-600 mb-0">Header</h6>
                    </div>
						  {{-- <div class="text-right">
									<a class="btn btn-success" href="{{ route('header.index') }}">Back</a>
							</div> --}}
                </div>
            </div>
    
            <div class="card-body">
					<form  method="POST"enctype="multipart/form-data">
						@csrf
						<input type="text" name="id" value="{{$header->id ?? ''}}" hidden>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Url:</label>
										<input type="text" name="url" class="form-control" value="{{$header->url ?? ''}}">
								  </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Meta Title:</label>
										<input type="text" name="meta_title" class="form-control" value="{{$header->meta_title ?? ''}}">
								  </div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label>Meta Description:</label>
									<textarea id="oneditor" name="meta_description" class="form-control oneditor" rows="4">  {{$header->meta_description ?? ''}} </textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Button Text:</label>
										<input type="text" name="button_text" class="form-control" value="{{$header->button_text ?? ''}}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Button Url:</label>
										<input type="text" name="button_url" class="form-control" value="{{$header->button_url ?? ''}}">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="form-group col-md-12">
									<label>H1:</label>
									<input type="text" name="title" class="form-control" value="{{$header->title ?? ''}}">
							  	</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Logo1:</label>
										<input type="file" name="logo1" id="imageUpload" accept="image/*" class="form-control-file">
									</div>
										<div class="form-group">
											<img src="{{asset($header->logo1)}}" id="previewImage" alt="Preview" style="max-width: 200px; @if(empty($header->logo1)) display: none; @endif">
										</div>
										<div class="form-group">
											<button type="button" onclick="cancelImage()" class="btn btn-danger">Cancel</button>
											
										</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>Logo2:</label>
										<input type="file" name="logo2" id="imageUpload1" accept="image/*" class="form-control-file">
									</div>
										<div class="form-group">
											<img src="{{asset($header->logo2)}}" id="previewImage1" alt="Preview" style="max-width: 200px;@if(empty($header->logo2)) display: none; @endif">
										</div>
										<div class="form-group">
											<button type="button" onclick="cancelImage1()" class="btn btn-danger">Cancel</button>
											
										</div>
								</div>
							</div>

                    <div class="form-group">
                        <label>H1 Text:</label>
                        <textarea id="oneditor" name="description" rows="9" class="form-control oneditor"
                            placeholder="description">{{$header->description ?? ''}}</textarea>
                    </div>
						  <div class="col-12">
								<div class="form-group">
									<label>Background:</label>
									<input type="file" name="background_image" id="imageUpload2" accept="image/*" class="form-control-file">
								</div>
									<div class="form-group">
										<img src="{{asset($header->background_image)}}" id="previewImage2" alt="Preview" style="max-width: 200px; @if(empty($header->background_image)) display: none; @endif">
									</div>
									<div class="form-group">
										<button type="button" onclick="cancelImage2()" class="btn btn-danger">Cancel</button>
										
									</div>
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

<script>
	var selectedImage = null;
	var previewImage = document.getElementById("previewImage1");

	// Function to handle the file selection
	function handleImageSelect1(event) {
	  selectedImage = event.target.files[0];
	  previewImage.src = URL.createObjectURL(selectedImage);
	  previewImage.style.display = "block";
	}

	// Function to cancel the selected image
	function cancelImage1() {
	  selectedImage = null;
	  previewImage.src = "";
	  previewImage.style.display = "none";
	  document.getElementById("imageUpload1").value = "";
	}

	// Function to upload the selected image
	function uploadImage1() {
	  if (selectedImage) {
		 // Perform the upload process here
		 console.log("Uploading image:", selectedImage);
	  } else {
		 console.log("No image selected.");
	  }
	}

	// Attach an event listener to the file input element
	document.getElementById("imageUpload1").addEventListener("change", handleImageSelect1);
</script>
<script>
	var selectedImage2 = null;
	var previewImage2 = document.getElementById("previewImage2");

	// Function to handle the file selection
	function handleImageSelect2(event) {
	  selectedImage2 = event.target.files[0];
	  previewImage2.src = URL.createObjectURL(selectedImage2);
	  previewImage2.style.display = "block";
	}

	// Function to cancel the selected image
	function cancelImage1() {
	  selectedImage2 = null;
	  previewImage2.src = "";
	  previewImage2.style.display = "none";
	  document.getElementById("imageUpload2").value = "";
	}

	// Function to upload the selected image
	function uploadImage2() {
	  if (selectedImage2) {
		 // Perform the upload process here
		 console.log("Uploading image:", selectedImage2);
	  } else {
		 console.log("No image selected.");
	  }
	}

	// Attach an event listener to the file input element
	document.getElementById("imageUpload2").addEventListener("change", handleImageSelect2);
</script>
@endsection

