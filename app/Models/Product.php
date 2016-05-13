<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'catalog_products';


    public function composition(){
        return $this->hasMany('App\Models\Composition');
    }

}