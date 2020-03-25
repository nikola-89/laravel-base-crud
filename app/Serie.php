<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
	protected $fillable = [
		'content_id',
		'distributor',
		'title',
		'synopsis',
		'year',
		'season',
		'updated_at'
	];
}
