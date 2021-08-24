@extends('layouts.admin')

@section('main')
   <!-- Row -->
   <div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{asset('/img/user/'.Auth::user()->user_pict)}}" class="rounded-circle" width="150" height="150" />
                    <h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
                    <h6 class="card-subtitle">{{Auth::user()->role}}</h6>
                    {{-- <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                    </div> --}}
                </center>
            </div>
            <div>
                <hr> </div>
            <div class="card-body">
                 <small class="text-muted">Email address </small><h6>{{Auth::user()->email}}</h6>
                <small class="text-muted p-t-30 db">Phone</small><h6>{{Auth::user()->phone}}</h6>
                {{-- <small class="text-muted p-t-30 db">Address</small><h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>
                <div class="map-box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                <br/>
                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button> --}}
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Tabs -->
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Data User</a>
                </li>
            </ul>
            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                    <div class="card-body">
                        <form class="form-horizontal form-material" action="/adminsipbos/user/profile/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="{{Auth::user()->name}}" value="{{old('nama')}}" name="nama" class="form-control form-control-line  @if($errors->has('nama')) is-invalid @elseif(old('nama') !== null) is-valid @endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="{{Auth::user()->email}}" disabled class="form-control form-control-line" id="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="password">Password</label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="Password" id="password" name="password" class="form-control form-control-line @if($errors->has('password')) is-invalid @elseif(old('password') !== null) is-valid @endif">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('password')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="password_confirmation">Confirm Password</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control  form-control-line @if($errors->has('password')) is-invalid @elseif(old('password') !== null) is-valid @endif " id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="phone">Phone Number</label>
                                <div class="col-md-12">
                                    <input type="text" name="phone" id="phone" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="{{Auth::user()->phone}}" value="{{old('phone')}}" class="form-control form-control-line  @if($errors->has('phone')) is-invalid @elseif(old('phone') !== null) is-valid @endif">
                                    @if($errors->has('phone'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('phone')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Foto Profil</label>
                                <div class="col-md-12">
                                    <input type="file" name="userPict" accept="image/*" class="form-control @if($errors->has('userPict')) is-invalid @elseif(old('userPict') !== null) is-valid @endif">
                                    @if($errors->has('userPict'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('userPict')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->
@endsection
