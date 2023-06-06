<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	protected $fillable = [
		'name',
		'url'
	];

	public function submenu()
	{
		 return $this->hasMany(Submenu::class);
	}
    use HasFactory;
}
