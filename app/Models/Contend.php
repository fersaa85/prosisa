<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contend extends Model {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contend';

    public function categoryname(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function catalog(){
        return $this->hasMany('App\Models\Catalog', 'contend_id', 'id');
    }




}