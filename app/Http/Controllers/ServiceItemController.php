<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class ServiceItemController extends Controller
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
		
        $item = ServiceItem::latest()->paginate(6);
		  $order = Option::where('option_key', 'service')->first();
        $order =(isset($order->id))?json_decode($order->option_value,true):array();
        return view('admin.service-items.index',compact('item','order'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$service = Service::get();
        return view('admin.service-items.create',compact('service'));
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
				
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
		  $data = request()->all();
	
        ServiceItem::create($data);
    
        return redirect()->route('products-and-services.index')
                        ->with('success','products and services created successfully.');
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
			$service = Service::get();
			$item = ServiceItem::where('id',$id)->first();
        return view('admin.service-items.edit',compact('item','service'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         request()->validate([
				'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
		  $data = request()->all();
	  $item=	ServiceItem::where('id',$id)->first();
        $item->update($data);
    
        return redirect()->route('products-and-services.index')
                        ->with('success','Products and Services updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			$item =ServiceItem::where('id',$id)->first();
        	$item->delete();
      
        return redirect()->route('products-and-services.index')
                        ->with('success','Record deleted successfully');
    }


		public function sort(Request $request)
		{
			$order = $request->input('order');
			// dd($order);
			// foreach ($order as $index => $itemId) {
			// 		$item = Option::find($itemId);
			// 		$item->option_value = $index + 1;
			// 		$item->save();
			// }

			$sideBar=Option::updateOrCreate(
				['option_key' => 'service'],
				[
					 'option_key' => 'service',
					 'option_value' => json_encode($order)
				]);

			return response()->json(['success' => true]);
		}
}
