<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\WebsiteConfig;
use App\Res\IndexRes;
class WebConfigCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->apikey==""){
            return response(IndexRes::resultData(400,['message' => "API Cannot Null"],null));
        }else{
            $check = WebsiteConfig::where('uniqueid',$request->apikey)->first();
            return $next($request);
            if(!$check){
                return response(IndexRes::resultData(400,['message' => "API Key Not Found"],null));
            }else{
                return $next($request);
            }
        }
    }
}
