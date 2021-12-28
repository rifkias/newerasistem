<?php

namespace App\Http\Controllers\InternalAPI\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Res\IndexRes;
use App\Models\Banner;
use App\Models\WebsiteConfig;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        // return $request->all();
        $data = Banner::whereHas('Website', function ($query)use($request){
            $query->where('uniqueid','=',$request->apikey);
        })->where('active','true')->orderBy('seq','asc')->get();
        return IndexRes::resultData(200,['results'=>$data],null);
    }
}
