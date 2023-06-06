<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
	protected $fillable = [
		'name',
		'link',
		'menu_id',
	];

	public function menu()
	{
		 return $this->belongsTo(Menu::class);
	}
    use HasFactory;
}
