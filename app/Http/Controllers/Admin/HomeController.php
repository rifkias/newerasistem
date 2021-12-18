<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\WebsiteConfig;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data['listWeb'] = WebsiteConfig::all();
        $this->middleware('auth');
    }
    public function autoRedirect()
    {
        Return redirect('nesadminsite/');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->data['level'] = '1';
        $this->data['page'] = 'home';
        $this->data['breadcrumb'] = 'Dashboard';
        return view('admin.index')->with($this->data);
    }
    function pageDetail($level,$page,$breadcrumb)
    {
        $data = [
            'level'         => $level,
            'page'          => $page,
            'breadcrumb'    => $breadcrumb,
        ];
        return $data;
        # code...
    }

}
