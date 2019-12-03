<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['name','address','contact','email', 'description','logo','keyword','caption','facebook','instagram'];
    protected $table ='settings';
}
