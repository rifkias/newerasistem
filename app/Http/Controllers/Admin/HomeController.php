<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
