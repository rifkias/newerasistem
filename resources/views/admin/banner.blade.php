@extends('layouts.admin')

@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Banner Website</h4>
                <h6 class="card-subtitle" style="text-align: right"><button onclick="AddBanner()" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Banner</button></h6>
                <div class="">
                    <table id="MyTable" style="width:100%" class="table table-bordered no-warp">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Read more</th>
                                <th>Contact Us</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banner as $index=>$item)
                            <tr>
                                <td></td>
                                <td>{{$item->banner_name}}</td>
                                <td>{{$item->banner_desc}}</td>
                                <td>{{$item->read_more_link}}</td>
                                <td> <div class="btn @if($item->contact_us == 'true') btn-success @else btn-danger @endif "><i class="fas fa-lg @if($item->contact_us == 'true') fa-check @else fa-times @endif"></i></div></td>
                                <td><div class="btn @if($item->active == 'true') btn-success @else btn-danger @endif "><i class="fas fa-lg @if($item->active == 'true') fa-check @else fa-times @endif"></i></div></td>
                                <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-primary" onclick="ShowBanner('{{$item->id}}')"><i class="fas fa-info"></i></button>
                                    <button class="btn btn-warning" onclick="ShowBannerEdit('{{$item->id}}')"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger" onclick="BannerDelete({{$item->id}})"><i class="fas fa-trash"></i></button>
                                    <button class="btn btn-primary" onclick="ActiveBanner({{$item->id}})"><i class="fas @if($item->active == 'false') fa-eye @else fa-eye-slash @endif"></i></button>
                                    {{-- <button type="button" class="btn btn-secondary">Left</button>
                                    <button type="button" class="btn btn-secondary">Middle</button>
                                    <button type="button" class="btn btn-secondary">Right</button> --}}
                                </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form method="POST" action="/adminsipbos/website/banner/add" enctype="multipart/form-data">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Nama Banner</label>
                <div class="col-sm-9">
                    <input type="text" required class="form-control @if($errors->has('bannerName')) is-invalid @elseif(old('bannerName') !== null) is-valid @endif " id="name" value="{{old('bannerName')}}" name="bannerName" placeholder="Tabungan SipBos">
                    @if ($errors->has('bannerName'))
                    <div class="invalid-feedback">
                           {{$errors->first('bannerName')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="img" class="col-sm-3 col-form-label">Foto Banner</label>
                <div class="col-sm-9">
                    <input type="file" required class="form-control @if(@$errors->has(bannerImg)) is-invalid @endif" id="img" name="bannerImg">
                    @if($errors->has('bannerImg'))
                        <div class="invalid-feedback">
                            {{$errors->first('bannerImg')}}
                        </div>
                    @endif
                    <div class="d-flex justify-content-start">
                            <small id="name1" class="badge badge-default  form-text text-dark">Ukuran yang direkomendasikan (1510x881)</small>
                    </div>

                </div>
            </div>
            <div class="form-group row">
                <label for="descBanner" class="col-sm-3 col-form-label">Deskripsi Banner</label>
                <div class="col-sm-9">
                    <textarea required class="form-control @if(@$errors->has(descBanner)) is-invalid @elseif(old('descBanner') !== null) is-valid @endif" id="descBanner" name="descBanner"> {{old('descBanner')}} </textarea>
                    @if($errors->has('descBanner'))
                        <div class="invalid-feedback">
                            {{$errors->first('descBanner')}}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="readmore" class="col-sm-3 col-xs-3 col-form-label">Read More <input style="margin-left:25px" onclick="readMoreShow()" checked type="checkbox" id="readmore" name="readmore"></label>
                <div class="col-sm-9">
                    <input class="form-control @if(@$errors->has(readmoreLink)) is-invalid @elseif(old('readmoreLink') !== null) is-valid @endif" id="readmoreLink" value="{{old('readmoreLink')}}" name="readmoreLink" placeholder="www.sipbos.com/xxxxx">
                    @if($errors->has('readmoreLink'))
                        <div class="invalid-feedback">
                            {{$errors->first('readmoreLink')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="contactUs" class="col-sm-3 col-form-label">Contact Us <input style="margin-left:20px" checked type="checkbox" id="contactUs" name="contactUs"></label>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="MyModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form method="POST" id="FormAction" action="" enctype="multipart/form-data">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              {{ csrf_field() }}
            <input type="hidden" name="IdBanner" id="IdBanner" value="0">
            <div class="form-group row">
                    <label for="NameEdit" class="col-sm-3 col-form-label">Nama Banner</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control @if($errors->has('NameEdit')) is-invalid @elseif(old('NameEdit') !== null) is-valid @endif " id="NameEdit" value="{{old('NameEdit')}}" name="NameEdit" placeholder="Tabungan SipBos">
                        @if ($errors->has('NameEdit'))
                        <div class="invalid-feedback">
                                {{$errors->first('NameEdit')}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row" id="imgEditRow">
                    <label for="ImgEdit" class="col-sm-3 col-form-label">Foto Banner</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control @if(@$errors->has(ImgEdit)) is-invalid @endif" id="ImgEdit" name="ImgEdit">
                        @if($errors->has('ImgEdit'))
                            <div class="invalid-feedback">
                                {{$errors->first('ImgEdit')}}
                            </div>
                        @endif
                        <div class="d-flex justify-content-start">
                                <small id="name1" class="badge badge-default  form-text text-dark">Ukuran yang direkomendasikan (1510x881)</small>
                        </div>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="descEdit" class="col-sm-3 col-form-label">Deskripsi Banner</label>
                    <div class="col-sm-9">
                        <textarea required class="form-control @if(@$errors->has(descEdit)) is-invalid @elseif(old('descEdit') !== null) is-valid @endif" id="descEdit" name="descEdit"> {{old('descEdit')}} </textarea>
                        @if($errors->has('descEdit'))
                            <div class="invalid-feedback">
                                {{$errors->first('descEdit')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="readmoreLinkEdit" class="col-sm-3 col-xs-3 col-form-label">Read More <input style="margin-left:25px" onclick="readMoreShow2()" checked type="checkbox" id="readmoreLinkEdit" name="readmoreLinkEdit"></label>
                    <div class="col-sm-9">
                        <input class="form-control @if(@$errors->has(readmoreLinkE)) is-invalid @elseif(old('readmoreLinkE') !== null) is-valid @endif" id="readmoreLinkE" value="{{old('readmoreLinkE')}}" name="readmoreLinkE" placeholder="www.sipbos.com/xxxxx">
                        @if($errors->has('readmoreLinkE'))
                            <div class="invalid-feedback">
                                {{$errors->first('readmoreLinkE')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="contactUsE" class="col-sm-3 col-form-label">Contact Us <input style="margin-left:20px" checked type="checkbox" id="contactUsE" name="contactUsE"></label>
                </div>

                <div class="form-group">
                    <label>Banner Img</label>
                    <img class="form-control" src="{{asset('img/banner/1624814859.jpg')}}" id="imgE" style="max-width:70%;height:auto;" alt="">
                </div>

        </div>
        <div class="modal-footer" id="MyBanner2Footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="saveForm">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection

@push('css')
{{-- <link href="{{asset('/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link src="{{asset('/admin/extra-libs/DataTables/responsive.dataTables.min.css')}}" rel="stylesheet"> --}}

<link href="{{asset('/admin/add-on/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css"
    href="{{asset('/admin/add-on/datatables.net-bs4/css/responsive.dataTables.min.css')}}">

<link href="{{asset('/admin/libs/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
{{-- <link href="{{asset('/admin/extra-libs/DataTables/datatables2.min.css')}}" rel="stylesheet"> --}}


@endpush

@push('script')
     <!--This page plugins -->
     {{-- <script src="{{asset('/admin/extra-libs/DataTables/datatables.min.js')}}"></script>
     <script src="{{asset('/admin/extra-libs/DataTables/datatables.min.js')}}"></script>
     <script src="{{asset('/admin/extra-libs/DataTables/dataTables.responsive.min.js')}}"></script> --}}
     <script src="{{asset('/admin/add-on/datatables.net/js/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('/admin/add-on/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>

     <script src="{{asset('/admin/libs/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
     {{-- <script src="{{asset('/admin/extra-libs/DataTables/datatables2.min.js')}}"></script> --}}

    <script src="{{asset('page/banner.js')}}"></script>
     {{-- <script src="{{asset('/admin/js/pages/datatable/datatable-basic.init.js')}}"></script> --}}
@endpush
