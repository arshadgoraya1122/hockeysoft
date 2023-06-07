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
					<h6 class="fs-17 font-weight-600 mb-0">Products and Services</h6>
			  </div>
			  <div class="text-right">
					<a class="btn btn-success" href="{{ route('products-and-services.create') }}"> Create New</a>
					{{-- <a class="btn btn-success" href="{{ route('services.index') }}"> Services</a> --}}
			  </div>
		 </div>
	</div>
	<div class="card-body">
		 <div class="table-responsive">
			  <table class="table table-borderless table-striped" id="sortable-table" cellpadding="0" cellspacing="0" border="1">
					<thead>
						 <tr>
							  <th scope="col">#</th>
							  <th scope="col">Title</th>
							  <th scope="col">action</th>
						 </tr>
					</thead>
					<tbody>
						@foreach ($order as $key => $os)
							@foreach ($item as  $s)
							@if($os == $s->id)
							<tr data-item-id="{{ $s->id }}" class="pointer-cursor" >
								<th scope="row">{{$key+1}}</th>
								<td>{{$s->title ?? ''}}</td>
								<td>
									<form action="{{ route('products-and-services.destroy',$s->id) }}" method="POST">
										@can('admin-edit')
										<a class="btn btn-primary" href="{{ route('products-and-services.edit',$s->id) }}">Edit</a>
										@endcan
			
			
										@csrf
										@method('DELETE')
										@can('admin-delete')
										<button type="submit" class="btn btn-danger">Delete</button>
										@endcan
								</form>
								</td>
							</tr>
						@endif
						@endforeach
						@endforeach
				
						
					</tbody>
			  </table>
		 </div>
	</div>
</div>
    </div>
</div>
@endsection
@section('scripts')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css" />
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
<script type="text/javascript">

	$(document).ready(function() {
	$("#sortable-table tbody").sortable({
		helper: fixWidthHelper,
		handle: "td",
		update: function(event, ui) {
			// Update the table after sorting
			updateTable();
		}
	}).disableSelection();

	// Function to fix the width of the helper element
	function fixWidthHelper(e, ui) {
		ui.children().each(function() {
			$(this).width($(this).width());
		});
		return ui;
	}

	// Function to update the table after sorting
	function updateTable() {
		$("#sortable-table tbody tr").each(function(index) {
			$(this).find("td:first-child").text(index + 1);
		});
	}
});


$(document).ready(function() {
    $("#sortable-table tbody").sortable({
        update: function(event, ui) {
            var order = [];
            $(this).children().each(function(index) {
                var itemId = $(this).data("item-id");
                order.push(itemId);
            });
				var csrfToken = '{{ csrf_token() }}';
            // Send the updated order to the Laravel route
            $.ajax({
                url: "{{ route('items.sort') }}",
                type: "POST",
					 headers: {
							"X-CSRF-TOKEN": csrfToken
						},
                data: { order: order },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});
</script>

@endsection