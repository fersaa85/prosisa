<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'catalog';


    public function contend(){
        return $this->belongsTo('App\Models\Contend');
    }

    public function catalog(){
        return $this->belongsTo('App\Models\Contend', 'contend_id');
    }

}