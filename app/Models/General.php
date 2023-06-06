<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
	protected $fillable = [
		'heading',
		'phone',
		'email',
		'logo',
		'ogimage',
		'meta_name',
		'meta_title',
		'meta_description',
		'facebook',
		'twitter',
		'pinterest',
		'linkedin',
		'footer_text',
		'copy_rights',
		'meta_tags',
		'address',
		'description',
	];
    use HasFactory;
}
