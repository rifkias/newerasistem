<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Banner;
class IndexController extends Controller
{
    public function index()
    {
        $this->data['banner'] = Banner::where('active','true')->get();
        $this->data['page'] = 'home';
        return view('website.index')->with($this->data);
    }
    public function about()
    {
        $this->data['page'] = 'about';
        return view('website.about')->with($this->data);
    }
    public function produkDetail($type,$detail)
    {
        dd($type,$detail);
    }
    public function produkType($type)
    {
        $this->data['page'] = 'produk';
        if($type == 'simpanan-sipbos'){
            return view('website.produk.simpanan-sipbos')->with($this->data);
        }elseif($type == 'simpanan-berjangka'){
            return view('website.produk.simpanan-sipbos')->with($this->data);
        }elseif($type == 'pinjaman'){
            return view('website.produk.simpanan-sipbos')->with($this->data);
        }elseif($type == 'tabungan'){
            return view('website.produk.simpanan-sipbos')->with($this->data);
        }else{
            return redirect('/');
        }
    }
    public function produk()
    {
        $this->data['page'] = 'produk';
        return view('website.produk')->with($this->data);
    }
}
