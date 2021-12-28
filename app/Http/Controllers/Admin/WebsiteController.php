<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteConfig;
use Illuminate\Support\Str;
use Session,File,Auth;
class WebsiteController extends Controller
{
    public function __construct()
    {
        $this->data['listWeb'] = WebsiteConfig::all();
        if(!Auth::user()){
            return redirect('/nesadminsite/login');
        }
    }
    public function index()
    {
        $this->data['datas'] = WebsiteConfig::all();
        return view('admin.websiteSetting')->with($this->data);
    }
    public function show(Request $request)
    {
        $data = WebsiteConfig::findOrFail($request->id);
        return response()->json($data);
    }
    public function edit(Request $request)
    {
        $valid = [
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'email' => 'email|nullable',
            'phone' => 'digits_between:1,13|nullable',
        ];
        if($request->iconWeb){
            $valid['iconWeb'] = 'mimes:jpeg,bmp,png,ico,gif|max:1028';
        }
        $this->validate($request,$valid);
        $masuk = [
            'name' => $request->name,
            'title' => $request->title,
            'meta_keywords' => $request->meta_keywords,
            'meta_desc' => $request->meta_desc,
            'email' => $request->email,
            'phone' => $request->phone,
        ];
        if($request->https){
            $masuk['https'] = 'true';
        }
        $OldImg = WebsiteConfig::where('id',$request->mainId)->pluck('icon')->first();
        if($request->iconWeb){
            if($OldImg){
                $this->DeleteFile($OldImg);
            }
            $masuk['icon'] = $this->uploadFile($request->iconWeb);
        }
        WebsiteConfig::where('id',$request->mainId)->update($masuk);
        Session::flash('success','Data Berhasil diubah');
        return redirect()->back();
    }
    public function store(Request $request)
    {
        $valid = [
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'email' => 'email|nullable',
            'url' => 'required',
            'phone' => 'digits_between:1,13|nullable',
        ];
        if($request->iconWeb){
            $valid['iconWeb'] = 'mimes:jpeg,bmp,png,ico,gif|max:1028';
        }
        $this->validate($request,$valid);
        $uniqueid = $this->randomString();
        // Check Duplicate
        $masuk = [
            'name' => $request->name,
            'title' => $request->title,
            'meta_keywords' => $request->meta_keywords,
            'meta_desc' => $request->meta_desc,
            'email' => $request->email,
            'phone' => $request->phone,
            'uniqueid' => $uniqueid,
            'url' => $request->url,
        ];
        if($request->iconWeb){
            $masuk['icon'] = $this->uploadFile($request->iconWeb);
        }
        if($request->https){
            $masuk['https'] = true;
        }
        WebsiteConfig::create($masuk);
        Session::flash('success','Data Berhasil ditambahkan');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $data = WebsiteConfig::where('id',$request->id)->firstOrFail();
        if($data->icon){
            $this->DeleteFile($data->icon);
        }
        $data->delete();
        return Session::flash('success','Data Berhasil Dihapus');
    }
    private function randomString()
    {
        $masterChar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $i = 0;
        do {
            $randomString = substr(str_shuffle($masterChar),0,10);
            $check = WebsiteConfig::where('uniqueid',$randomString)->first();
            if($check == null){
                $i++;
            }
        }
        while ($i == 1);

        return $randomString;
    }
    function DeleteFile($fileName)
    {
        $url = public_path("img/icon/$fileName");
        if(File::exists($url)){
            File::delete($url);
        }
    }
    private function uploadFile($file)
    {
        sleep(1);
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('img/icon'), $filename);
        return $filename;
    }
    public function refreshToken(Request $request)
    {
        $data = WebsiteConfig::findOrFail($request->id);
        $token = Str::random(60);
        $data->uniqueid = hash('sha256', $token);
        $data->save();
        return Session::flash('success','Refresh Token Berhasil Diupdate');
    }
}
