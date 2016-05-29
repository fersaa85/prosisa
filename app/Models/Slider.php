<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;


    protected $table = "sliders";


    public function texts()
    {
        return $this->hasMany('App\Models\SliderText', 'slider_id');
    }

}
