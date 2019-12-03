<?php

namespace Modules\Product\Entities;
use Modules\Product\Entities\Brand;
use Modules\Product\Entities\ProductType;
use Modules\Product\Entities\Category;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Product extends Model
{
	use Commentable;
    protected $table ='products';
    protected $fillable = ['productName','code','qrCode','barCode','categoryid','brandid','typeid','unitid','schemeid','wholeSalePrice','markedPrice','sellingPrice','status'];
}

