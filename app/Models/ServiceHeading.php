<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceHeading extends Model
{
	protected $fillable = [
		'title',
		'heading'
	];
    use HasFactory;
}