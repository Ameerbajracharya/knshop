<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['unit','code','status'];
}
