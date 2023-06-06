<?php

namespace App\Http\Controllers;

use App\Models\HireSection;
use Illuminate\Http\Request;

class HireSectionController extends Controller
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
        $hire = HireSection::latest()->paginate(5);
        return view('admin.hire.index',compact('hire'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hire.create');
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
            'heading' => 'required',
            'link' => 'nullable',
            'description' => 'required',
        ]);
    
        HireSection::create($request->all());
    
        return redirect()->route('hire.index')
                        ->with('success','hire created successfully.');
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
    public function edit(HireSection $hire)
    {
        return view('admin.hire.edit',compact('hire'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HireSection $hire)
    {
         request()->validate([
            'title' => 'required',
            'heading' => 'required',
            'link' => 'nullable',
            'description' => 'required',
        ]);
    
        $hire->update($request->all());
    
        return redirect()->route('hire.index')
                        ->with('success','hire updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(HireSection $hire)
    {
        $hire->delete();
    
        return redirect()->route('hire.index')
                        ->with('success','hire deleted successfully');
    }
}
