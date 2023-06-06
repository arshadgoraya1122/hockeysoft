<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceHeading;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
	
  function __construct()
  {
		 $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
		 $this->middleware('permission:product-create', ['only' => ['create','store']]);
		 $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
		 $this->middleware('permission:product-delete', ['only' => ['destroy']]);
  }
  /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
  public function index()
  {
		$services = Service::latest()->paginate(5);
		return view('admin.services.index',compact('services'))
			 ->with('i', (request()->input('page', 1) - 1) * 5);
  }
  
  /**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
  public function create()
  {
		return view('admin.services.create');
  }
  
  /**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
  public function store(Request $request)
  {
		request()->validate([
			 'service' => 'required',
		]);
		$data = request()->all();

		Service::create($data);
  
		return redirect()->route('services.index')
							 ->with('success','services created successfully.');
  }
  
  /**
	* Display the specified resource.
	*
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
 //  public function show(Product $product)
 //  {
 //      return view('products.show',compact('product'));
 //  }
  
  /**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
  public function edit(Service $service)
  {
		return view('admin.services.edit',compact('service'));
  }
  
  /**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
  public function update(Request $request, Service $service)
  {
		 request()->validate([
			 'service' => 'required',
		]);
		$data = request()->all();
		
		$service->update($data);
  
		return redirect()->route('services.index')
							 ->with('success','Services updated successfully');
  }
  
  /**
	* Remove the specified resource from storage.
	*
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
  public function destroy(Service $service)
  {
		$service->delete();
  
		return redirect()->route('services.index')
							 ->with('success','Record deleted successfully');
  }
   	//testimonial Heading
	public function service_heading ()
	{
	
		if(request()->isMethod('post')){
			// dd(request()->all());
			request()->validate([
				'title' => 'required',
				'heading' => 'required',
			]);
			$id = request('id');
			$title = request('title');
			$heading = request('heading');
		
			$f =ServiceHeading::updateOrCreate([
				'id' => 1],[
					'title' => $title,
					'heading' => $heading,
				]);
				return redirect(url('/').'/admin/services-heading')->with(["type"=>"success","msg"=>"Your $f->title Created successfully"]);
			
		}
		$heading= ServiceHeading::get()->first();
		return view('admin.services.heading',compact('heading'));
	}

}
