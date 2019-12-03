<?php

namespace Modules\Slider\Entities;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
     protected $fillable = ['title','image','tags','keyword','metatag','description'];
    protected $table = 'sliders';
}
