<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = ['bid','type','name','creator','receiver','remark'];

    public function materials()
    {
        return $this->belongsToMany('App\Material','material_bill');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function billsType()
    {
        return $this->belongsTo('App\BillsType','bills_type');
    }
}
