<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioSection extends Model
{
	protected $fillable =[
		'title',
		'domain',
		'description',
		'image'
	];
    use HasFactory;
}