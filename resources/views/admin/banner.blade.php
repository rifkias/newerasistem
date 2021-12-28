@extends('layouts.admin')

@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Banner Website</h4>
                <h6 class="card-subtitle" style="text-align: right"><button onclick="ShowAddModal()" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Banner</button></h6>
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
                                    <button class="btn btn-primary" onclick="Detail('{{$item->id}}')"><i class="fas fa-info"></i></button>
                                    <button class="btn btn-warning" onclick="Edit('{{$item->id}}')"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger" onclick="Delete({{$item->id}})"><i class="fas fa-trash"></i></button>
                                    <button class="btn btn-primary" onclick="Active({{$item->id}})"><i class="fas @if($item->active == 'false') fa-eye @else fa-eye-slash @endif"></i></button>
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
        <form method="POST" action="" enctype="multipart/form-data" id="addForm">

        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <input type="hidden" name="mainId" id="mainId">
        <div class="modal-body">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Nama Banner</label>
                <div class="col-sm-9">
                    <input type="text" required class="form-control @if($errors->has('NameEdit')) is-invalid @elseif(old('name') !== null) is-valid @endif " id="name" value="{{old('name')}}" name="name" placeholder="Nama Banner">
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">
                            {{$errors->first('name')}}
                    </div>
                    @endif
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
                <label for="readmore" class="col-sm-3 col-xs-3 col-form-label">Read More <input style="margin-left:25px" value="true" type="checkbox" id="readmore" name="readmore"></label>
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
                <label for="contactUs" class="col-sm-3 col-form-label">Contact Us <input style="margin-left:20px" checked value="true" type="checkbox" id="contactUs" name="contactUs"></label>
            </div>
            <div class="form-group row" id="updoadImg">
                <label for="updoadImg" class="col-sm-3 col-form-label">Banner Image</label>
                <div class="col-sm-9">
                    <input type="file" name="updoadImg" id="updoadImg" accept="image/*" class="form-control @if($errors->has('updoadImg')) is-invalid @elseif(old('updoadImg') !== null) is-valid @endif">
                    <span class="help-block"><small>File Maksimal Berukuran 2048KB</small></span>
                    @if($errors->has('updoadImg'))
                        <div class="invalid-feedback">
                            {{$errors->first('updoadImg')}}
                        </div>
                    @endif
                </div>
            </div>
            <div id="imgModal">
                <div class="row">
                    <div class="col-lg-12"><label class="col-form-label">Banner Image</label></div>
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

    {{-- <script src="{{asset('page/banner.js')}}"></script> --}}
    <script>
    var CurrentWeb = window.location.pathname.split("/").pop();
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
            if($('#Label').text() == 'Update Banner' && Changed == true){
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
            $('#addForm').attr('action','/nesadminsite/banner/'+CurrentWeb+'/add');
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
                {target:5, responsivePriority:6},
                {target:6, responsivePriority:2},
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
                url : '/nesadminsite/banner/'+CurrentWeb+'/detail',
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
                url : '/nesadminsite/banner/'+CurrentWeb+'/detail',
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
                    $('#addForm').attr('action','/nesadminsite/banner/'+CurrentWeb+'/update');
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
                        url : '/nesadminsite/banner/'+CurrentWeb+'/delete',
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
        function RefreshToken(params){
            console.log(params);
        }
        function Active(params) {
            swal({
                title: "Kamu yakin ?",
                text: "Banner tidak akan tayang selama status aktif!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Iya, Lanjut !",
                cancelButtonText: "Tidak, Kembali !",
            }).then((Deleted) => {
                if(Deleted.value == true){
                    $.ajax({
                        url : '/nesadminsite/banner/'+CurrentWeb+'/active',
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
                url : '/nesadminsite/banner/'+CurrentWeb+'/detail',
                type : 'POST',
                data : {'id':id},
                cache: false,
                beforeSend:function(){
                    $('.preloader').show();
                },
                success:function(data) {
                    $('#idUser').val(data.id);
                    $('#email').val(data.email).attr('disabled',true);
                    $('#addForm').attr('action','/nesadminsite/banner/'+CurrentWeb+'/update');
                    $('#exampleModalLabel').text('Edit Banner');
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
            $('#exampleModalLabel').text('Add Banner')
            $('#name').val('').attr('disabled',false);
            $('#descBanner').val('').attr('disabled',false);
            $('#readmore').attr({'checked':false,'disabled':false});
            $('#contactUs').attr({'checked':false,'disabled':false});
            $('#readmoreLink').val('').attr('disabled',false);
            $('#imgModal').hide();
            $('#updoadImg').val('');
            $('#updoadImg').show();
            $('#addForm').attr('action','/nesadminsite/banner/'+CurrentWeb+'/add');
            $('#footerModal').show();
        }
        function ShowDetail(data,type) {
            $('#mainId').val(data.id);
            if(type == 'detail'){
                $('#exampleModalLabel').text('Detail Banner')
                $('#name').val(data.banner_name).attr('disabled',true);
                $('#descBanner').val(data.banner_desc).attr('disabled',true);
                $('#readmoreLink').val(data.read_more_link).attr('disabled',true);
                $('#readmore').attr('disabled',true);
                $('#contactUs').attr('disabled',true);
                $('#updoadImg').hide();
                autoHeight('descBanner');
                $('#imgModal').show();
                $('#footerModal').hide();
            }else{
                $('#exampleModalLabel').text('Update Banner')
                $('#name').val(data.banner_name).attr('disabled',false);
                $('#descBanner').val(data.banner_desc).attr('disabled',false);
                $('#readmoreLink').val(data.read_more_link).attr('disabled',false);
                $('#readmore').attr('disabled',false);
                $('#contactUs').attr('disabled',false);
                autoHeight('descBanner');
                $('#imgModal').show();
            }
            if(data.read_more_link){
                $('#readmore').attr('checked',true);
            }
            if(data.contact_us){
                $('#contactUs').attr('checked',true);
            }
            if(data.banner_img){
                showImg(data.banner_img);
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
            }).attr('src',"/img/banner/"+imgName);
        }
        function ImgErrorLoad(){
            $('#ImgPlace').attr('src',"/admin/images/not-found-img.png");
        }


    </script>
     {{-- <script src="{{asset('/admin/js/pages/datatable/datatable-basic.init.js')}}"></script> --}}
@endpush
