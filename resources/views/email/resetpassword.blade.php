@extends('layouts.email')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
    <tbody>
        <tr>
            <td style="border-bottom:1px solid #f6f6f6;">
                <h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear Sir/Madam/Customer,</h1>
                <p style="margin-top:0px; color:#bbbbbb;">Here are your password reset instructions.</p>
            </td>
        </tr>
        <tr>
            <td style="padding:10px 0 30px 0;">
                <p>A request to reset your Admin password has been made. If you did not make this request, simply ignore this email. If you did make this request, please reset your password:</p>
                <center>
                    <a href="{{$link}}" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;">Reset Password</a>
                </center>
            </td>
        </tr>
        <tr>
            <td style="border-top:1px solid #f6f6f6; padding-top:20px; color:#777">If the button above does not work, try copying and pasting the URL below  into your browser. If you continue to have problems, please feel free to contact us at cs@sipbos.rifkialfarizshidiq.my.id</td>
        </tr>
        <tr>
            <td>{{$link}}</td>
        </tr>
    </tbody>
</table>
@endsection
