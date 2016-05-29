<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders_product';

    public $timestamps = false;


    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}