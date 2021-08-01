@extends('layouts.email')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
    <tbody>
        <tr>
            <td><b>Dear Sir/Madam,</b>
                <p>You Have Registered Client From Website.</p>
                {{-- <a href="javascript: void(0);" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;"> Call to action button </a> --}}
                <div style="margin-left: 40px;">
                    <p>Nama : {{$nama}}</p>
                    <p>Email : {{$email}}</p>
                    <p>Nomor Telpon : {{$nomor_telpon}}</p>
                    <p>Produk : {{$tipe_produk}}</p>
                </div>
                <b>- Thanks Admin SipBos</b>
            </td>
        </tr>
    </tbody>
</table>
@endsection
