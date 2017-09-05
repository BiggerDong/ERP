<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialBill extends Model
{
    protected $table = 'material_bill';

    protected $fillable = ['material_id','bill_id','amount','total'];
}
