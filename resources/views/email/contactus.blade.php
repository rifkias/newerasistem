@extends('layouts.email')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
    <tbody>
        <tr>
            <td><b>Dear Sir/Madam,</b>
                <p>You Have Contact From Website.</p>
                {{-- <a href="javascript: void(0);" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;"> Call to action button </a> --}}
                <div style="margin-left: 40px;">
                    <p>Nama : {{$name}}</p>
                    <p>Email : {{$emailaddress}}</p>
                    <p>Nomor Telpon : {{$phonenumber}}</p>
                    <p>Pesan : {{$message}}</p>
                </div>
                <b>- Thanks Admin SipBos</b>
            </td>
        </tr>
    </tbody>
</table>
@endsection
