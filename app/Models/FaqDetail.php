<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqDetail extends Model
{
    protected $table = 'faq_detail';

    protected $fillable = [
        'id_faq','judul','konten','active'
    ];

    public function Faq()
    {
        return $this->belongsTo('App\Faq','id','id_faq');
    }
}
