<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
	protected $fillable = [
		'content_id',
		'distributor',
		'title',
		'type',
		'synopsis',
		'year',
		'season'
	];
}
