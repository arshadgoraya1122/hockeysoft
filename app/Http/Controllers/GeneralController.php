<?php

namespace App\Http\Controllers;

use App\Models\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
	
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $general = General::latest()->paginate(5);
        return view('admin.general.index',compact('general'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.general.create');
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
			'heading' => 'required',
			'phone'  => 'required',
			'email'  => 'required',
			'logo'  => 'required',
			'ogimage'  => 'required',
			'meta_name'  => 'required',
			'meta_title'  => 'required',
			'meta_description'  => 'required',
			'facebook'  => 'required',
			'twitter'  => 'required',
			'pinterest'  => 'required',
			'linkedin'  => 'required',
			'footer_text'  => 'required',
			'copy_rights'  => 'required',
			'meta_tags'  => 'required',
			'address'  => 'required',
			'description'  => 'required',
        ]);
		  $data = request()->all();
		   if($request->file('logo')){
            $file= $request->file('logo');
				$path = 'images/front/';
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path($path), $filename);
            $data['logo'] = $path.''.$filename;
        }
		   if($request->file('ogimage')){
            $file= $request->file('ogimage');
				$path = 'images/front/';
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path($path), $filename);
            $data['ogimage'] = $path.''.$filename;
        }

        General::create($data);
    
        return redirect()->route('general.index')
                        ->with('success','general created successfully.');
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
    public function edit(General $general)
    {
        return view('admin.general.edit',compact('general'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, General $general)
    {
         request()->validate([
				'heading' => 'required',
				'phone'  => 'required',
				'email'  => 'required',
				'meta_name'  => 'required',
				'meta_title'  => 'required',
				'meta_description'  => 'required',
				'facebook'  => 'required',
				'twitter'  => 'required',
				'pinterest'  => 'required',
				'linkedin'  => 'required',
				'footer_text'  => 'required',
				'copy_rights'  => 'required',
				'meta_tags'  => 'required',
				'address'  => 'required',
				'description'  => 'required',
        ]);
		  $data = request()->all();
		  if($request->file('logo')){
			$file= $request->file('logo');
			$path = 'images/front/';
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file-> move(public_path($path), $filename);
			$data['logo'] = $path.''.$filename;
	  }
		if($request->file('ogimage')){
			$file= $request->file('ogimage');
			$path = 'images/front/';
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file-> move(public_path($path), $filename);
			$data['ogimage'] = $path.''.$filename;
	  }

	  	
        $general->update($data);
    
        return redirect()->route('general.index')
                        ->with('success','general updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(General $general)
    {
        $general->delete();
    
        return redirect()->route('general.index')
                        ->with('success','Record deleted successfully');
    }
  
}
