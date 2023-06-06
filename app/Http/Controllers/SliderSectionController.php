<?php

namespace App\Http\Controllers;

use App\Models\SliderSection;
use Illuminate\Http\Request;

class SliderSectionController extends Controller
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
  

    public function header()
    {
       
		  if(request()->isMethod('post')){
			// dd(request()->all());
			request()->validate([
				"url" => "required",
				"meta_title" => "required",
				"meta_description" => "required",
				"button_text" => "required",
				"button_url" => "required",
				"title" => "required",
				"description" => "required",
				// "logo1" => "required",
				// "logo2" => "required",
				// "background_image" => "required",
        ]);

		$id = request('id');
			if($id != 1){
				request()->validate([
							"logo1" => "required",
							"logo2" => "required",
							"background_image" => "required",
					]);
			}
			$title = request('title');
			$description = request('description');
			$url = request('url');
			$meta_title = request('meta_title');
			$meta_description = request('meta_description');
			$button_text = request('button_text');
			$button_url = request('button_url');
		  if($id == 1){
			$slider = SliderSection::where('id',$id)->first();
			$logo1 = $slider->logo1 ?? "";
			$logo2 = $slider->logo2 ?? "";
			$background_image = $slider->background_image ?? "";
		  	}
			
		  	$request = request();
			if($request->file('logo1')){
				$file= $request->file('logo1');
				$path = 'images/front/';
				$filename = date('YmdHi').$file->getClientOriginalName();
				$file-> move(public_path($path), $filename);
				$logo1 = $path.''.$filename;
		  }
		  if($request->file('logo2')){
				$file= $request->file('logo2');
				$path = 'images/front/';
				$filename = date('YmdHi').$file->getClientOriginalName();
				$file-> move(public_path($path), $filename);
				$logo2 = $path.''.$filename;
			}
			if($request->file('background_image')){
					$file= $request->file('background_image');
					$path = 'images/front/';
					$filename = date('YmdHi').$file->getClientOriginalName();
					$file-> move(public_path($path), $filename);
					$background_image = $path.''.$filename;
				}

			$f =SliderSection::updateOrCreate([
					'id' => 1],[
					'title' => $title,
					'description' => $description,
					"url" => $url,
					"meta_title" => $meta_title,
					"meta_description" => $meta_description,
					"button_text" => $button_text,
					"button_url" => $button_url,
					"logo1" => $logo1,
					"logo2" => $logo2,
					"background_image" => $background_image,
				]);
				return redirect(url('/').'/admin/header')->with(["type"=>"success","msg"=>"Your $f->title Created successfully"]);
			
		}
		$header= SliderSection::get()->first();
		return view('admin.slider.edit',compact('header'));
    }
    
   
}
