<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterServiceCategory extends Model
{
	protected $fillable =[
		'name'
	];
    use HasFactory;

	 public function link()
    {
        return $this->hasMany(FooterService::class);
    }
}
