<?php

namespace Modules\Product\Entities;
use Modules\Product\Entities\Brand;
use Modules\Product\Entities\Product;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table ='product_types';
    protected $fillable = ['type','code','status'];

    public function brand(){
        return $this->hasMany(Brand::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
