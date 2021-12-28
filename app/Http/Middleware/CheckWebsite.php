<?php

namespace App\Http\Middleware;

use Closure,Session;
use App\Models\WebsiteConfig;
class CheckWebsite
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
        $params = request()->route('data');
        $data = WebsiteConfig::where('name',$params)->first();
        if(!$data){
            return redirect()->route('home')->withErrors(['alert'=>'Website Belum Didaftarkan Silahkan menghubungi IT']);
        }
        return $next($request);

    }
}
