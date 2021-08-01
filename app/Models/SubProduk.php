<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubProduk extends Model
{
    protected $table = 'sub_produk';

    protected $fillable = [
        'produk_id','nama_sub','deskripsi','ketentuan','active'
    ];

    public function Produk()
    {
        return $this->belongsTo('App\Produk','produk_id','id');
    }
}
