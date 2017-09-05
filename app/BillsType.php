<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillsType extends Model
{
    protected $table = 'bills_type';

    public function bills()
    {
        return $this->hasMany('App\Bill');
    }
}
