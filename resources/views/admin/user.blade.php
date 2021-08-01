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
                                        <td>{{$item->status}}</td>
                                        <td>{{$item->role}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-success" onclick="active('{{$item->id}}')"><i class="mdi @if($item->status == 'active') mdi-account-off @else fa-user @endif"></i></button>
                                                <button class="btn btn-primary" onclick="detail('{{$item->id}}')"><i class="fas fa-info"></i></button>
                                                <button class="btn btn-warning" onclick="edit('{{$item->id}}')"><i class="fas fa-edit"></i></button>
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
            <form method="POST" action="/adminsipbos/user/add" enctype="multipart/form-data" id="addForm">

            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="Name" class="col-sm-3 col-form-label">Nama User</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control @if($errors->has('name')) is-invalid @elseif(old('name') !== null) is-valid @endif " id="Name" value="{{old('name')}}" name="name" placeholder="Nama User">
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
                <div class="form-group row">
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
                <div class="form-group row">
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
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Foto Profil</label>
                    <div class="col-sm-9">
                        <input type="file" name="userPict" accept="image/*" class="form-control @if($errors->has('userPict')) is-invalid @elseif(old('userPict') !== null) is-valid @endif">
                        @if($errors->has('userPict'))
                            <div class="invalid-feedback">
                                {{$errors->first('userPict')}}
                            </div>
                        @endif
                    </div>
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
    <!-- Modal Detail -->
    <div class="modal fade" id="MyModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="POST" action="" id="EditForm" enctype="multipart/form-data">

            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                <input type="hidden" name="IdProduk" id="IdItem" value="{{old('IdProduk') ?: '0'}}">

                <div class="form-group row">
                    <label for="ProdukNameEdit" class="col-sm-3 col-form-label">Nama Produk</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control @if($errors->has('ProdukNameEdit')) is-invalid @elseif(old('ProdukNameEdit') !== null) is-valid @endif " id="ProdukNameEdit" value="{{old('ProdukNameEdit')}}" name="ProdukNameEdit" placeholder="Tabungan SipBos">
                        @if ($errors->has('ProdukNameEdit'))
                        <div class="invalid-feedback">
                            {{$errors->first('ProdukNameEdit')}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lessDescEdit" class="col-sm-3 col-form-label">Deskripsi Singkat</label>
                    <div class="col-sm-9">
                        <textarea required class="form-control @if(@$errors->has(lessDescEdit)) is-invalid @elseif(old('lessDescEdit') !== null) is-valid @endif" id="lessDescEdit" name="lessDescEdit"> {{old('lessDescEdit')}} </textarea>
                        @if($errors->has('lessDescEdit'))
                            <div class="invalid-feedback">
                                {{$errors->first('lessDescEdit')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="produkDescEdit" class="col-sm-3 col-form-label">Deskripsi Detail</label>
                    <div class="col-sm-9">
                        <textarea required class="form-control @if(@$errors->has(produkDescEdit)) is-invalid @elseif(old('produkDescEdit') !== null) is-valid @endif" id="produkDescEdit" name="produkDescEdit"> {{old('produkDescEdit')}} </textarea>
                        @if($errors->has('produkDescEdit'))
                            <div class="invalid-feedback">
                                {{$errors->first('produkDescEdit')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="syarat_ketentuanEdit" class="col-sm-3 col-form-label">Syarat & Ketentuan <button type="button" style="margin-left:10px;float:right;" onclick="AddSnKEdit()" id="btnSnK" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button></label>
                    <div class="col-sm-9" id="input_form_edit">
                        {{-- <input required class="form-control @if(@$errors->has(syarat_ketentuan)) is-invalid @elseif(old('syarat_ketentuan') !== null) is-valid @endif" id="syarat_ketentuan" name="syarat_ketentuan"> --}}
                        @if (old('syarat_ketentuanEdit'))
                            @foreach (old('syarat_ketentuanEdit') as $index => $item)
                            <div class="row mb-2" id="SnKEdit{{$index}}">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input required class="form-control @if(@$errors->has(syarat_ketentuanEdit)) is-invalid @elseif(old('syarat_ketentuanEdit') !== null) is-valid @endif" name="syarat_ketentuanEdit[]" id="syarat_ketentuanEdit{{$index}}" value="{{$item}}" >
                                        <button style="margin-left:10px;" class="btn btn-sm btn-danger" type="button" onclick="RmSnK({{$index}})"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif

                        @if($errors->has('syarat_ketentuanEdit'))
                            <div class="invalid-feedback">
                                {{$errors->first('syarat_ketentuanEdit')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keunggulanEdit" class="col-sm-3 col-form-label">Keunggulan <button type="button" style="margin-left:10px;float:right;" id="btnKeunggulan" onclick="AddKeunggulanEdit()" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button></label>
                    <div class="col-sm-9" id="input_form_edit2">
                        @if (old('keunggulanEdit'))
                            @foreach (old('keunggulanEdit') as $index => $item)
                            <div class="row mb-2" id="KeunggulanEdit{{$index}}">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input required class="form-control @if(@$errors->has(keunggulanEdit)) is-invalid @elseif(old('keunggulanEdit') !== null) is-valid @endif" name="keunggulanEdit[]" value="{{$item}}" id="keunggulanEdit{{$index}}">
                                        <button style="margin-left:10px;" class="btn btn-sm btn-danger" type="button" onclick="RmKeunggulanEdit({{$index}})"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        @if($errors->has('syarat_ketentuan'))
                            <div class="invalid-feedback">
                                {{$errors->first('syarat_ketentuan')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div id="imgInput">
                    <div class="form-group row">
                   <label for="home_img_edit" class="col-sm-3 col-xs-3 col-form-label">Foto</label>
                   <div class="col-sm-9">
                       <input class="form-control @if(@$errors->has(home_img_edit)) is-invalid @elseif(old('home_img_edit') !== null) is-valid @endif" id="home_img_edit" type="file" accept="image/*" name="home_img_edit">
                       @if($errors->has('home_img_edit'))
                           <div class="invalid-feedback">
                               {{$errors->first('home_img_edit')}}
                           </div>
                       @endif
                       <div class="d-flex justify-content-start">
                           <small id="name1" class="badge badge-default  form-text text-dark">Ukuran yang direkomendasikan (1510x881)</small>
                       </div>
                   </div>
                   </div>
                   <div class="form-group row">
                       <label for="foto_list_produk" class="col-sm-3 col-xs-3 col-form-label">Foto List Produk</label>
                       <div class="col-sm-9">
                           <input class="form-control @if(@$errors->has(list_img)) is-invalid @elseif(old('list_img') !== null) is-valid @endif" id="list_img" type="file" accept="image/*" name="list_img">
                           @if($errors->has('list_img'))
                               <div class="invalid-feedback">
                                   {{$errors->first('list_img')}}
                               </div>
                           @endif
                           <div class="d-flex justify-content-start">
                               <small id="name1" class="badge badge-default  form-text text-dark">Ukuran yang direkomendasikan (1510x881)</small>
                           </div>
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="brosur_produk" class="col-sm-3 col-xs-3 col-form-label">Brosur Produk </label>
                       <div class="col-sm-9">
                           <input class="form-control @if(@$errors->has(brosur_produk)) is-invalid @elseif(old('brosur_produk') !== null) is-valid @endif" id="brosur_produk" type="file" accept="image/*" name="brosur_produk">
                           @if($errors->has('brosur_produk'))
                               <div class="invalid-feedback">
                                   {{$errors->first('brosur_produk')}}
                               </div>
                           @endif
                           <div class="d-flex justify-content-start">
                               <small id="name1" class="badge badge-default  form-text text-dark">Tipe File Harus PDF</small>
                           </div>
                       </div>
                   </div>
               </div>
                <div id="ListSubProduk">
                    <div class="form-group row">
                        <label for="home_img" class="col-sm-3 col-xs-3 col-form-label">List Sub Produk</label>
                        <div class="col-sm-9">
                            <div class="accordion" id="AccordionListSub" style="border: 1px solid #ddd;">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="imgModal">
                    <div class="row">
                        <div class="col-lg-12"><label class="col-form-label">Foto Produk</label></div>
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
            <div class="modal-footer" id="FooterModal">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="SaveFooter" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
    </div>
    <!-- End Modal -->
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
        var oldedit = "{{old('nameEdit')}}";
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
        if(oldadd){
            $('#MyModal').modal({show:true});
        }
        if(oldedit){
            EditPostFail(oldedit);
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
        function ShowAddModal() {
            $('#MyModal').modal({show:true});
        }

     </script>
     {{-- <script src="{{asset('/admin/js/pages/datatable/datatable-basic.init.js')}}"></script> --}}
@endpush
