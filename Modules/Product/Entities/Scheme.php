<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    protected $fillable = [
        'name',
        'description',
        'discountpercent',
        'discountamount',
        'startdate',
        'enddate',
        'caption',
        'keyword',
        'metaTags',
        'metaDescription',
    ];
}
