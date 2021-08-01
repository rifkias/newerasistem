<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientRegisterProduct extends Model
{
    protected $table = 'client_register_product';

    protected $fillable = [
        'nama','email','nomor_telpon','tipe_produk'
    ];
}
