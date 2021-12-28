<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail,Session,Config,Exception;
use Illuminate\Support\Facades\Http;
use App\Models\BannerAPI;
use App\Models\ContactUs;
use App\Models\Produk;
use App\Models\ClientRegisterProduct;
class IndexController extends Controller
{
//    public function __construct()
//    {
//         $this->data['produk'] = Produk::where('active','true')->with('SubProduk')->get();
//    }
    public function index()
    {
        // $this->data['banner'] = Banner::where('active','true')->get();
        $model = new BannerAPI();
        $banner = $model->getAllData();
        // dd($banner);
        $this->data['banner'] = $banner['datas']['results'];
        // dd($model->getAllData());
        // dd($this->data);
        $this->data['page'] = 'home';
        return view('main-file.index')->with($this->data);
    }
    public function about()
    {
        $this->data['page'] = 'about';
        return view('main-file.about')->with($this->data);
    }
    public function produkDetail($type,$detail)
    {
        dd($type,$detail);
    }
    public function Faq()
    {
        $this->data['page'] = 'other';
        return view('website.faq')->with($this->data);
    }
    function remove_emoji($text){
        return preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $text);
    }
    function TelegramMessage($pesan)
    {
        $token = Config('app.telegram_token');
        $chatID = Config('app.telegram_chatid');
        // dd($token,$chatID);
        $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
        $url = $url . "&text=" . urlencode($pesan);
        $url = $url . "&parse_mode=markdown";

        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        if ($result === false) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }
        curl_close($ch);

        return $result;
    }
    public function ProductRegister(Request $request,$type)
    {
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_telpon' => $request->phone,
            'tipe_produk' => str_replace('-',' ',$type),
        ];
        ClientRegisterProduct::create($data);
        $content = view('email.user_register_product')->with($data);
        Mail::send('layouts.email', ['contentMessage' => $content], function($message) {
            $message->to('sipbos2021.1@gmail.com')->subject('Registered Client From Website');
        });
        $a = $this->TelegramMessage("Ada yang registrasi dari website silakan cek email \n\n *Nama* : $request->nama \n *Email* : $request->email \n *Nomor Telpon* : $request->phone \n *Tipe Produk* : ".str_replace('-',' ',$type));
        Session::flash('success','Terima Kasih telah mengisi form, Silakan tunggu petugas kami menghubungi anda');
        return back();
    }
    public function SendContactUs(Request $request)
    {
        ContactUs::create([
            'nama' => $request->name,
            'email' => $request->emailaddress,
            'nomor_telpon' => $request->phonenumber,
            'pesan' => $request->message,
        ]);
        $content = view('email.contactus')->with($request->all());
        Mail::send('layouts.email', ['contentMessage' => $content], function($message) {
            $message->to('sipbos2021@gmail.com')->subject('User Contact From Website');
        });
        $a = $this->TelegramMessage("Ada yang menghubungi dari website silakan cek email \n\n *Nama* : $request->name \n *Email* : $request->emailaddress \n *Nomor Telpon* : $request->phonenumber \n *Pesan* : $request->message");
        Session::flash('success','Terima Kasih telah menghubungi kami');
        return back();
        // return view('email.contactus')->with($request->all());
        // dd($request);
    }
    public function produkType($type)
    {
        $this->data['page'] = 'produk';
        $produk = Produk::where([['slug',$type],['active','true']])->with('SubProduk')->withCount('SubProduk')->first();
        if($produk){
            $this->data['datas'] = $produk;
            // dd($this->data);
            return view('website.produk.template')->with($this->data);
        }else{
            abort(404);
        }
        // if($type == 'simpanan-sipbos'){
        //     return view('website.produk.simpanan-sipbos')->with($this->data);
        // }elseif($type == 'simpanan-berjangka'){
        //     return view('website.produk.simpanan-berjangka')->with($this->data);
        // }elseif($type == 'pinjaman'){
        //     return view('website.produk.pinjaman')->with($this->data);
        // }elseif($type == 'tabungan'){
        //     return view('website.produk.simpanan-sipbos')->with($this->data);
        // }else{
        //     return redirect('/');
        // }

    }
    public function produk()
    {
        $this->data['page'] = 'produk';
        return view('website.produk')->with($this->data);
    }
    public function contactUs()
    {
        $this->data['page'] = 'Contact';
        return view('website.contact-us')->with($this->data);
    }
    public function test()
    {
      return view('layouts.new');
    }
}
