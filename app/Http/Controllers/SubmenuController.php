<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;

class SubmenuController extends Controller
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
		
        $submenus = Submenu::latest()->paginate(30);
        return view('admin.submenu.index',compact('submenus'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$menu = Menu::get();
        return view('admin.submenu.create',compact('menu'));
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
            'menu_id' => 'required',
        ]);
		  $data = request()->all();
	
        Submenu::create($data);
    
        return redirect()->route('submenus.index')
                        ->with('success','Submenus created successfully.');
    }
    

    public function edit(Submenu $submenu)
    {
			$menu = Menu::get();
        return view('admin.submenu.edit',compact('submenu','menu'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submenu $submenu)
    {
         request()->validate([
				'name' => 'required',
            'link' => 'required',
            'menu_id' => 'required',
        ]);
		  $data = request()->all();
	  	
        $submenu->update($data);
    
        return redirect()->route('submenus.index')
                        ->with('success','Submenus updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submenu $submenu)
    {
        $submenu->delete();
    
        return redirect()->route('submenus.index')
                        ->with('success','Record deleted successfully');
    }
}
