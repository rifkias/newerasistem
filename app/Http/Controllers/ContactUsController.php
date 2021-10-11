<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
class ContactUsController extends Controller
{
    public function index()
    {
        $this->data['datas'] = ContactUs::get();
        return view('admin.contactUs')->with($this->data);
    }
}
