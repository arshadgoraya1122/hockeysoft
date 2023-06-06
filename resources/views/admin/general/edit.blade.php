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
                        <h6 class="fs-17 font-weight-600 mb-0">General Settings</h6>
                    </div>
                </div>
            </div>
           
            <div class="card-body">
						<form action="{{ route('general.update',$general->id) }}" method="POST"enctype="multipart/form-data">
						@csrf
							@method('PUT')
                    <div class="form-group">
                        <label>Email <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{$general->email ?? ''}}" name="email"
                            placeholder="abc@gmail.com">
                        <div class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label>Facebook <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{$general->facebook ?? ''}}" name="facebook"
                            placeholder="https://facebook.com/">
                        <div class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label>Twitter <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{$general->twitter ?? ''}}" name="twitter"
                            placeholder="https://twitter.com/">
                        <div class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label>Linkedin <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{$general->linkedin ?? ''}}" name="linkedin"
                            placeholder="https://www.linkedin.com/feed/">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label>Pinterest <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{$general->pinterest ?? ''}}" name="pinterest"
                            placeholder="pinterest">
                        <div class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label>Heading <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{$general->heading ?? ''}}" name="heading"
                            placeholder="contact info heading">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label>Phone <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{$general->phone ?? ''}}" name="phone"
                            placeholder="123456778">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label>Meta name <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{$general->meta_name ?? ''}}" name="meta_name"
                            placeholder="meta name">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label>Meta Title <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{$general->meta_title ?? ''}}" name="meta_title"
                            placeholder="meta title">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label>Meta description <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{$general->meta_description ?? ''}}" name="meta_description"
                            placeholder="meta description">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label>Meta tags <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{$general->meta_tags ?? ''}}" name="meta_tags"
                            placeholder="meta tags">
                        <div class="text-danger"></div>
                    </div>
						  <img src="{{asset($general->logo ?? '')}}" width="100px"  height="50px" alt="">
                    <div class="form-group">
                        <label>Logo <small>For Display</small></label>
                        <input type="file" class="form-control"  name="logo"
                           >
                        <div class="text-danger"></div>
                    </div>
						  <img src="{{asset($general->ogimage ?? '')}}" width="100px"  height="50px" alt="">
                    <div class="form-group">
                        <label>Ogimage </label>
                        <input type="file" class="form-control" name="ogimage"
                           >
                        <div class="text-danger"></div>
                    </div>


                    <!-- webmaster tool-->
                    <div class="form-group">
                        <label>Address:</label>
                        <textarea id="oneditor" name="address" rows="3" class="form-control oneditor"
                            placeholder="address">{{$general->address ?? ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea id="oneditor" name="description" rows="3" class="form-control oneditor"
                            placeholder="description">{{$general->description ?? ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Footer Text:</label>
                        <textarea id="oneditor" name="footer_text" rows="5" class="form-control oneditor"
                            placeholder="Footer Text">{{$general->footer_text ?? ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Footer Text Copy Right:</label>
                        <textarea id="oneditor" name="copy_rights" rows="3" class="form-control oneditor"
                            placeholder="Footer Text">{{$general->copy_rights ?? ''}}</textarea>
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
