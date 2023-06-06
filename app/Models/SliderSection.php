<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderSection extends Model
{
	protected $fillable =[
		"url" 			 		,
		"meta_title" 			,
		"meta_description" 	,
		"button_text" 			,
		"button_url" 			,
		"title" 					,
		"description" 			,
		"logo1" 					,
		"logo2" 					,
		"background_image" 	,
	];
    use HasFactory;
}
