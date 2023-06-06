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
            @php
            $logo = isset($setting->logo) ? $setting->logo : old('logo');
            $favicon = isset($setting->favicon) ? $setting->favicon : old('favicon');
            $og = isset($setting->og) ? $setting->og : old('og');
            $footer_logo = isset($setting->footer_logo) ? $setting->footer_logo : old('footer_logo');
            $facebook = isset($setting->facebook) ? $setting->facebook : old('facebook');
            $twitter = isset($setting->twitter) ? $setting->twitter : old('twitter');
            $linkedin = isset($setting->linkedin) ? $setting->linkedin : old('linkedin');
            $instagram = isset($setting->instagram) ? $setting->instagram : old('instagram');
            $youtube = isset($setting->youtube) ? $setting->youtube : old('youtube');
            $google_analytics = isset($setting->google_analytics) ? $setting->google_analytics :
            old('google_analytics');
            $web_master = isset($setting->web_master) ? $setting->web_master : old('web_master');
            $bing_master = isset($setting->bing) ? $setting->bing : old('bing_master');
            $extra_header = isset($setting->extra_header) ? $setting->extra_header : old('extra_header');
            $extra_footer = isset($setting->extra_footer) ? $setting->extra_footer : old('extra_footer');
            $footer_text = isset($setting->footer_text) ? $setting->footer_text : old('footer_text ');
            $copy_rights = isset($setting->copy_rights) ? $setting->copy_rights : old('copy_rights ');
            $email = isset($setting->email) ? $setting->email : old('email ');
            @endphp
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="1">
                    <div class="form-row">
                        <div class="form-group col-lg-3 col-md-3 logo-img">
                            <label for="" class="req">Logo</label> <br>
                            <div class="uc-image">
                                <span class="clear-image-x">x</span>
                                <input type="hidden" name="logo" value="{{ $logo }}">
                                <div id="coover" class="image_display">
                                    <img src="{{ $logo }}">
                                </div>
                                <div style="margin-top:10px;">
                                    <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display"
                                        data-return="#coover" data-link="logo">Add Image</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-lg-3 col-md-3 logo-img">
                            <label for="" class="req">Favicon</label>
                            <div class="uc-image">
                                <span class="clear-image-x">x</span>
                                <input type="hidden" name="favicon" value="{{ $favicon }}">
                                <div id="favicon" class="image_display">

                                    <img src="{{ $favicon }}">
                                </div>
                                <div style="margin-top:10px;">
                                    <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display"
                                        data-return="#favicon" data-link="favicon">Add Image</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-3 col-md-3 logo-img">
                            <label for="" class="req">OG image</label>
                            <div class="uc-image">
                                <span class="clear-image-x">x</span>
                                <input type="hidden" name="og" value="{{ $og }}">
                                <div id="og" class="image_display">
                                    <img src="{{ $og }}">
                                </div>
                                <div style="margin-top:10px;">
                                    <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display"
                                        data-return="#og" data-link="og">Add Image</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-3 col-md-3 logo-img">
                            <label for="" class="req">Footer Logo</label>
                            <div class="uc-image">
                                <span class="clear-image-x">x</span>
                                <input type="hidden" name="footer_logo" value="{{ $footer_logo }}">
                                <div id="footer_logo" class="image_display">

                                    <img src="{{ $footer_logo }}">
                                </div>
                                <div style="margin-top:10px;">
                                    <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display"
                                        data-return="#footer_logo" data-link="footer_logo">Add Image</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{ $email }}" name="email"
                            placeholder="salebaba@gmail.com">
                        <div class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label>Facebook <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{ $facebook }}" name="facebook"
                            placeholder="https://facebook.com/">
                        <div class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label>Twitter <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{ $twitter }}" name="twitter"
                            placeholder="https://twitter.com/">
                        <div class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label>Linkedin <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{ $linkedin }}" name="linkedin"
                            placeholder="https://www.linkedin.com/feed/">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label>Instagram <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{ $instagram }}" name="instagram"
                            placeholder="Instagram">
                        <div class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label>Youtube <small>For Display</small></label>
                        <input type="text" class="form-control" value="{{ $youtube }}" name="youtube"
                            placeholder="https://youtube.com/">
                        <div class="text-danger"></div>
                    </div>

                    <div class="form-group ">
                        <label>Google Analytics:</label>
                        <textarea id="m" name="google_analytics" rows="3" class="form-control"
                            placeholder="Google Analytics">{{ $google_analytics }}</textarea>
                    </div>
                    <!-- webmaster tool-->
                    <div class="form-group">
                        <label>Google Web Master Tools Meta Tags:</label>
                        <textarea id="m" name="web_master" rows="3" class="form-control"
                            placeholder="Web Master Tools Meta Tags">{{ $web_master }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Bing Master Tools Meta Tags:</label>
                        <textarea id="m" name="bing_master" rows="3" class="form-control"
                            placeholder="Bing Master Tools Meta Tags">{{ $bing_master }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Extra Scripts For Website in Head Tag ( multiple scripts in new line )</label>
                        <textarea id="m" name="extra_header" rows="5" class="form-control"
                            placeholder="Write All Extra Scripts In Head tag ">{{ $extra_header }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Extra Scripts For Website in Footer Tag ( multiple scripts in new line )</label>
                        <textarea id="m" name="extra_footer" rows="5" class="form-control"
                            placeholder="Write All Extra Scripts In Head tag ">{{ $extra_footer }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Footer Text:</label>
                        <textarea id="m_f" name="footer_text" rows="5" class="form-control"
                            placeholder="Footer Text">{{ $footer_text }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Footer Text Copy Right:</label>
                        <textarea id="m" name="copy_rights" rows="3" class="form-control"
                            placeholder="Footer Text">{{ $copy_rights }}</textarea>
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
