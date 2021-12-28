<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'mainbanner';

    protected $fillable = [
        'banner_name','banner_desc','banner_img','read_more_link','contact_us','active','website_id','seq','opt1','opt2','opt3','opt4','opt5',
    ];
    public function Website()
    {
        return $this->hasOne(WebsiteConfig::class,'id','website_id');
    }
}
