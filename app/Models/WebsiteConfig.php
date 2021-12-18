<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteConfig extends Model
{
    protected $table = 'website';

    protected $fillable = [
        'name','url','title','icon','meta_keyword','meta_desc','meta_desc','email','phone','uniqueid','https'
    ];
}
