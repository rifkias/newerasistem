@extends('layouts.admin')

@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Website</h4>
                <h6 class="card-subtitle" style="text-align: right"><button onclick="ShowAddModal()" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Website</button></h6>
                <div class="">
                    <table id="MyTable" style="width:100%" class="table table-bordered no-warp">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>URL</th>
                                <th>Title</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $item)
                                <tr>
                                    <td></td>
                                    <td>{{$item->name}}</td>
                                    <td><a href="@if($item->https == 'true') https://www.{{$item->url}} @else http://www.{{$item->url}} @endif" target="_blank">@if($item->https == 'true') https://www.{{$item->url}} @else http://www.{{$item->url}} @endif</a></td>
                                    <td>{{$item->title}}</td>
                                    <td>
                                        <img src="{{asset('img/icon/'.$item->icon)}}" alt="" style="max-width:50px;height:auto; ">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            {{-- <button class="btn btn-success" onclick="Active('{{$item->id}}')"><i class="mdi @if($item->status == 'active') mdi-account-off @else fa-user @endif"></i></button> --}}
                                            <button class="btn btn-primary" onclick="Detail('{{$item->id}}')"><i class="fas fa-info"></i></button>
                                            <button class="btn btn-warning" onclick="Edit('{{$item->id}}')"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger" onclick="Delete('{{$item->id}}')"><i class="fas fa-trash"></i></button>

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
        <form method="POST" action="" enctype="multipart/form-data" id="addForm">

        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <input type="hidden" name="mainId" id="mainId">
        <div class="modal-body">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="Name" class="col-sm-3 col-form-label">Nama Website</label>
                <div class="col-sm-9">
                    <input type="text" required class="form-control @if($errors->has('name')) is-invalid @elseif(old('name') !== null) is-valid @endif " id="name" value="{{old('name')}}" name="name" placeholder="Nama User">
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        {{$errors->first('name')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="url" class="col-sm-3 col-form-label">Url</label>
                <div class="col-sm-9">
                    <input type="text" required class="form-control @if($errors->has('url')) is-invalid @elseif(old('url') !== null) is-valid @endif " id="url" value="{{old('url')}}" name="url" placeholder="Website URL">
                    <span class="help-block"><small>Gunakan Domain saja Contoh example.com.</small></span>
                    @if($errors->has('url'))
                        <div class="invalid-feedback">
                            {{$errors->first('url')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="https" class="col-sm-3 col-form-label">Https</label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="https" name="https">
                        <label for="https" class="form-check-label">Ceklis Jika website sudah menggunakan Https</label>
                      </div>
                    @if($errors->has('https'))
                        <div class="invalid-feedback">
                            {{$errors->first('https')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                    <input type="text" required class="form-control @if($errors->has('title')) is-invalid @elseif(old('title') !== null) is-valid @endif " id="title" value="{{old('title')}}" name="title" placeholder="Website Title">
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{$errors->first('title')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row" id="uniqueidDiv" style="display:none;">
                <label for="uniqueid" class="col-sm-3 col-form-label">Unique ID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control @if($errors->has('uniqueid')) is-invalid @elseif(old('uniqueid') !== null) is-valid @endif " id="uniqueid" value="{{old('uniqueid')}}" name="uniqueid" placeholder="Unique ID">
                    @if($errors->has('uniqueid'))
                        <div class="invalid-feedback">
                            {{$errors->first('uniqueid')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control @if($errors->has('email')) is-invalid @elseif(old('email') !== null) is-valid @endif " id="email" value="{{old('email')}}" name="email" placeholder="Email">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{$errors->first('email')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control @if($errors->has('phone')) is-invalid @elseif(old('phone') !== null) is-valid @endif " id="phone" value="{{old('phone')}}" name="phone" placeholder="Phone">
                    @if($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{$errors->first('phone')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Meta Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control @if($errors->has('meta_desc')) is-invalid @elseif(old('meta_desc') !== null) is-valid @endif " id="meta_desc" value="{{old('meta_desc')}}" name="meta_desc" cols="1" placeholder="Meta Description"></textarea>
                    @if($errors->has('meta_desc'))
                        <div class="invalid-feedback">
                            {{$errors->first('meta_desc')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="meta_keywords" class="col-sm-3 col-form-label">Meta Keywords</label>
                <div class="col-sm-9">
                    <textarea class="form-control @if($errors->has('meta_keywords')) is-invalid @elseif(old('meta_keywords') !== null) is-valid @endif " id="meta_keywords" value="{{old('meta_keywords')}}" name="meta_keywords" placeholder="Meta Keywords"></textarea>
                    <span class="help-block"><small>Untuk Memisahkan keyword gunakan Koma.</small></span>
                    @if($errors->has('meta_keywords'))
                        <div class="invalid-feedback">
                            {{$errors->first('meta_keywords')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row" id="iconWeb">
                <label for="iconWeb" class="col-sm-3 col-form-label">Website Icon</label>
                <div class="col-sm-9">
                    <input type="file" name="iconWeb" id="iconWeb" accept="image/*" class="form-control @if($errors->has('iconWeb')) is-invalid @elseif(old('iconWeb') !== null) is-valid @endif">
                    <span class="help-block"><small>Biarkan Kosong untuk menggunakan icon default NES</small></span>
                    @if($errors->has('iconWeb'))
                        <div class="invalid-feedback">
                            {{$errors->first('iconWeb')}}
                        </div>
                    @endif
                </div>
            </div>
            <div id="imgModal">
                <div class="row">
                    <div class="col-lg-12"><label class="col-form-label">Icon</label></div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-8 col-md-8 col-xs-9">
                        <img src="{{asset('/admin/images/default-img.png')}}" alt="" id="ImgPlace"  onerror="ImgErrorLoad()" style="width: 100%; height:100%; border:1px;">
                        <div id="imgLoading" style="width: 300px; height:159px; display:none; border:1px; text-align:center;padding-top:10%">
                            <img src="{{asset('/admin/images/22.gif')}}" alt="" onerror="ImgErrorLoad()" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-3" id="ListBtnImg">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer" id="footerModal">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
@push('css')
{{-- <link href="{{asset('/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link src="{{asset('/admin/extra-libs/DataTables/responsive.dataTables.min.css')}}" rel="stylesheet"> --}}

<link href="{{asset('/admin/add-on/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('/admin/add-on/datatables.net-bs4/css/responsive.dataTables.min.css')}}">

<link href="{{asset('/admin/libs/sweetalert2/dist/sweetalert2.min.css')}}" type="text/css" rel="stylesheet">

<style>

    .dtr-data::before {
        content: "\A";
    }
    .noHover{
        pointer-events: none;
        text-align: center;
    }
</style>
@endpush
@push('script')

    <!--This page plugins -->
    {{-- <script src="{{asset('/admin/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('/admin/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('/admin/extra-libs/DataTables/dataTables.responsive.min.js')}}"></script> --}}
    <script src="{{asset('/admin/add-on/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/admin/add-on/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>

    <script src="{{asset('/admin/libs/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>


    <script>
        var oldadd = "{{old('name')}}";
        var oldedit = "{{old('mainId')}}";
        var Changed = false;
        $("textarea").each(function () {
            if(this.scrollHeight > 0){
                this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
            }
        }).on("input", function () {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";
        });
        $('#MyModal2').on('hide.bs.modal',function(){
            if($('#Label').text() == 'Update Produk' && Changed == true){
                location.reload();
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if(oldedit){
            EditPostFail(oldedit);
        }
        if(oldadd){
            $('#addForm').attr('action','nesadminsite/configsub/add');
            $('#imgModal').hide();
            $('#MyModal').modal({show:true});
        }
         $(document).ready( function () {
            // Dropzone.autoDiscover = false;
            // var MyDropZone = new Dropzone('div#mydropzone',{url:"public/img/user"});
            var table = $('#MyTable').DataTable({
            responsive: true,
            "dom": 'l<"toolbar">frtip',
            columns: [
                {target:0, width:'2%', responsivePriority:0,orderable:false,searchable:false},
                {target:1, responsivePriority:1},
                {target:2, responsivePriority:3},
                {target:3, responsivePriority:4},
                {target:4, responsivePriority:5},
                {target:5, width:'10%',responsivePriority:2},
            ],
            drawCallback: function(settings){
                if($(this).find('tbody tr').length <= 10){
                    $('#MyTable_paginate').hide();
                }
            },
            });
            $("#MyTable").on('length.dt',function(e,settings,len) {
                if($(this).find('tbody tr').length <= len){
                    $('#MyTable_paginate').hide();
                }
            }),
            table.on( 'order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
        function Detail(id) {
            $.ajax({
                url : '/nesadminsite/configsub/detail',
                type : 'POST',
                data : {'id':id},
                cache: false,
                beforeSend:function(){
                    $('.preloader').show();
                },
                success:function(data) {
                    ClearForm();
                    console.log(data);
                    ShowDetail(data,'detail');
                    $('.preloader').hide();

                },
                error:function(){
                    toastr.error('Ada Kesalahan Sistem, silakan hubungi pengembang sistem');
                }
            });
        }
        function Edit(id) {
            $.ajax({
                url : '/nesadminsite/configsub/detail',
                type : 'POST',
                data : {'id':id},
                cache: false,
                beforeSend:function(){
                    $('.preloader').show();
                },
                success:function(data) {
                    ClearForm();
                    console.log(data);
                    ShowDetail(data,'edit');
                    $('.preloader').hide();
                },
                error:function(){
                    toastr.error('Ada Kesalahan Sistem, silakan hubungi pengembang sistem');
                }
            });
        }
        function Delete(params) {
            swal({
                title: "Kamu yakin ?",
                text: "Data Tidak akan bisa dikembalikan jika sudah dihapus!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Iya, Lanjut !",
                cancelButtonText: "Tidak, Kembali !",
            }).then((Deleted) => {
                if(Deleted.value == true){
                    $.ajax({
                        url : '/nesadminsite/configsub/delete',
                        type : 'POST',
                        data : {'id':params},
                        cache: false,
                        cache: false,
                        beforeSend:function(){
                            $('.preloader').show();
                        },
                        complete:function(){
                            $('.preloader').hide();
                        },
                        success:function(data) {
                            location.reload();
                        }
                    });
                }
            });
        }
        function EditPostFail(id) {
            $.ajax({
                url : 'nesadminsite/configsub/detail',
                type : 'POST',
                data : {'id':id},
                cache: false,
                beforeSend:function(){
                    $('.preloader').show();
                },
                success:function(data) {
                    $('#idUser').val(data.id);
                    $('#email').val(data.email).attr('disabled',true);
                    $('#addForm').attr('action','/adminsipbos/user/edit');
                    $('#exampleModalLabel').text('Edit User');
                    $('#password').attr('required',false);
                    $('#password_confirmation').attr('required',false);
                    $('#imgModal').show();
                    showImg(data.icon);
                    autoHeight('meta_keywords');
                    autoHeight('meta_desc');
                    $('.preloader').hide();

                },
                error:function(){
                    toastr.error('Ada Kesalahan Sistem, silakan hubungi pengembang sistem');
                }
            });
        }
        function ShowAddModal() {
            ClearForm();
            $('#MyModal').modal({show:true});
        }
        function ClearForm() {
            $('#exampleModalLabel').text('Add Website')
            $('#name').val('').attr('disabled',false);
            $('#email').val('').attr('disabled',false);
            $('#url').val('').attr('disabled',false);
            $('#https').attr('checked',false);
            $('#title').val('');
            $('#uniqueidDiv').hide();
            $('#uniqueid').val('').attr('disabled',false);
            $('#meta_desc').val('');
            $('#meta_keywords').val('');
            $('#imgModal').hide();
            $('#iconWeb').val('');
            $('#addForm').attr('action','/nesadminsite/configsub/add');
            $('#footerModal').show();
        }
        function ShowDetail(data,type) {
            $('#mainId').val(data.id);
            if(type == 'detail'){
                $('#exampleModalLabel').text('Detail Website Config')
                $('#name').val(data.name).attr('disabled',true);
                $('#url').val(data.url).attr('disabled',true);
                $('#title').val(data.title).attr('disabled',true);
                $('#email').val(data.email).attr('disabled',true);
                $('#phone').val(data.phone).attr('disabled',true);
                if(data.https == 'true'){
                    $('#https').attr({'checked':true,'disabled':true});
                }else{
                    $('#https').attr({'checked':false,'disabled':true});
                }
                $('#meta_desc').val(data.meta_desc).attr('disabled',true);

                $('#meta_keywords').val(data.meta_keywords).change().attr('disabled',true);
                $('#uniqueidDiv').show();
                $('#uniqueid').val(data.uniqueid).attr('disabled',true);
                $('#password_confirmation').attr('required',true);
                if(data.icon){
                    showImg(data.icon);
                }
                autoHeight('meta_keywords');
                autoHeight('meta_desc');
                $('#imgModal').show();
                // $('#name').val(data.name).attr('disabled',true);
                // $('#email').val(data.email).attr('disabled',true);
                // $('#passwordRow').hide();
                // $('#passwordConfirmRow').hide();
                // $('#passwordConfirmRow').hide();
                // $('#RoleOption').val(data.role).change().attr('disabled',true);
                // $('#UserPictRow').hide();
                // $('#imgModal').show();
                // $('#addForm').attr('action','/adminsipbos/user/edit');
                // if(data.user_pict !== null){
                //     var div1 = '<div class="row rowBtnImg" id="btnImgHome" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-primary" onClick="showImg(`'+data.user_pict+'`)"" type="button"><i class="fa fa-eye"></i> Foto Home</button></div>';
                //     $('#ListBtnImg').append(div1);
                // }else{
                //     $('#imgModal').hide();
                // }
                $('#footerModal').hide();
            }else{
                $('#exampleModalLabel').text('Edit Website Config')
                $('#name').val(data.name).attr('disabled',false);
                $('#url').val(data.url).attr('disabled',true);
                $('#title').val(data.title).attr('disabled',false);
                $('#email').val(data.email).attr('disabled',false);
                $('#phone').val(data.phone).attr('disabled',false);
                if(data.https == 'true'){
                    $('#https').attr('checked',true);
                }else{
                    $('#https').attr('checked',false);
                }
                $('#meta_desc').val(data.meta_desc).attr('disabled',false);

                $('#meta_keywords').val(data.meta_keywords).change().attr('disabled',false);
                $('#uniqueidDiv').show();
                $('#uniqueid').val(data.uniqueid).attr('disabled',true);
                $('#password_confirmation').attr('required',false);
                $('#addForm').attr('action','configsub/update');
                if(data.icon){
                    showImg(data.icon);
                }
                autoHeight('meta_keywords');
                autoHeight('meta_desc');
                $('#imgModal').show();
            }
            $('#MyModal').modal({show:true});
        }
        function autoHeight(textarea){
            var tx1 = document.getElementById(textarea);
            setTimeout(function() {
                tx1.style.height = "auto";
                tx1.style.height = (tx1.scrollHeight) + "px";
            }, 200);
        }
        function showImg(imgName){
            $('#imgLoading').show();
            $('#ImgPlace').hide();
            // main image loaded ?
            $('#ImgPlace').on('load', function(){
                setTimeout(function(){
                    $('#imgLoading').hide();
                    $('#ImgPlace').show();
                },300);
            }).attr('src',"/img/icon/"+imgName);
        }
        function ImgErrorLoad(){
            $('#ImgPlace').attr('src',"/admin/images/not-found-img.png");
        }
    </script>
     {{-- <script src="{{asset('/admin/js/pages/datatable/datatable-basic.init.js')}}"></script> --}}
@endpush
