@extends('layouts.admin')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List User</h4>
                    <h6 class="card-subtitle" style="text-align: right"><button onclick="ShowAddModal()" class="btn btn-success"><i class="fa fa-plus"></i>Tambah User</button></h6>
                    <div class="">
                        <table id="MyTable" style="width:100%" class="table table-bordered no-warp">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td><div class="btn noHover @if($item->status == 'active') btn-success @else btn-danger @endif "><i class="fas fa-lg @if($item->status == 'active') fa-check @else fa-times @endif"></i></div></td>
                                        <td>{{$item->role}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-success" onclick="Active('{{$item->id}}')"><i class="mdi @if($item->status == 'active') mdi-account-off @else fa-user @endif"></i></button>
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
            <input type="hidden" name="idUser" id="idUser">
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="Name" class="col-sm-3 col-form-label">Nama User</label>
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
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control @if($errors->has('email')) is-invalid @elseif(old('email') !== null) is-valid @endif " id="email" value="{{old('email')}}" name="email" placeholder="Email User">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{$errors->first('email')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row" id="passwordRow">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" required class="form-control @if($errors->has('password')) is-invalid @elseif(old('password') !== null) is-valid @endif " id="password" name="password" placeholder="Password">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{$errors->first('password')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row" id="passwordConfirmRow">
                    <label for="password_confirmation " class="col-sm-3 col-form-label">Confirm Password</label>
                    <div class="col-sm-9">
                        <input type="password" required class="form-control @if($errors->has('password_confirmation')) is-invalid @elseif(old('password_confirmation') !== null) is-valid @endif " id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                        @if($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                {{$errors->first('password_confirmation')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        <select name="role" class="form-control  @if($errors->has('role')) is-invalid @elseif(old('role') !== null) is-valid @endif" id="RoleOption">
                            <option value="" disabled>Pilih Salah Satu</option>
                            <option value="admin" @if(old('role') == 'admin') selected @endif>Admin</option>
                            <option value="user" @if(old('role') == 'user') selected @endif>User</option>
                        </select>
                        @if($errors->has('role'))
                            <div class="invalid-feedback">
                                {{$errors->first('role')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row" id="UserPictRow">
                    <label for="email" class="col-sm-3 col-form-label">Foto Profil</label>
                    <div class="col-sm-9">
                        <input type="file" name="userPict" id="userPict" accept="image/*" class="form-control @if($errors->has('userPict')) is-invalid @elseif(old('userPict') !== null) is-valid @endif">
                        @if($errors->has('userPict'))
                            <div class="invalid-feedback">
                                {{$errors->first('userPict')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div id="imgModal">
                    <div class="row">
                        <div class="col-lg-12"><label class="col-form-label">Foto</label></div>
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
        var oldedit = "{{old('idUser')}}";
        var Changed = false
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
            $('#addForm').attr('action','/adminsipbos/user/add');
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
        function Active(id) {
            $.ajax({
                url : '/adminsipbos/user/active',
                type : 'POST',
                data : {'id':id},
                cache: false,
                beforeSend:function(){
                    $('.preloader').show();
                },
                success:function(data) {
                    location.reload();
                },
                error:function(){
                    toastr.error('Ada Kesalahan Sistem, silakan hubungi pengembang sistem');
                }
            });
        }
        function EditPostFail(id) {
            $.ajax({
                url : '/adminsipbos/user/detail',
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
                    if(data.user_pict !== null){
                        var div1 = '<div class="row rowBtnImg" id="btnImgHome" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-primary" onClick="showImg(`'+data.user_pict+'`)"" type="button"><i class="fa fa-eye"></i> Foto Home</button></div>';
                        $('#ListBtnImg').append(div1);
                    }else{
                        $('#imgModal').hide();
                    }
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
        function Detail(id) {
            $.ajax({
                url : '/adminsipbos/user/detail',
                type : 'POST',
                data : {'id':id},
                cache: false,
                beforeSend:function(){
                    $('.preloader').show();
                },
                success:function(data) {
                    ClearForm();
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
                url : '/adminsipbos/user/detail',
                type : 'POST',
                data : {'id':id},
                cache: false,
                beforeSend:function(){
                    $('.preloader').show();
                },
                success:function(data) {
                    ClearForm();
                    ShowDetail(data,'edit');
                    $('.preloader').hide();

                },
                error:function(){
                    toastr.error('Ada Kesalahan Sistem, silakan hubungi pengembang sistem');
                }
            });
        }
        function ClearForm() {
            $('#name').val('').attr('disabled',false);
            $('#email').val('').attr('disabled',false);
            $('#password').val('');
            $('#password_confirmation').val('');
            $('#RoleOption').val('').change().attr('disabled',false);
            $('#userPict').val('');
            $('#ImgPlace').attr('src',"/admin/images/default-img.png");
            $('#addForm').attr('action','/adminsipbos/user/add');
            $('#passwordRow').show();
            $('#passwordConfirmRow').show();
            $('#UserPictRow').show();
            $('#imgModal').hide();
            var list4 = $('#ListBtnImg').children();
            if(list4.length !== 0){
                for (let i = 0; i < list4.length; i++) {
                    $('.rowBtnImg').remove();
                }
            }
            $('#footerModal').show();
        }
        function ShowDetail(data,type) {
            $('#idUser').val(data.id);
            console.log(data);
            if(type == 'detail'){
                $('#exampleModalLabel').text('Detail User')
                $('#name').val(data.name).attr('disabled',true);
                $('#email').val(data.email).attr('disabled',true);
                $('#passwordRow').hide();
                $('#passwordConfirmRow').hide();
                $('#passwordConfirmRow').hide();
                $('#RoleOption').val(data.role).change().attr('disabled',true);
                $('#UserPictRow').hide();
                $('#imgModal').show();
                $('#addForm').attr('action','/adminsipbos/user/edit');
                if(data.user_pict !== null){
                    var div1 = '<div class="row rowBtnImg" id="btnImgHome" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-primary" onClick="showImg(`'+data.user_pict+'`)"" type="button"><i class="fa fa-eye"></i> Foto Home</button></div>';
                    $('#ListBtnImg').append(div1);
                }else{
                    $('#imgModal').hide();
                }
                $('#footerModal').hide();
            }else{
                $('#exampleModalLabel').text('Edit User')
                $('#name').val(data.name).attr('disabled',false);
                $('#email').val(data.email).attr('disabled',true);
                $('#RoleOption').val(data.role).change().attr('disabled',false);
                $('#password').attr('required',false);
                $('#password_confirmation').attr('required',false);
                $('#addForm').attr('action','/adminsipbos/user/edit');
                $('#imgModal').show();
                if(data.user_pict !== null){
                    var div1 = '<div class="row rowBtnImg" id="btnImgHome" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-primary" onClick="showImg(`'+data.user_pict+'`)"" type="button"><i class="fa fa-eye"></i> Foto Home</button></div>';
                    $('#ListBtnImg').append(div1);
                }else{
                    $('#imgModal').hide();
                }
            }
            $('#MyModal').modal({show:true});
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
            }).attr('src',"/img/user/"+imgName);
        }
        function ImgErrorLoad(){
            $('#ImgPlace').attr('src',"/admin/images/not-found-img.png");
        }
     </script>
     {{-- <script src="{{asset('/admin/js/pages/datatable/datatable-basic.init.js')}}"></script> --}}
@endpush
