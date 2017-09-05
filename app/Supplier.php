<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['sid','name','phone','address'];

    public function bills()
    {
        return $this->hasMany('App\Bill');
    }
}
