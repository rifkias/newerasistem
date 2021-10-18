@extends('layouts.admin')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Faq</h4>
                    <h6 class="card-subtitle" style="text-align: right"><button onclick="AddFaq()" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Kategori Faq</button></h6>
                    <div class="">
                        <table class="table table-bordered table-responsive no-warp table-fit">
                            <thead>
                                <tr>
                                    <th></th>
                                  <th style="width: 75%">Category</th>
                                  <th>Active</th>
                                  <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($faq as $key => $item)
                                <tr class="accordion-toggle">
                                    <td><button data-toggle="collapse" data-target="#{{$key}}" class="btn btn-default btn-xs"><span class="mdi mdi-eye"></span></button></td>
                                     <td>{{$item->category}}</td>
                                     <td>
                                        <div class="btn noHover @if($item->active == 'true') btn-success @else btn-danger @endif "><i class="fas fa-lg @if($item->active == 'true') fa-check @else fa-times @endif"></i></div>
                                     </td>
                                     <td style="white-space: nowrap;">
                                         <button class="btn btn-success" onclick="AddSubFaq('{{$item->id}}')"><i class="fas fa-plus"></i></button>
                                        {{-- <button class="btn btn-primary" onclick="ShowProduk('{{$item->id}}')"><i class="fas fa-info"></i></button> --}}
                                        <button class="btn btn-warning" onclick="Edit('{{$item->id}}')"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger" onclick="Delete({{$item->id}})"><i class="fas fa-trash"></i></button>
                                        <button class="btn btn-primary" onclick="Active({{$item->id}})"><i class="fas @if($item->active == 'false') fa-eye @else fa-eye-slash @endif"></i></button>
                                    </td>
                                 </tr>
                                 <tr>
                                     <td colspan="12" class="hiddenRow" style="height: auto;">
                                        <div class="accordian-body collapse" id="{{$key}}">
                                        <table class="table table-striped">
                                            @if(count($item->SubFaq) !== 0)
                                                <thead>
                                                    <tr class="info">
                                                        <th>No</th>
                                                        <th>Judul</th>
                                                        <th>Konten</th>
                                                        <th>Active</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($item->SubFaq as $key => $item2)
                                                        <tr>
                                                            <td>{{$key + 1}}</td>
                                                            <td>{{$item2->judul}}</td>
                                                            <td>{{$item2->konten}}</td>
                                                            <td>
                                                                <div class="btn noHover @if($item2->active == 'true') btn-success @else btn-danger @endif "><i class="fas fa-lg @if($item2->active == 'true') fa-check @else fa-times @endif"></i></div>
                                                            </td>
                                                            <td style="white-space: nowrap;">
                                                                <button class="btn btn-warning" onclick="EditSubFaq('{{$item2->id}}')"><i class="fas fa-edit"></i></button>
                                                                <button class="btn btn-danger" onclick="DeleteSubFaq({{$item2->id}})"><i class="fas fa-trash"></i></button>
                                                                <button class="btn btn-primary" onclick="ActiveSubFaq({{$item2->id}})"><i class="fas @if($item2->active == 'false') fa-eye @else fa-eye-slash @endif"></i></button></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            @else
                                            <tr>
                                                <td>Data Kosong</td>
                                            </tr>
                                            @endif
                                            </table>
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
            <form method="POST" action="/adminsipbos/website/faq/add/kategori" id="addForm">

            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Faq</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group row">
                <input type="hidden" name="MainFaqId" id="MainFaqId">
                <label for="category" class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control @if($errors->has('category')) is-invalid @elseif(old('category') !== null) is-valid @endif " id="category" value="{{old('category')}}" name="category" placeholder="Tata Cara Menjadi Anggota">
                            @if ($errors->has('category'))
                            <div class="invalid-feedback">
                                {{$errors->first('category')}}
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
    <!-- <div class="modal fade" id="MyModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="slug" class="col-sm-3 col-form-label">Url</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="url">{!!url('/produk')!!}/</span>
                            <input type="text" aria-describedby="url" required class="form-control @if($errors->has('slug')) is-invalid @elseif(old('slug') !== null) is-valid @endif " id="slug" value="{{old('slug')}}" name="slug">
                        </div>
                        @if ($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{$errors->first('slug')}}
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
    </div> -->
    <!-- Modal Add Sub Produk-->
    <div class="modal fade" id="MyModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="POST" action="/adminsipbos/website/faq/add/subfaq" id="subfaqform" enctype="multipart/form-data">

            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sub Faq</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <input type="hidden" name="FaqId" id="FaqId">
                <div class="form-group row">
                    <label for="judul" class="col-sm-3 col-xs-3 col-form-label">Judul</label>
                    <div class="col-sm-9">
                        <input class="form-control @if(@$errors->has(judul)) is-invalid @elseif(old('judul') !== null) is-valid @endif" id="judul" type="text" name="judul">
                        @if($errors->has('judul'))
                            <div class="invalid-feedback">
                                {{$errors->first('judul')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="konten" class="col-sm-3 col-xs-3 col-form-label">Konten</label>
                    <div class="col-sm-9" style="min-height: 200px;">
                        <textarea name="konten" id="konten" class="form-control @if(@$errors->has(konten)) is-invalid @elseif(old('konten') !== null) is-valid @endif" cols="30" rows="10"></textarea>
                        @if($errors->has('konten'))
                            <div class="invalid-feedback">
                                {{$errors->first('konten')}}
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
    <!-- End Modal -->
@endsection

@push('css')
{{-- <link href="{{asset('/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link src="{{asset('/admin/extra-libs/DataTables/responsive.dataTables.min.css')}}" rel="stylesheet"> --}}

<link href="{{asset('/admin/add-on/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
{{-- <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script> --}}
<link rel="stylesheet" type="text/css" href="{{asset('/admin/add-on/datatables.net-bs4/css/responsive.dataTables.min.css')}}">

<link href="{{asset('/admin/libs/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
{{-- <link href="{{asset('/admin/extra-libs/DataTables/datatables2.min.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/libs/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('/admin/libs/ckeditor/samples/css/samples.css')}}"> --}}
<style>
    @import url("https://use.fontawesome.com/releases/v5.13.0/css/all.css");
    .accordion .card-header .btnShow:after {
        font-family: "Font Awesome 5 Free";
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        font-weight: 400;
        content: "\f146";
        text-rendering: auto;

    }
    .accordion .card-header .btnShow.collapsed:after {
        font-family: "Font Awesome 5 Free";
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        font-weight: 400;
        content: "\f0fe";
        text-rendering: auto;
    }
    .dtr-data::before {
        content: "\A";
    }
    .noHover{
        pointer-events: none;
        text-align: center;
    }
    .hiddenRow {
        padding: 0 !important;
    }
    .table-fit td ,
    .table-fit th  {
        /* white-space: nowrap; */
        width: 1%;
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
     <script src="{{asset('/admin/libs/ckeditor/ckeditor.js')}}"></script>
     <script src=" {{asset('/admin/libs/ckeditor/samples/js/sample.js')}}"></script>
     {{-- <script src="{{asset('/admin/extra-libs/DataTables/datatables2.min.js')}}"></script> --}}
    <script>
        var SnkNow = 0;
        var SnkCount = 1;
        var oldadd = "{{old('ProdukName')}}";
        var oldedit = "{{old('IdProduk')}}";
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

        var KeunggulanNow = 0;
        var KeunggulanCount = 1;
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
                        url : '/adminsipbos/website/faq/delete',
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
        function AddFaq() {
            RemoveSuccessOrFail();
            $('#MyModal').modal({show:true});
        }
        function Edit(id) {
            $.ajax({
                url : '/adminsipbos/website/faq/detail/faq/'+id,
                type : 'GET',
                cache: false,
                beforeSend:function(){
                    $('.preloader').show();
                },
                complete:function(){
                    $('.preloader').hide();
                },
                success:function(data) {
                    ShowFaqModal(data);
                    // console.log(data);
                },
                error:function(){
                    toastr.error('Ada Kesalahan Sistem, silakan hubungi pengembang sistem');
                }
            });
        }
        function CleanFaq() {
            $('#category').val('');
        }
        function ShowFaqModal(data) {
            CleanFaq();
            $('#MainFaqId').val(data.id);
            $('#category').val(data.category);
            $('#addForm').attr('action','/adminsipbos/website/faq/edit/faq');
            $('#MyModal').modal('show');
        }
        function Active(id) {
            $.ajax({
                url : '/adminsipbos/website/faq/active/faq',
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
        function AddSubFaq(id) {
            $('#FaqId').val(id);
            $('#subfaqform').attr('action','/adminsipbos/website/faq/add/subfaq');
            CleanAddSubFaq();
            $('#MyModal3').modal('show');
        }
        function CleanAddSubFaq() {
            $('#judul').val('');
            $('#konten').val('');
        }
        function ShowSubFaqModal(data,status) {
            CleanAddSubFaq();
            $('#FaqId').val(data.id);
            $('#judul').val(data.judul);
            $('#konten').val(data.konten);
            $('#subfaqform').attr('action','/adminsipbos/website/faq/edit/subfaq');
            $('#MyModal3').modal('show');
            // $('#FaqId').val(data.id);
        }
        function EditSubFaq(id) {
            $.ajax({
                url : '/adminsipbos/website/faq/detail/subfaq/'+id,
                type : 'GET',
                cache: false,
                beforeSend:function(){
                    $('.preloader').show();
                },
                complete:function(){
                    $('.preloader').hide();
                },
                success:function(data) {
                    ShowSubFaqModal(data,'edit');
                },
                error:function(){
                    toastr.error('Ada Kesalahan Sistem, silakan hubungi pengembang sistem');
                }
            });
        }
        function RemoveSuccessOrFail() {
            $('.is-invalid').removeClass('is-invalid');
            $('.is-valid').removeClass('is-valid');
        }
        function DeleteSubFaq(params) {
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
                        url : '/adminsipbos/website/subfaq/delete',
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
                            // console.log(data);
                        }
                    });
                }
            });
        }
        function ActiveSubFaq(id) {
            $.ajax({
                url : '/adminsipbos/website/faq/active/subfaq',
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
     </script>
     {{-- <script src="{{asset('/admin/js/pages/datatable/datatable-basic.init.js')}}"></script> --}}
@endpush
