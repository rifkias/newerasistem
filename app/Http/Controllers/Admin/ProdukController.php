<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\SubProduk;
use Illuminate\Http\Request;
use Session,Auth,File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $this->data['produk'] = Produk::withCount('SubProduk')->get();
        // dd($this->data);
        return view('admin.produk')->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subProdukAdd(Request $request)
    {
        $masuk = [
            'produk_id' => $request->ProdukId,
            'nama_sub' => $request->nameSubProduk,
            'deskripsi' => $request->konten,
        ];
        SubProduk::create($masuk);
        Session::flash('success','Sub Produk Berhasil Ditambahkan');
        return redirect()->back();
    }
    public function create()
    {
        //
    }
    public function DeleteImg(Request $request)
    {
        if($request->type == 'Img_Brosur'){
            Produk::where('id',$request->id)->update([
                'brosur_produk' => null,
            ]);
        }
        if($request->type == 'Img_List'){
            Produk::where('id',$request->id)->update([
                'foto_list_produk' => null,
            ]);
        }
        $this->DeleteFile($request->img);
        return true;
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
            'ProdukName' => 'required|max:225',
            'lessDesc' => 'required|max:225',
            'produkDesc' => 'required',
            'syarat_ketentuan' => 'required',
            'keunggulan' => 'required',
            'home_img' => 'required|max:2048',
            'slug' => 'required|unique:produk,slug',
        ];
        if($request->foto_list_produk){
            $valid['list_img'] = 'required|max:2048';
        }
        if($request->brosur_produk){
            $valid['brosur_produk'] = 'required|max:2048';
        }
        $this->validate($request,$valid);
        // $filename = time().'.'.$request->home_img->getClientOriginalExtension();
        // $request->home_img->move(public_path('img/produk'), $filename);
        $imgHome = $this->uploadFile($request->home_img);
        $masuk = [
            'nama_produk' => $request->ProdukName,
            'deskripsi_singkat' => $request->lessDesc,
            'deskripsi_detail' => $request->produkDesc,
            'syarat_ketentuan' => json_encode($request->syarat_ketentuan),
            'keunggulan_produk' => json_encode($request->keunggulan),
            'foto_home' => $imgHome,
            'slug' => $request->slug,
        ];

        if($request->foto_list_produk){
            $list_produk = $this->uploadFile($request->list_img);
            $masuk['foto_list_produk'] = $list_produk;
        }
        if($request->brosur_produk){
            $brosur_produk = $this->uploadFile($request->brosur_produk);
            $masuk['brosur_produk'] = $brosur_produk;
        }
        $masuk['active'] = 'true';
        Produk::create($masuk);
        Session::flash('success','Produk Berhasil Ditambahkan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk,$id)
    {
        $data = Produk::where('id',$id)->with('SubProduk')->withCount('SubProduk')->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request)
    {
        $data = Produk::where('id',$request->id)->first();
        if($data->active == 'true'){
            $data->active = 'false';
            $message = "Tidak Aktif";
        }else{
           $data->active = 'true';
           $message = "Telah Aktif";
       }
       $data->save();
       return Session::flash('success','Produk '.$message);
    }
    public function edit(Produk $produk,Request $request)
    {

        $data = Produk::where('id',$request->IdProduk)->first();
        $valid = [
            'IdProduk' => 'required',
            'ProdukNameEdit' => 'required|max:225',
            'lessDescEdit' => 'required',
            'produkDescEdit' => 'required',
            'syarat_ketentuanEdit' => 'required',
            'keunggulanEdit' => 'required',
            'slug' => 'required|unique:produk,slug,'.$request->IdProduk,

        ];
        if($request->home_img_edit){
            $valid['home_img_edit'] = 'required|max:2048';
        }
        if($request->list_img){
            $valid['list_img'] = 'required|max:2048';
        }
        if($request->brosur_produk){
            $valid['brosur_produk'] = 'required|max:2048';
        }
        $this->validate($request,$valid);
        $data->nama_produk          = $request->ProdukNameEdit;
        $data->deskripsi_singkat    = $request->lessDescEdit;
        $data->deskripsi_detail     = $request->produkDescEdit;
        $data->syarat_ketentuan     = json_encode($request->syarat_ketentuanEdit);
        $data->keunggulan_produk    = json_encode($request->keunggulanEdit);
        $data->slug                 = $request->slug;
            if($request->home_img_edit){
            if($data->foto_home){
                $this->DeleteFile($data->foto_home);
             }
            $foto_home = $this->uploadFile($request->home_img_edit);
            $data->foto_home = $foto_home;
        }
        if($request->list_img){
            if($data->foto_list_produk){
               $this->DeleteFile($data->foto_list_produk);
            }
            $list_produk = $this->uploadFile($request->list_img);
            $data->foto_list_produk = $list_produk;
        }
        if($request->brosur_produk){
            if($data->brosur_produk){
                $this->DeleteFile($data->brosur_produk);
            }
            $brosur_produk = $this->uploadFile($request->brosur_produk);
            $data->brosur_produk = $brosur_produk;
        }
        $data->save();
        Session::flash('success','Produk Berhasil Diedit');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk,Request $request)
    {
        $produk = Produk::where('id',$request->id)->select('foto_home','foto_list_produk','brosur_produk')->firstOrFail();
        if($produk->foto_home){
           $this->DeleteFile($produk->foto_home);
        }
        if($produk->foto_list_produk){
            $this->DeleteFile($produk->foto_list_produk);
        }
        if($produk->brosur_produk){
            $this->DeleteFile($produk->brosur_produk);
        }
        Produk::where('id',$request->id)->delete();
        return Session::flash('success','Data Berhasil Dihapus');
    }
    function DeleteFile($fileName)
    {
        $url = public_path("img/produk/$fileName");
        if(File::exists($url)){
            File::delete($url);
        }
    }
    public function subProdukDelete(Request $request)
    {
        SubProduk::where('id',$request->id)->delete();
        return true;
    }
    function uploadFile($file)
    {
        sleep(1);
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('img/produk'), $filename);
        return $filename;
    }
}
