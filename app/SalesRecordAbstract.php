<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesRecordAbstract extends Model
{
    public $table = 'sales_abstract';

    public function saleitems()
    {
        return $this->hasMany('App\SaleRecordItems');
    }
}
