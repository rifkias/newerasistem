<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Faq;
Use App\Models\FaqDetail;
use Session,Auth,File;
class FaqController extends Controller
{
    public function index()
    {
        $this->data['faq'] = Faq::with('SubFaq')->get();
// dd($this->data);
        return view('admin.faq')->with($this->data);
    }
    public function Add($type,Request $request)
    {
        if($type == 'kategori'){
            $this->validate($request,[
                'category' => 'required|max:255',
            ]);
            Faq::create(['category' => $request->category,'active'=>'true']);
        }elseif($type == 'subfaq'){
            $this->validate($request,[
                'FaqId' => 'required',
                'judul' => 'required|max:255',
                'konten' => 'required',
            ]);
            FaqDetail::create(['id_faq' => $request->FaqId,'judul' => $request->judul,'konten' => $request->konten,'active'=>'true']);
        }
            Session::flash('success','Faq Berhasil Ditambahkan');
            return redirect()->back();
        // dd($type,$request->all());
    }
    public function FaqDelete(Request $request)
    {
        Faq::where('id',$request->id)->delete();
        return Session::flash('success','Data Berhasil Dihapus');
    }
    public function FaqDetail($type,$id)
    {
        if($type == 'subfaq'){
            $data = FaqDetail::where('id',$id)->first();
        }elseif($type == 'faq'){
            $data = Faq::where('id',$id)->first();
        }
        return response()->json($data);
    }
    public function FaqEdit($type,Request $request)
    {
        if($type == 'subfaq'){
            $this->validate($request,[
                'FaqId' => 'required',
                'judul' => 'required|max:255',
                'konten' => 'required',
            ]);
            $id = $request->FaqId;
            $request->offsetUnset('FaqId');
            $request->offsetUnset('_token');
            FaqDetail::where('id',$id)->update($request->all());
            $msg = 'Sub Faq Berhasil diubah';
        }elseif($type == 'faq'){
            $this->validate($request,[
                'MainFaqId' => 'required',
                'category' => 'required|max:255',
            ]);
            $id = $request->MainFaqId;
            $request->offsetUnset('MainFaqId');
            $request->offsetUnset('_token');
            Faq::where('id',$id)->update($request->all());
            $msg = 'Faq Berhasil diubah';
        }
        Session::flash('success',$msg);
        return redirect()->back();

    }
    public function SubFaqDelete(Request $request)
    {
        FaqDetail::where('id',$request->id)->delete();
        Session::flash('success','Sub Faq Berhasil dihapus');
        return true;
    }
    public function FaqActive($type,Request $request)
    {
        if($type == 'subfaq'){
            $data = FaqDetail::where('id',$request->id)->first();
            $message = "Sub Faq ";
        }elseif($type == 'faq'){
            $data = Faq::where('id',$request->id)->first();
            $message = "Faq ";
        }
        if($data->active == 'true'){
            $data->active = 'false';
            $message .= "Tidak Aktif";
        }else{
           $data->active = 'true';
           $message .= "Telah Aktif";
       }
       $data->save();
       return Session::flash('success',$message);
    }

    // if($type = 'subfaq'){

    // }elseif($type = 'faq'){

    // }
}
