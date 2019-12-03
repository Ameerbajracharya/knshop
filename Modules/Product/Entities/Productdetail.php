<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class Productdetail extends Model
{
    protected $fillable = [
        'productid',
        'description',
        'features',
        'capacity',
        'services',
        'features',
        'size',
        'color',
        'keyword',
        'metaTags',
        'metaDescription',
        'productid',
    ];
}
