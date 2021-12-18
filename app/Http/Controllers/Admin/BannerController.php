<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebsiteConfig;
use Illuminate\Support\Facades\URL;
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
        })->get();
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

        if(!$request->readmore){
            $this->validate($request, [
                'bannerName'      => 'required|max:255',
                'bannerImg'   => 'required|max:2048',
                'descBanner'     => 'required|max:255'
            ]);
        }else{
            $this->validate($request, [
                'bannerName'      => 'required|max:255',
                'bannerImg'   => 'required|max:2048',
                'descBanner'     => 'required|max:255',
                'readmoreLink'     => 'required|max:255'
            ]);
        }
        $filename = time().'.'.$request->bannerImg->getClientOriginalExtension();
        $request->bannerImg->move(public_path('img/banner'), $filename);

        $masuk = [
            'banner_name' => $request->bannerName,
            'banner_desc' => $request->descBanner,
            'banner_img' => $filename,
            'active' => 'true',
        ];
        if($request->readmore){
            $masuk['read_more_link'] = $request->readmoreLink;
        }
        if($request->contactUs){
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
    public function show(Banner $banner,$id)
    {
        return Banner::findOrFail($id);
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

        // dd($request->all(),$banner::all());
        $valid = [
            'NameEdit'      => 'required|max:255',
            'descEdit'     => 'required|max:255'
        ];

        $masuk = [
            'banner_name' => $request->NameEdit,
            'banner_desc' => $request->descEdit,
        ];

        if($request->readmoreLinkEdit !== null){
            $valid['readmoreLinkE'] = 'required|max:255';
            $masuk['read_more_link'] = $request->readmoreLinkE;
        }

        if($request->ImgEdit !== null){
            $valid['ImgEdit'] = 'required|max:2048';
         }
         $this->validate($request, $valid);

         if($request->contactUsE){
            $masuk['contact_us'] = 'true';
        }else{
            $masuk['contact_us'] = null;
        }
        if($request->ImgEdit !== null){
            $filename = time().'.'.$request->ImgEdit->getClientOriginalExtension();
            $request->ImgEdit->move(public_path('img/banner'), $filename);
            $masuk['banner_img'] = $filename;
         }

         Banner::where('id',$request->IdBanner)->update($masuk);
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
