<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	protected $dates = [
		'created_at',
		'updated_at',
    // your other new column
	];
	protected $fillable = ['category','code','status','caption','keywords','metaTag'];

	public function product(){
		return $this->hasMany(Product::class);  
	}
}
