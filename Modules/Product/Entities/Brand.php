<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductType;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['brand','code','status'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function producttype(){
        return $this->belongsTo(ProductType::class);
    }
}
