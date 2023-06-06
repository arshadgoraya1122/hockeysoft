<?php

namespace App\Http\Controllers;

use App\Models\BannerSection;
use App\Models\PortfolioHeading;
use App\Models\PortfolioSection;
use Illuminate\Http\Request;

class PortfolioSectionController extends Controller
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
        $portfolio = PortfolioSection::latest()->paginate(5);
        return view('admin.portfolio.index',compact('portfolio'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
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
            'domain' => 'required',
            'description' => 'required',
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

        PortfolioSection::create($data);
    
        return redirect()->route('portfolio.index')
                        ->with('success','portfolio created successfully.');
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
    public function edit(PortfolioSection $portfolio)
    {
        return view('admin.portfolio.edit',compact('portfolio'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioSection $portfolio)
    {
         request()->validate([
				'title' => 'required',
            'domain' => 'required',
            'description' => 'required',
        ]);
		  $data = request()->all();
		  if($request->file('image')){
			$file= $request->file('image');
			$path = 'images/front/';
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file-> move(public_path($path), $filename);
			$data['image'] = $path.''.$filename;
	  }
	  	
        $portfolio->update($data);
    
        return redirect()->route('portfolio.index')
                        ->with('success','portfolio updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioSection $portfolio)
    {
        $portfolio->delete();
    
        return redirect()->route('portfolio.index')
                        ->with('success','Record deleted successfully');
    }
   	//testimonial Heading
	public function portfolio_heading ()
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
		
			$f =PortfolioHeading::updateOrCreate([
				'id' => 1],[
					'title' => $title,
					'heading' => $heading,
				]);
				return redirect(url('/').'/admin/portfolio-heading')->with(["type"=>"success","msg"=>"Your $f->title Created successfully"]);
			
		}
		$heading= PortfolioHeading::get()->first();
		return view('admin.portfolio.heading',compact('heading'));
	}
}
