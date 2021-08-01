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
        dd($request->all(),$masuk);
        return redirect()->back();
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
