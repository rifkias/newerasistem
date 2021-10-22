<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth,Hash,Session;
use GuzzleHttp\Psr7\UploadedFile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['user'] = User::all()->except(Auth::user()->id);
        return view('admin.user')->with($this->data);
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
    public function store(Request $request)
    {
        $valid = [
            'name' => 'required|max:225',
            'email' => 'required|max:225|email|unique:users,email',
            'password' => 'required|confirmed',
            'role' => 'required',
        ];
        if($request->userPict){
            $valid['userPict'] = 'required|max:2048';
        }
        $this->validate($request,$valid);

        $masuk = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => 'active',
        ];

        if($request->userPict){
            $filename = $this->uploadFile($request->userPict);
            $masuk['user_pict'] = $filename;
        }
        User::create($masuk);
        return redirect()->back();
    }
    public function userProfile()
    {
        $pageDetail = $this->pageDetail('1','User','Profile');
        $this->data['pageDetail'] = $pageDetail;
        return view('admin.user_profile')->with($this->data);
    }
    public function userProfileUpdate(Request $request)
    {
        $valid = [];
        $masuk = [];
        if($request->nama){
            $valid['nama'] = 'required|max:225';
            $masuk['name'] = $request->nama;
        }
        if($request->password){
            $valid['password'] = 'required|max:225|confirmed';
            $masuk['password'] = Hash::make($request->password);
        }
        if($request->phone){
            $valid['phone'] = 'required|numeric|digits_between:0,13';
            $masuk['phone'] = $request->phone;
        }
        if($request->userPict){
            $valid['userPict'] = 'required|max:2048"';
        }
        $this->validate($request,$valid);
        if($request->userPict){
            $Filename = $this->uploadFile($request->userPict);
            $masuk['user_pict'] = $Filename;
        }
        User::where('id',Auth::user()->id)->update($masuk);
        Session::flash('success','Data berhasil disimpan');
        return back();
        // dd($request);
    }
    function uploadFile($file)
    {
        sleep(1);
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('img/user'), $filename);
        return $filename;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = User::where('id',$request->id)->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $valid = [
            'idUser' => 'required',
            'name' => 'required|max:225',
            'role' => 'required',
        ];
        if($request->password){
            $valid['password'] = 'required|confirmed';
        }
        if($request->userPict){
            $valid['userPict'] = 'required|max:2048';
        }
        $this->validate($request,$valid);
        $masuk = [
            'name' => $request->name,
            'role' => $request->role,
        ];
        if($request->password){
            $masuk['password'] = Hash::make($request->password);
        }
        if($request->userPict){
            $masuk['user_pict'] = $this->uploadFile($request->userPict);
        }
        User::where('id',$request->idUser)->update($masuk);
        Session::flash('success','Data Berhasil Diubah');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function Active(Request $request)
    {
        $data = User::where('id',$request->id)->first();
        if($data->status == 'active'){
            $data->status = 'deactive';
            $message = "Tidak Aktif";
        }else{
           $data->status = 'active';
           $message = "Telah Aktif";
       }
       $data->save();
       return Session::flash('success','User '.$message);
    }
}
