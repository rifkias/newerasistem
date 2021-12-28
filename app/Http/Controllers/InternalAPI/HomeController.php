<?php

namespace App\Http\Controllers\InternalAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Res\IndexRes;
use App\Models\Banner;
use App\Models\WebsiteConfig;
class HomeController extends Controller
{
    public function index()
    {
        return IndexRes::resultData(200,['message' => "Welcome To Nes Internal API"],null);
    }
    public function checkValidate(Request $request)
    {

        $check = WebsiteConfig::where('uniqueid',$request->apikey)->first();
        if(!$check){
            return IndexRes::resultData(400,['message'=>'Fail Data Not Found','data'=>$check],null);
        }else{
            return IndexRes::resultData(200,['message'=>'API Key Validated','data'=>$check],null);
        }
    }
}
