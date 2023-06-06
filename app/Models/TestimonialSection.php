<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialSection extends Model
{
	protected $fillable =[
		'name',
		'designation',
		'rating',
		'detail',
		'image'
	];
    use HasFactory;
}
