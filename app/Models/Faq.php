<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';

    protected $fillable = [
        'category','active'
    ];

    public function SubFaq()
    {
        return $this->hasMany('App\Models\FaqDetail','id_faq','id');
    }
}
