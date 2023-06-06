<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
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

    public function about()
    {
		if(request()->isMethod('post')){
			// dd(request()->all());
		   request()->validate([
				'title' => 'required',
            'heading' => 'required',
            'detail' => 'required',
        	]);
			$id = request('id');
			if($id != 1){
				request()->validate([
					'image' => 'required',
				]);
			}
		  
		
			$title = request('title');
			$heading = request('heading');
			$detail = request('detail');
		
		$request = request();
		  $data = request()->all();
		  if($request->file('image')){
			$file= $request->file('image');
			$path = 'images/front/';
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file-> move(public_path($path), $filename);
			$data['image'] = $path.''.$filename;
	  }
	  	if($id == 1){
			$about = AboutSection::where('id',$id)->first();
			$about->update($data);
		}else{
			$about =AboutSection::create($data);
		}
        
				
				return redirect(url('/').'/admin/about-us')->with(["type"=>"success","msg"=>"Your $about->title Created successfully"]);
			
		}
		$about= AboutSection::first();
		return view('admin.about.edit',compact('about'));
	}
 
}
