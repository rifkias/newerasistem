<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebsiteConfig;
use Illuminate\Support\Facades\URL;
use PDO;
use Session,File;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->data['listWeb'] = WebsiteConfig::all();
        $this->data['currentWeb'] = request()->route('data');
        $this->middleware('auth');
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
    public function index($id)
    {
        $data = Banner::whereHas('Website', function ($query){
            $query->where('name','=',request()->route('data'));
        })->orderBy('seq','asc')->get();
        // dd($this->data);
        $pageDetail = $this->pageDetail('1','Banner','Banner');
        $this->data['pageDetail'] = $pageDetail;
        $this->data['banner'] = $data;
        // dd(Banner::all());
        return view('admin.banner')->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = [
            'name'      => 'required|max:255',
            'updoadImg'   => 'required|max:2048',
            'descBanner'     => 'required|max:255'
        ];
        if($request->has('readmore')){
            $valid['readmoreLink'] = 'require  d|max:255';
        }
        $this->validate($request,$valid);
        $filename = time().'.'.$request->updoadImg->getClientOriginalExtension();
        $request->updoadImg->move(public_path('img/banner'), $filename);
        $lastSeq =  $data = Banner::whereHas('Website', function ($query){
            $query->where('name','=',request()->route('data'));
        })->pluck('seq')->last();
        $WebsiteId = WebsiteConfig::where('name',request()->route('data'))->pluck('id')->last();
        $masuk = [
            'banner_name' => $request->name,
            'banner_desc' => $request->descBanner,
            'banner_img' => $filename,
            'active' => 'true',
            'website_id' => $WebsiteId,
            'read_more_link' => $request->readmoreLink,
            'seq' => $lastSeq+1,
        ];
        if($request->has('readmore')){
            $masuk['read_more_link'] = $request->readmoreLink;
        }
        if($request->has('contactUs')){
            $masuk['contact_us'] = 'true';
        }
        Banner::create($masuk);
        // dd($masuk);
        Session::flash('success','Data Berhasil ditambahkan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner,Request $request)
    {
        // dd($banner);
        $data = Banner::findOrFail($request->id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */

     public function active(Request $request)
     {
         $banner = Banner::where('id',$request->id)->first();
         if($banner->active == 'true'){
             $banner->active = 'false';
             $message = "Tidak Aktif";
         }else{
            $banner->active = 'true';
            $message = "Telah Aktif";
        }
        $banner->save();
        return Session::flash('success','Banner '.$message);
     }

    public function edit(Banner $banner,Request $request)
    {
        $valid = [
            'mainId'    => 'required',
            'name'      => 'required|max:255',
            'descBanner'     => 'required|max:255'
        ];

        if($request->readmore){
            $valid['readmoreLink'] = 'required|max:255';
        }
        if($request->updoadImg !== null){
            $valid['updoadImg'] = 'required|max:2048';
         }

         $this->validate($request, $valid);

         $masuk = [
            'banner_name' => $request->name,
            'banner_desc' => $request->descBanner,
        ];

         if($request->contactUs){
            $masuk['contact_us'] = 'true';
        }else{
            $masuk['contact_us'] = null;
        }
        if($request->readmore){
            $masuk['read_more_link'] = $request->readmoreLink;
        }else{
            $masuk['read_more_link'] = null;
        }
        if($request->updoadImg !== null){
            $masuk['banner_img'] = $this->uploadFile($request->updoadImg);
            $OldImg = Banner::where('id',$request->mainId)->pluck('banner_img')->first();
            $this->DeleteFile($OldImg);
         }
         Banner::where('id',$request->mainId)->update($masuk);
         Session::flash('success','Data Banner Berhasil Diubah');
         return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }
    function DeleteFile($fileName)
    {
        $url = public_path("img/banner/$fileName");
        if(File::exists($url)){
            File::delete($url);
        }
    }
    private function uploadFile($file)
    {
        sleep(1);
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('img/banner'), $filename);
        return $filename;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner,Request $request)
    {
        $banner = Banner::where('id',$request->id)->pluck('banner_img');
        // dd($banner);
        Banner::where('id',$request->id)->delete();
        return Session::flash('success','Data Berhasil Dihapus');
    }
}
