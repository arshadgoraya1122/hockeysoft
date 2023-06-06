<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterService extends Model
{
	protected $fillable=[
		'link',
		'name',
		'category_id',
	];
    use HasFactory;
	 public function category()
    {
        return $this->belongsTo(FooterServiceCategory::class);
    }
}
