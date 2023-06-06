<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\BannerSection;
use App\Models\FooterService;
use App\Models\FooterServiceCategory;
use App\Models\General;
use App\Models\HireSection;
use App\Models\Menu;
use App\Models\Newsletter;
use App\Models\PortfolioHeading;
use App\Models\PortfolioSection;
use App\Models\ServiceHeading;
use App\Models\ServiceItem;
use App\Models\SliderSection;
use App\Models\TestimonialHeading;
use App\Models\TestimonialSection;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function home()
	{
		$slider = SliderSection::first();
		$about = AboutSection::first();
		$s_heading = ServiceHeading::first();
		$s_item = ServiceItem::limit(6)->orderBy('created_at','DESC')->get();
		$banner = BannerSection::first();
		$portfolio = PortfolioSection::limit(2)->orderBy('created_at','DESC')->get();
		$portfolio_h = PortfolioHeading::first();
		$testimonial = TestimonialSection::orderBy('created_at','DESC')->get();
		$testimonial_h = TestimonialHeading::first();
		$hire = HireSection::first();
		$newsletter = Newsletter::first();
		return view('welcome',compact('newsletter','hire','slider','about','s_heading','s_item','banner','portfolio','portfolio_h','testimonial','testimonial_h'));
	}

	public function servics()
	{
		$cat= FooterServiceCategory::latest()->get();
		$cat= FooterService::latest()->get();
		$category =FooterServiceCategory::limit(2)->orderBy('id','ASC')->get();
		foreach($category as $key => $c){
			if ($key == 0) {
				$cat_1=$c->name;
				$serv1=FooterService::where('category_id',$c->id)->get();
			} 
			if($key == 1){
				$cat_2 =$c->name;
				$serv2=FooterService::where('category_id',$c->id)->get();
			}
			
		}
		return [
			'cat_1' => $cat_1,
			'cat_2' => $cat_2,
			'serv1'=>$serv1,
			'serv2' =>$serv2,
		];
	}
	public function general()
	{
		$general= General::latest()->first();

		return $general;
	}
	public function menu()
	{
		$menu= Menu::with('submenu')->get();

		return $menu;
	}
	public function header()
	{
			$header = SliderSection::first();

		return $header;
	}
}
