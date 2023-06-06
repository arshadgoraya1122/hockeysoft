<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
	protected $fillable=[
		'icon',
		'title',
		'category_id',
		'description'
	];
    use HasFactory;
}
