<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'nama_produk','deskripsi_singkat','deskripsi_detail','syarat_ketentuan','keunggulan_produk','foto_home','foto_list_produk','brosur_produk','active','slug'
    ];

    public function SubProduk()
    {
        return $this->hasMany('App\Models\SubProduk','produk_id','id');
    }
}
