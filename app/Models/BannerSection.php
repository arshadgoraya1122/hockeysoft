<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerSection extends Model
{
	protected $fillable =[
		'heading',
		'image'
	];
    use HasFactory;
}
