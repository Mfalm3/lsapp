<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesRecordItems extends Model
{
    public $table = 'sales_items';
    protected $fillable = ['itemDescription','customer_id','enterprise','quantity','unitCost','totalCost'];

    public function saleabstract()
    {
        return $this->belongsTo('App\SalesRecordAbstract');
    }
}
