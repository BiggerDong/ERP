<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['mid','name','type','describe','price','stock','sstock','is_hidden'];

    public function bills()
    {
        return $this->belongsToMany('App\Bill','material_bill','material_id', 'bill_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_hidden','F');
    }

}
