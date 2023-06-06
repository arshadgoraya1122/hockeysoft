<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireSection extends Model
{
	protected $fillable =[
		'title',
		'heading',
		'link',
		'description'
	];
    use HasFactory;
}
