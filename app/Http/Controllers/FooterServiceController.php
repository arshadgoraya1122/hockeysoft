<?php

namespace App\Http\Controllers;

use App\Models\FooterService;
use App\Models\FooterServiceCategory;
use Illuminate\Http\Request;

class FooterServiceController extends Controller
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
		
        $item = FooterService::latest()->get();
        return view('admin.footerlink.index',compact('item'))
            ->with('i', (request()->input('page', 1) - 1) * 30);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$service = FooterServiceCategory::get();
        return view('admin.footerlink.create',compact('service'));
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
            'link' => 'required',
            'category_id' => 'required',
        ]);
		  $data = request()->all();
	
        FooterService::create($data);
    
        return redirect()->route('footerlink.index')
                        ->with('success','Footer link created successfully.');
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
    public function edit($id)
    {	
			$item = FooterService::where('id',$id)->first();
			$service = FooterServiceCategory::get();
        return view('admin.footerlink.edit',compact('item','service'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         request()->validate([
				'name' => 'required',
            'link' => 'required',
            'category_id' => 'required',
        ]);
		  $item = FooterService::where('id',request('id'))->first();
		  $data = request()->all();
	  	
        $item->update($data);
    
        return redirect()->route('footerlink.index')
                        ->with('success','Link updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {	
		$footerservice = FooterService::where('id',$id)->first();
        $footerservice->delete();
    
        return redirect()->route('footerlink.index')
                        ->with('success','Record deleted successfully');
    }
}
