@extends('layouts.admin')
@section('content')
 <style>
        .d-flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 72vh;
				width: 100vw;
        }
    </style>
<div class="row">
	<div class="d-flex-center">
		<h1>Welcome!</h1>
  </div>
</div>

@endsection
@section('scripts')

<script src="{{ asset('dashassets/dist/js/pages/home-demo.js') }}" defer></script>
@endsection
