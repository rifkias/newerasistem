<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'mainbanner';

    protected $fillable = [
        'banner_name','banner_desc','banner_img','read_more_link','contact_us','active',
    ];
}
