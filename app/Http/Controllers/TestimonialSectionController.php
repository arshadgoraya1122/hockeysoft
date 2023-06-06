<?php

namespace App\Http\Controllers;

use App\Models\TestimonialHeading;
use App\Models\TestimonialSection;
use Illuminate\Http\Request;

class TestimonialSectionController extends Controller
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
		 $testimonial = TestimonialSection::latest()->paginate(5);
		 return view('admin.testimonial.index',compact('testimonial'))
			  ->with('i', (request()->input('page', 1) - 1) * 5);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		 return view('admin.testimonial.create');
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
			  'name' => 'required',
			  'designation' => 'required',
			  'rating' => 'required',
			  'detail' => 'required',
			  'image' => 'required',
		 ]);
		 $data = request()->all();
		  if($request->file('image')){
			  $file= $request->file('image');
			  $path = 'images/front/';
			  $filename = date('YmdHi').$file->getClientOriginalName();
			  $file-> move(public_path($path), $filename);
			  $data['image'] = $path.''.$filename;
		 }

		 TestimonialSection::create($data);
	
		 return redirect()->route('testimonial.index')
							  ->with('success','testimonial created successfully.');
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
	public function edit(TestimonialSection $testimonial)
	{
		 return view('admin.testimonial.edit',compact('testimonial'));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, TestimonialSection $testimonial)
	{
		  request()->validate([
			'name' => 'required',
			'designation' => 'required',
			'rating' => 'required',
			'detail' => 'required',
		 ]);
		 $data = request()->all();
		 if($request->file('image')){
		  $file= $request->file('image');
		  $path = 'images/front/';
		  $filename = date('YmdHi').$file->getClientOriginalName();
		  $file-> move(public_path($path), $filename);
		  $data['image'] = $path.''.$filename;
	 }
		 
		 $testimonial->update($data);
	
		 return redirect()->route('testimonial.index')
							  ->with('success','testimonial updated successfully');
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(TestimonialSection $testimonial)
	{
		 $testimonial->delete();
	
		 return redirect()->route('testimonial.index')
							  ->with('success','Record deleted successfully');
	}
	  //testimonial Heading
  public function testimonial_heading ()
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
	  
		  $f =TestimonialHeading::updateOrCreate([
			  'id' => 1],[
				  'title' => $title,
				  'heading' => $heading,
			  ]);
			  return redirect(url('/').'/admin/testimonial-heading')->with(["type"=>"success","msg"=>"Your $f->title Created successfully"]);
		  
	  }
	  $heading= TestimonialHeading::get()->first();
	  return view('admin.testimonial.heading',compact('heading'));
  }
}
