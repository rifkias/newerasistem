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
                                <td>{{$index + 1}}</td>
                                <td>{{$item->banner_name}}</td>
                                <td>{{$item->banner_desc}}</td>
                                <td>{{$item->read_more_link}}</td>
                                <td> {{$item->contact_us}}</td>
                                <td>{{$item->active}}</td>
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
<link href="{{asset('/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link src="{{asset('/admin/extra-libs/DataTables/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('/admin/libs/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">

     <link href="{{asset('/admin/extra-libs/DataTables/datatables2.min.css')}}" rel="stylesheet">
     <link href="{{asset('/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">

@endpush

@push('script')
     <!--This page plugins -->
     <script src="{{asset('/admin/extra-libs/DataTables/datatables.min.js')}}"></script>
     <script src="{{asset('/admin/extra-libs/DataTables/dataTables.responsive.min.js')}}"></script>
     <script src="{{asset('/admin/libs/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
     <script src="{{asset('/admin/extra-libs/DataTables/datatables2.min.js')}}"></script>

    <script>

        $(document).ready( function () {
            $('#MyTable').DataTable({
            responsive: true,
            "dom": 'l<"toolbar">frtip',
            columns: [
                {target:0, responsivePriority:0},
                {target:1, responsivePriority:1},
                {target:2, width:'40%',responsivePriority:6},
                {target:3, responsivePriority:5},
                {target:4, responsivePriority:4},
                {target:5, responsivePriority:3},
                {target:6, responsivePriority:2},
            ],
            });
        } );


        function AddBanner() {
            console.log('success');
            $('#MyModal').modal({show:true});
        }

        $(document).ready(function() {
            $('#readmoreLink').show();
        })
        function readMoreShow() {
            var show = 1;
            if(this.show == 1){
                this.show = 0;
                $('#readmoreLink').show();
            }else{
                this.show = 1;
                $('#readmoreLink').hide();
                $('#readmoreLink').val("");
            }
        }

        function readMoreShow2() {
            var b = $('#readmoreLinkEdit').prop('checked');
            if(b == true){
                $('#readmoreLinkE').show();
                $('#readmoreLinkE').val("");
            }else{
                $('#readmoreLinkE').hide();
                $('#readmoreLinkE').val("");
            }
            // console.log(this.show);

        }
        function ShowBanner(id) {
            // $.get('/adminsipbos/website/banner/detail/'+id)
            $.ajax({
                url : '/adminsipbos/website/banner/detail/'+id,
                type : 'GET',
                cache: false,
                success:function(data) {
                    DetailBanner(data,'detail');
                }
            });
        }
        function ShowBannerEdit(id) {
            $.ajax({
                url : '/adminsipbos/website/banner/detail/'+id,
                type : 'GET',
                cache: false,
                success:function(data) {
                    DetailBanner(data,'edit');
                }
            });
        }

        function DetailBanner(data,type) {
            if(type == 'detail'){
                $('#ModalTitle').text('Detail Banner');
                $('#NameEdit').val(data.banner_name).attr('readonly',true);
                $('#descEdit').val(data.banner_desc).attr('readonly',true);
                    if(data.read_more_link == null){
                        $('#readmoreLinkEdit').attr({checked:false, disabled:true});
                        $('#readmoreLinkE').hide();
                    }else{
                        $('#readmoreLinkEdit').attr({checked:true, disabled:true});
                        $('#readmoreLinkE').show();
                        $('#readmoreLinkE').val(data.read_more_link).attr({disabled:true});
                    }
                    if(data.contact_us == null){
                        $('#contactUsE').attr({checked:false, disabled:true});
                    }else{
                        $('#contactUsE').attr({checked:true, disabled:true});
                    }
                    $('#imgE').attr('src',"{{asset('/img/banner')}}"+'/'+data.banner_img);
                $('#imgEditRow').hide();
                $('#MyBanner2Footer').hide();
            }else{
                $('#ModalTitle').text('Edit Banner');
                $('#saveForm').text('Update Change');
                $('#NameEdit').val(data.banner_name).attr('readonly',false);
                $('#IdBanner').val(data.id)
                $('#descEdit').val(data.banner_desc).attr('readonly',false);
                $('#MyBanner2Footer').show();
                if(data.read_more_link == null){
                    $('#readmoreLinkEdit').attr({checked:false,disabled:false});
                    $('#readmoreLinkE').show();
                    $('#readmoreLinkE').hide();
                }else{
                    $('#readmoreLinkEdit').attr({checked:true,disabled:false});
                    $('#readmoreLinkE').show();
                    $('#readmoreLinkE').val(data.read_more_link).attr({disabled:false});;
                }
                if(data.contact_us == null){
                    $('#contactUsE').attr({checked:false,disabled:false});
                }else{
                    $('#contactUsE').attr({checked:true,disabled:false});
                }
                $('#imgE').attr('src',"{{asset('/img/banner')}}"+'/'+data.banner_img);
                $('#FormAction').attr('action','/adminsipbos/website/banner/edit');
            }
            console.log(data,type);
            $('#MyModal2').modal('show')
        }
        function ActiveBanner(id) {
            $.ajax({
                    url : '/adminsipbos/website/banner/active',
                    type : 'POST',
                    data : {"_token":"{{csrf_token()}}",'id':id},
                    cache: false,
                    success:function(data) {
                        location.reload();
                    }
                });
        }
        function BannerDelete(params) {
            swal({
                title: "Kamu yakin ?",
                text: "Data Tidak akan bisa dikembalikan jika sudah dihapus!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Iya, Lanjut !",
                cancelButtonText: "Tidak, Kembali !",
            }).then((Deleted) => {
                $.ajax({
                    url : '/adminsipbos/website/banner/delete',
                    type : 'POST',
                    data : {"_token":"{{csrf_token()}}",'id':params},
                    cache: false,
                    success:function(data) {
                        location.reload();
                    }
                });
            });
        }

     </script>
     {{-- <script src="{{asset('/admin/js/pages/datatable/datatable-basic.init.js')}}"></script> --}}
@endpush
