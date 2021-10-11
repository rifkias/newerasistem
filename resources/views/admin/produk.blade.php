@extends('layouts.admin')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Produk</h4>
                    <h6 class="card-subtitle" style="text-align: right"><button onclick="AddProduk()" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Produk</button></h6>
                    <div class="">
                        <table id="MyTable" style="width:100%" class="table table-bordered no-warp">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi Singkat</th>
                                    <th>Deskripsi Detail</th>
                                    <th>Syarat Ketentuan</th>
                                    <th>Keunggulan Produk</th>
                                    <th>Foto</th>
                                    <th>Total Sub Produk</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $index=>$item)
                                <tr>
                                    <?php
                                        $array1 = json_decode($item->syarat_ketentuan);
                                        $array2 = json_decode($item->keunggulan_produk);
                                        $SnK = 0;
                                        $Keunggulan = 0;
                                    ?>
                                    <td></td>
                                    <td><p>{{$item->nama_produk}}</p></td>
                                    <td><p>@if(strlen($item->deskripsi_singkat) >100){{substr($item->deskripsi_singkat,0,120)}}....@else{{$item->deskripsi_singkat}}@endif</p></td>
                                    <td><p>{{substr($item->deskripsi_detail,0,100)}}.....</p></td>
                                    {{-- <td>{{$item->syarat_ketentuan}}</td>
                                    {{-- <td>{{$item->syarat_ketentuan}}</td>
                                    <td>{{$item->keunggulan_produk}}</td> --}}
                                    <td>
                                        <ol style="padding-left:4px!important;">
                                            @foreach ($array1 as $items)
                                                    @php $SnK = $SnK + strlen($items); @endphp
                                                @if($SnK < 100)
                                                    <li>&nbsp;{{$items}}</li>
                                                @else
                                                    @php $countSnK = 100 - $SnK; @endphp
                                                    <li>&nbsp;{{substr($items,0,$countSnK)}}.....</li>
                                                    @break
                                                @endif
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td>
                                        <ol style="padding-left:4px!important;">
                                            @foreach ($array2 as $items)
                                                    @php $countKeunggulan = $Keunggulan + strlen($items); @endphp
                                                @if($Keunggulan < 100)
                                                    <li>&nbsp;{{$items}}</li>
                                                @else
                                                    @php $countKeunggulan = 100 - $Keunggulan; @endphp
                                                    <li>&nbsp;{{substr($items,0,$countKeunggulan)}}.....</li>
                                                    @break
                                                @endif
                                            @endforeach
                                        </ol>
                                    </td>

                                    {{-- <td style="text-align: center">@if($item->brosur_produk) <button class="btn btn-info"><i class="fas fa-eye"></i></button> @else <div class="btn btn-danger"><i class="fas fa-times"></i></div> @endif</td> --}}
                                    <td>
                                        <div class="row" style="margin-bottom: 2px;">
                                            <div class="col-8">Foto Home</div>
                                            <div class="col-4"><div class="btn-sm @if($item->foto_home !== null) btn-success @else btn-danger @endif noHover"><i class="fas fa-check"></i></div></div>
                                        </div>
                                        <div class="row" style="margin-bottom: 2px;">
                                            <div class="col-8">Foto List</div>
                                            <div class="col-4"><div class="btn-sm @if($item->foto_list_produk !== null) btn-success @else btn-danger @endif noHover"><i class="fas @if($item->foto_list_produk !== null) fa-check @else fa-times @endif"></i></div></div>
                                        </div>
                                        <div class="row" style="margin-bottom: 2px;">
                                            <div class="col-8">Brosur</div>
                                            <div class="col-4"><div class="btn-sm @if($item->brosur_produk !== null) btn-success @else btn-danger @endif noHover"><i class="fas @if($item->brosur_produk !== null) fa-check @else fa-times @endif"></i></div></div>
                                        </div>
                                    </td>
                                    <td>{{$item->sub_produk_count}}</td>
                                    <td><div class="btn noHover @if($item->active == 'true') btn-success @else btn-danger @endif "><i class="fas fa-lg @if($item->active == 'true') fa-check @else fa-times @endif"></i></div></td>
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-success" onclick="AddSubProduk('{{$item->id}}')"><i class="fas fa-plus"></i></button>
                                        <button class="btn btn-primary" onclick="ShowProduk('{{$item->id}}')"><i class="fas fa-info"></i></button>
                                        <button class="btn btn-warning" onclick="ShowProdukEdit('{{$item->id}}')"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger" onclick="ProdukDelete({{$item->id}})"><i class="fas fa-trash"></i></button>
                                        <button class="btn btn-primary" onclick="ActiveProduk({{$item->id}})"><i class="fas @if($item->active == 'false') fa-eye @else fa-eye-slash @endif"></i></button>
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
            <form method="POST" action="/adminsipbos/website/produk/add" enctype="multipart/form-data" id="addForm">

            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="ProdukName" class="col-sm-3 col-form-label">Nama Produk</label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control @if($errors->has('ProdukName')) is-invalid @elseif(old('ProdukName') !== null) is-valid @endif " id="ProdukName" value="{{old('ProdukName')}}" name="ProdukName" placeholder="Tabungan SipBos">
                            @if ($errors->has('ProdukName'))
                            <div class="invalid-feedback">
                                {{$errors->first('ProdukName')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lessDesc" class="col-sm-3 col-form-label">Deskripsi Singkat</label>
                        <div class="col-sm-9">
                            <textarea required class="form-control @if(@$errors->has(lessDesc)) is-invalid @elseif(old('lessDesc') !== null) is-valid @endif" id="lessDesc" name="lessDesc"> {{old('lessDesc')}} </textarea>
                            @if($errors->has('lessDesc'))
                                <div class="invalid-feedback">
                                    {{$errors->first('lessDesc')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="produkDesc" class="col-sm-3 col-form-label">Deskripsi Detail</label>
                        <div class="col-sm-9">
                            <textarea required class="form-control @if(@$errors->has(produkDesc)) is-invalid @elseif(old('produkDesc') !== null) is-valid @endif" id="produkDesc" name="produkDesc">{{old('produkDesc')}}</textarea>
                            @if($errors->has('produkDesc'))
                                <div class="invalid-feedback">
                                    {{$errors->first('produkDesc')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="syarat_ketentuan" class="col-sm-3 col-form-label">Syarat & Ketentuan <button type="button" style="margin-left:10px;float:right;" onclick="AddSnK()" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button></label>
                        <div class="col-sm-9" id="input_form">
                            {{-- <input required class="form-control @if(@$errors->has(syarat_ketentuan)) is-invalid @elseif(old('syarat_ketentuan') !== null) is-valid @endif" id="syarat_ketentuan" name="syarat_ketentuan"> --}}
                            @if (old('syarat_ketentuan'))
                                @foreach (old('syarat_ketentuan') as $index => $item)
                                <div class="row mb-2" id="SnK{{$index}}">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input required class="form-control @if(@$errors->has(syarat_ketentuan)) is-invalid @elseif(old('syarat_ketentuan') !== null) is-valid @endif" name="syarat_ketentuan[]" value="{{$item}}" >
                                            <button style="margin-left:10px;" class="btn btn-sm btn-danger" type="button" onclick="RmSnK({{$index}})"><i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                            <div class="row mb-2" id="SnK0">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input required class="form-control" name="syarat_ketentuan[]">
                                        <button style="margin-left:10px;" class="btn btn-sm btn-danger" type="button" onclick="RmSnK(0)"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($errors->has('syarat_ketentuan'))
                                <div class="invalid-feedback">
                                    {{$errors->first('syarat_ketentuan')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keunggulan" class="col-sm-3 col-form-label">Keunggulan <button type="button" style="margin-left:10px;float:right;" onclick="AddKeunggulan()" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button></label>
                        <div class="col-sm-9" id="input_form2">
                            @if (old('keunggulan'))
                                @foreach (old('keunggulan') as $index => $item)
                                <div class="row mb-2" id="Keunggulan{{$index}}">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input required class="form-control @if(@$errors->has(keunggulan)) is-invalid @elseif(old('keunggulan') !== null) is-valid @endif" name="keunggulan[]" value="{{$item}}" >
                                            <button style="margin-left:10px;" class="btn btn-sm btn-danger" type="button" onclick="RmKeunggulan({{$index}})"><i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                            <div class="row mb-2" id="Keunggulan0">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input required class="form-control" name="keunggulan[]">
                                        <button style="margin-left:10px;" class="btn btn-sm btn-danger" type="button" onclick="RmKeunggulan(0)"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>
                            @endif

                            {{-- <div class="row mb-2" id="Keunggulan0">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                            <input required class="form-control" name="keunggulan[]">
                                            <button style="margin-left:10px;" class="btn btn-sm btn-danger" type="button" onclick="RmKeunggulan(0)"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div> --}}
                            @if($errors->has('keunggulan'))
                                <div class="invalid-feedback">
                                    {{$errors->first('keunggulan')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="home_img" class="col-sm-3 col-xs-3 col-form-label">Foto Home</label>
                        <div class="col-sm-9">
                            <input class="form-control @if(@$errors->has(home_img)) is-invalid @elseif(old('home_img') !== null) is-valid @endif" id="home_img" type="file" accept="image/*" name="home_img">
                            @if($errors->has('home_img'))
                                <div class="invalid-feedback">
                                    {{$errors->first('home_img')}}
                                </div>
                            @endif
                            <div class="d-flex justify-content-start">
                                <small id="name1" class="badge badge-default  form-text text-dark">Ukuran yang direkomendasikan (1510x881)</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto_list_produk" class="col-sm-3 col-xs-3 col-form-label">Foto List Produk <input style="margin-left:25px" onclick="readMoreShow()" checked type="checkbox" id="foto_list_produk" name="foto_list_produk"></label>
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
    </div>
    <!-- Modal Add Sub Produk-->
    <div class="modal fade" id="MyModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="POST" action="/adminsipbos/website/produk/add/subproduk" enctype="multipart/form-data">

            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sub Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <input type="hidden" name="ProdukId" id="ProdukId">
                    <div class="form-group row">
                        <label for="nameSubProduk" class="col-sm-3 col-xs-3 col-form-label">Nama Sub Produk</label>
                        <div class="col-sm-9">
                            <input class="form-control @if(@$errors->has(nameSubProduk)) is-invalid @elseif(old('nameSubProduk') !== null) is-valid @endif" id="nameSubProduk" type="text" name="nameSubProduk">
                            @if($errors->has('nameSubProduk'))
                                <div class="invalid-feedback">
                                    {{$errors->first('nameSubProduk')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="konten" class="col-sm-3 col-xs-3 col-form-label">Konten</label>
                        <div class="col-sm-9" style="min-height: 200px;">
                           <textarea name="konten" id="konten" class="form-control" cols="30" rows="10"></textarea>
                            @if($errors->has('list_img'))
                                <div class="invalid-feedback">
                                    {{$errors->first('list_img')}}
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
        $(document).ready( function () {
            var konten = CKEDITOR.replace('konten');
            CKEDITOR.stylesSet.add('default', [
                {
                    name: 'Paragraph',
                    element: 'ul',
                    attributes: {
                        'class':'at-liststyle at-liststylearrowright',
                    }
                }
            ]);
            // var element = new CKEDITOR.dom.element( 'ul' );
            // element.addClass( 'at-liststyle' ); // <div class="classA">
            // element.addClass( 'at-liststylearrowright' ); // <div class="classA classB">
            // $("textarea").each(function () {
            //     if(this.scrollHeight !== 0){
            //         this.setAttribute("style", "height:" + (this.scrollHeight + 5) + "px;overflow-y:hidden;");
            //     }
            // }).on("input", function () {
            //     this.style.height = "auto";
            //     this.style.height = (this.scrollHeight) + "px";
            // });
            var table = $('#MyTable').DataTable({
            responsive: true,
            "dom": 'l<"toolbar">frtip',
            columns: [
                {target:0, responsivePriority:0,orderable:false,searchable:false},
                {target:1, responsivePriority:1},
                {target:2, width:'15%',responsivePriority:6},
                {target:3, width:'15%',responsivePriority:9},
                {target:4, width:'10',responsivePriority:7},
                {target:5, width:'10%',responsivePriority:8},
                {target:6, width:'20%', responsivePriority:5,orderable:false,searchable:false},
                {target:7, responsivePriority:4},
                {target:8, responsivePriority:3,orderable:false,searchable:false},
                {target:9,orderable:false, responsivePriority:2},
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
        function AddSnK() {
            var count = SnkNow + 1;
            console.log(count);
            var div = '<div class="row mb-2" id="SnK'+count+'"> <div class="col-sm-12"> <div class="input-group"> <input required class="form-control" id="syarat_ketentuanEdit'+count+'" name="syarat_ketentuanEdit[]"><button style="margin-left:10px;" type="button" class="btn btn-sm btn-danger" onclick="RmSnK('+count+')"><i class="fas fa-minus"></i></button></div></div></div>';
            $('#input_form').append(div);
            SnkNow++;
            SnkCount++;
        }
        function AddSnKEdit() {
            var SnKEdit = $('#input_form_edit').children();
            var count = SnKEdit.length++;
            var div = '<div class="row mb-2" id="SnKEdit'+count+'"> <div class="col-sm-12"> <div class="input-group"> <input required class="form-control" id="syarat_ketentuanEdit'+count+'" name="syarat_ketentuanEdit[]"><button style="margin-left:10px;" type="button" class="btn btn-sm btn-danger" onclick="RmSnKEdit('+count+')"><i class="fas fa-minus"></i></button></div></div></div>';
            $('#input_form_edit').append(div);
            SnkNow++;
            SnkCount++;
        }
        function RmSnK(id) {
            if(SnkCount !== 1){
                var TagId = '#SnK'+id;
                SnkCount--;
                var item = $(TagId).remove();
            }else{
                toastr.warning('Syarat & Ketentuan Tidak boleh kurang dari 1',"Warning !!!")
            }
        }
        function RmSnKEdit(id) {
            var SnKCountEdit = $('#input_form_edit').children();
            if(SnKCountEdit.length >= 2){
                var TagId = '#SnKEdit'+id;
                var item = $(TagId).remove();
            }else{
                toastr.warning('Syarat & Ketentuan Tidak boleh kurang dari 1',"Warning !!!")
            }
        }
        function AddKeunggulan() {
            var count = KeunggulanNow + 1;
            var div = '<div class="row mb-2" id="Keunggulan'+count+'"> <div class="col-sm-12"> <div class="input-group"> <input required class="form-control" id="keunggulan'+count+'" name="keunggulan[]"><button style="margin-left:10px;" class="btn btn-sm btn-danger" type="button" onclick="RmKeunggulan('+count+')"><i class="fas fa-minus"></i></button></div></div></div>';
            $('#input_form2').append(div);
            KeunggulanNow++;
            KeunggulanCount++;
        }
        function AddKeunggulanEdit() {
            var KeunggulanCountEdit = $('#input_form_edit2').children();
            var count = KeunggulanCountEdit.length++;
            var div = '<div class="row mb-2" id="KeunggulanEdit'+count+'"> <div class="col-sm-12"> <div class="input-group"> <input required class="form-control" id="keunggulanEdit'+count+'" name="keunggulanEdit[]"><button style="margin-left:10px;" class="btn btn-sm btn-danger"  type="button"onclick="RmKeunggulanEdit('+count+')"><i class="fas fa-minus"></i></button></div></div></div>';
            $('#input_form_edit2').append(div);
            KeunggulanNow++;
            KeunggulanCount++;
        }
        function RmKeunggulan(id) {
            if(KeunggulanCount !== 1){
                var TagId = '#Keunggulan'+id;
                KeunggulanCount--;
                var item = $(TagId).remove();
            }else{
                toastr.warning('Keunggulan Tidak boleh kurang dari 1',"Warning !!!")
            }
        }
        function RmKeunggulanEdit(id) {
            var KeunggulanCountEdit = $('#input_form_edit2').children();
            console.log(id);
            if(KeunggulanCountEdit.length >= 2){
                var TagId = '#KeunggulanEdit'+id;
                var item = $(TagId).remove();
            }else{
                toastr.warning('Keunggulan Tidak boleh kurang dari 1',"Warning !!!")
            }
        }
        function EditPostFail(id){
            $.ajax({
                url : '/adminsipbos/website/produk/detail/'+id,
                type : 'GET',
                cache: false,
                beforeSend:function(){
                    $('.preloader').show();
                },
                complete:function(){
                    $('.preloader').hide();
                },
                success:function(data) {
                    $('#EditForm').attr('action','/adminsipbos/website/produk/edit');
                    // CheckList();
                    var tx1 = document.getElementById('produkDescEdit');
                    var tx2 = document.getElementById('lessDescEdit');
                    setTimeout(function() {
                        tx1.style.height = "auto";
                        tx1.style.height = (tx1.scrollHeight) + "px";
                        tx2.style.height = "auto";
                        tx2.style.height = (tx2.scrollHeight) + "px";
                    }, 300);
                    if(data.sub_produk_count > 0){
                        $('#ListSubProduk').show();
                        for (let i = 0; i < data.sub_produk.length; i++) {
                            var div = '<div class="card CardSub" style="margin-bottom: 0px !important;border-bottom:1px solid #ddd;"> <div class="card-header" id="heading'+data.sub_produk[i].id+'">'+data.sub_produk[i].nama_sub+'<div class="float-right"> <button type="button" class="btn btn-sm btn-primary btnShow collapsed" style="margin-right:2px;" data-toggle="collapse" data-target="#collapse'+i+'"></button> <button type="button" class="btn btnDelete btn-sm btn-danger" onclick="SubProdukDelete('+data.sub_produk[i].id+')"><i class="fa fa-trash"></i></button> </div> </div> <div id="collapse'+i+'" class="collapse" aria-labelledby="heading'+i+'" data-parent="#AccordionListSub"> <div class="card-body">'+data.sub_produk[i].deskripsi+'</div> </div> </div>'
                            $('#AccordionListSub').append(div);
                        }
                    }else{
                        $('#ListSubProduk').hide();
                    }
                    if(data.foto_home || data.foto_list_produk || data.brosur_produk){
                        $('#imgModal').show();
                        if(data.foto_home !== null){
                            var div1 = '<div class="row rowBtnImg" id="btnImgHome" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-primary" onClick="showImg(`'+data.foto_home+'`)"" type="button"><i class="fa fa-eye"></i> Foto Home</button></button> </div>';
                            $('#ListBtnImg').append(div1);
                        }
                        if(data.foto_list_produk !== null){
                            var div2 = '<div class="row rowBtnImg" id="btnImgList" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-primary" onClick="showImg(`'+data.foto_list_produk+'`)" type="button"><i class="fa fa-eye"></i> Foto List Produk</button><button type="button" class="btn btnDelete btn-sm btn-danger" onclick="ImgDelete(`'+data.foto_list_produk+'`,'+data.id+',`Img_List`)"><i class="fa fa-trash"></i></button></div>';
                            $('#ListBtnImg').append(div2);
                        }

                        if(data.brosur_produk !== null){
                            var div3 = '<div class="row rowBtnImg" id="btnImgBrosur" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-success" onClick="showImg(`'+data.brosur_produk+'`)" type="button"><i class="fa fa-download"></i> Download Brosur</button><button type="button" class="btn btnDelete btn-sm btn-danger" onclick="ImgDelete(`'+data.brosur_produk+'`,'+data.id+',`Img_Brosur`)"><i class="fa fa-trash"></i></button></div>';
                            $('#ListBtnImg').append(div3);
                        }
                    }else{
                        $('#imgModal').hide();
                    }
                $('#MyModal2').modal('show');
                    console.log(data);
                },
                error:function(){
                    toastr.error('Ada Kesalahan Sistem, silakan hubungi pengembang sistem');
                }
            });
        }
        function AddProduk() {
            RemoveSuccessOrFail();
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
        function SubProdukDelete(id){
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
                        url : '/adminsipbos/website/produk/delete/subproduk',
                        type : 'POST',
                        data : {'id':id},
                        cache: false,
                        beforeSend:function(){
                            $('.preloader').show();
                        },
                        complete:function(){
                            $('.preloader').hide();
                        },
                        success:function(data) {
                            $('#heading'+id).remove();
                            var SubProdukChild = $('#AccordionListSub').children();
                            console.log(SubProdukChild,SubProdukChild.length);
                            if(SubProdukChild.length == 1){
                                $('#ListSubProduk').hide();
                            }
                            Changed = true;
                            // location.reload();
                        },
                        error:function(){
                            toastr.error('Ada Kesalahan Sistem, silakan hubungi pengembang sistem');
                        }
                    });
                }
            });
        }
        function ProdukDelete(params) {
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
                        url : '/adminsipbos/website/produk/delete',
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
        function ImgDelete(img,id,type){
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
                        url : '/adminsipbos/website/produk/delete/foto',
                        type : 'POST',
                        data : {'id':id,'img':img,'type':type},
                        cache: false,
                        beforeSend:function(){
                            $('.preloader').show();
                        },
                        complete:function(){
                            $('.preloader').hide();
                        },
                        success:function(data) {
                            console.log(data);
                            if(type == 'Img_Brosur'){
                                $('#btnImgBrosur').remove();
                            }else if(type == 'Img_List'){
                                $('#btnImgList').remove();
                            }
                            Changed = true;
                            toastr.success('Foto Berhasil dihapus');
                            // location.reload();
                        },
                        error:function(){
                            toastr.error('Ada Kesalahan Sistem, silakan hubungi pengembang sistem');
                        }
                    });
                }
            });
        }
        function ShowProduk(id) {
            $.ajax({
                url : '/adminsipbos/website/produk/detail/'+id,
                type : 'GET',
                cache: false,
                beforeSend:function(){
                    $('.preloader').show();
                },
                complete:function(){
                    $('.preloader').hide();
                },
                success:function(data) {
                    DetailModal(data,'detail');
                },
                error:function(){
                    toastr.error('Ada Kesalahan Sistem, silakan hubungi pengembang sistem');
                }
            });
        }
        function ShowProdukEdit(id) {
            $.ajax({
                url : '/adminsipbos/website/produk/detail/'+id,
                type : 'GET',
                cache: false,
                beforeSend:function(){
                    $('.preloader').show();
                },
                complete:function(){
                    $('.preloader').hide();
                },
                success:function(data) {
                    DetailModal(data,'edit');
                },
                error:function(){
                    toastr.error('Ada Kesalahan Sistem, silakan hubungi pengembang sistem');
                }
            });
        }
        function ActiveProduk(id) {
            $.ajax({
                url : '/adminsipbos/website/produk/active',
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
        function AddSubProduk(id) {
            $('#ProdukId').val(id);
            $('#MyModal3').modal('show');
        }

        $("textarea").each(function () {
            if(this.scrollHeight !== 0){
                this.setAttribute("style", "height:" + (this.scrollHeight + 3) + "px;overflow-y:hidden;overflow-x:hidden;");
            }
        }).on("input", function () {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";
        });
        function CheckList() {
            var list1 = $('#input_form_edit').children();
            var list2 = $('#input_form_edit2').children();
            if(list1.length !== 0){
                for (let i = 0; i < list1.length; i++) {
                    var TagId = '#SnKEdit'+i;
                    $(TagId).remove();
                }
            }
            if(list2.length !== 0){
                for (let i = 0; i < list2.length; i++) {
                    var TagId = '#KeunggulanEdit'+i;
                    $(TagId).remove();
                }
            }

            var list3 = $('#AccordionListSub').children();
            if(list3.length !== 0){
                for (let i = 0; i < list3.length; i++) {
                    $('.CardSub').remove();
                }
            }

            var list4 = $('#ListBtnImg').children();
            if(list4.length !== 0){
                for (let i = 0; i < list4.length; i++) {
                    $('.rowBtnImg').remove();
                }
            }
        }
        function RemoveSuccessOrFail() {
            $('.is-invalid').removeClass('is-invalid');
            $('.is-valid').removeClass('is-valid');
        }
        function DetailModal(data,type) {
            $('#ImgPlace').attr('src',"/admin/images/default-img.png");
            $('#EditForm').get(0).reset();
            RemoveSuccessOrFail();
            if(type == 'detail'){
                CheckList();
                $('#Label').text('Detail Produk');
                $('#ProdukNameEdit').val(data.nama_produk).attr('readonly',true);
                $('#lessDescEdit').val(data.deskripsi_singkat).attr('readonly',true);
                $('#slug').val(data.slug).attr('readonly',true);
                $('#produkDescEdit').val(data.deskripsi_detail).attr('readonly',true);
                var tx1 = document.getElementById('produkDescEdit');
                var tx2 = document.getElementById('lessDescEdit');
                setTimeout(function() {
                    tx1.style.height = "auto";
                    tx1.style.height = (tx1.scrollHeight) + "px";
                    tx2.style.height = "auto";
                    tx2.style.height = (tx2.scrollHeight) + "px";
                }, 300);
                    var array1 = JSON.parse(data.keunggulan_produk);
                    var array2 = JSON.parse(data.syarat_ketentuan);

                    for (let i = 0; i < array1.length; i++) {
                        var div = '<div class="row mb-2" id="KeunggulanEdit'+i+'"> <div class="col-sm-12"> <div class="input-group"> <input required class="form-control" id="keunggulanEdit'+i+'" readonly value="'+array1[i]+'" name="keunggulanEdit[]"></div></div></div>';
                        $('#input_form_edit2').append(div);
                    }
                    for (let i = 0; i < array2.length; i++) {
                        var div = '<div class="row mb-2" id="SnKEdit'+i+'"> <div class="col-sm-12"> <div class="input-group"> <input required class="form-control" id="syarat_ketentuanEdit'+i+'" readonly value="'+array2[i]+'" name="syarat_ketentuanEdit[]"></div></div></div>';
                        $('#input_form_edit').append(div);
                    }
                    if(data.sub_produk_count > 0){
                        $('#ListSubProduk').show();
                        for (let i = 0; i < data.sub_produk.length; i++) {
                            var div = '<div class="card CardSub" style="margin-bottom: 0px !important;border-bottom:1px solid #ddd;"> <div class="card-header" id="heading'+i+'">'+data.sub_produk[i].nama_sub+'<div class="float-right"> <button type="button" class="btn btn-sm btn-primary btnShow collapsed" style="margin-right:2px;" data-toggle="collapse" data-target="#collapse'+i+'"></button> <button type="button" class="btn btnDelete btn-sm btn-danger" onclick="SubProdukDelete('+data.sub_produk[i].id+')"><i class="fa fa-trash"></i></button> </div> </div> <div id="collapse'+i+'" class="collapse" aria-labelledby="heading'+i+'" data-parent="#AccordionListSub"> <div class="card-body">'+data.sub_produk[i].deskripsi+'</div> </div> </div>'
                            $('#AccordionListSub').append(div);
                        }
                    }else{
                        $('#ListSubProduk').hide();
                    }
                    $('.btnDelete').hide();

                    if(data.foto_home || data.foto_list_produk || data.brosur_produk){
                        $('#imgModal').show();
                        if(data.foto_home !== null){
                            var div1 = '<div class="row rowBtnImg" id="btnImgHome" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-primary" onClick="showImg(`'+data.foto_home+'`)"" type="button"><i class="fa fa-eye"></i> Foto Home</button></div>';
                            $('#ListBtnImg').append(div1);
                        }
                        if(data.foto_list_produk !== null){
                            var div2 = '<div class="row rowBtnImg" id="btnImgList" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-primary" onClick="showImg(`'+data.foto_list_produk+'`)" type="button"><i class="fa fa-eye"></i> Foto List Produk</button></div>';
                            $('#ListBtnImg').append(div2);
                        }

                        if(data.brosur_produk !== null){
                            var div3 = '<div class="row rowBtnImg" id="btnImgBanner" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-success" onClick="showImg(`'+data.brosur_produk+'`)" type="button"><i class="fa fa-download"></i> Download Brosur</button></div>';
                            $('#ListBtnImg').append(div3);
                        }
                    }else{
                        $('#imgModal').hide();
                    }

                    // $('.btnDelete').hide();
                    // if(data.foto_home){
                    //     $('#')
                    // }
                    // if(data.foto_list_produk){

                    // }
                $('#btnKeunggulan').hide();
                $('#btnSnK').hide();
                $('#imgInput').hide();
                $('#FooterModal').hide();
            }else{
                console.log(data);
                $('#SaveFooter').text('Update Change');
                $('#EditForm').attr('action','/adminsipbos/website/produk/edit');
                CheckList();
                $('#imgInput').show();
                $('#IdItem').val(data.id)
                $('#Label').text('Update Produk');
                $('#ProdukNameEdit').val(data.nama_produk).attr('readonly',false);
                $('#lessDescEdit').val(data.deskripsi_singkat).attr('readonly',false);
                $('#slug').val(data.slug).attr('readonly',false);
                $('#produkDescEdit').val(data.deskripsi_detail).attr('readonly',false);
                var tx1 = document.getElementById('produkDescEdit');
                var tx2 = document.getElementById('lessDescEdit');
                setTimeout(function() {
                    tx1.style.height = "auto";
                    tx1.style.height = (tx1.scrollHeight) + "px";
                    tx2.style.height = "auto";
                    tx2.style.height = (tx2.scrollHeight) + "px";
                }, 300);
                    var array1 = JSON.parse(data.keunggulan_produk);
                    var array2 = JSON.parse(data.syarat_ketentuan);

                    for (let i = 0; i < array1.length; i++) {
                        var div = '<div class="row mb-2" id="KeunggulanEdit'+i+'"> <div class="col-sm-12"> <div class="input-group"> <input required class="form-control" id="keunggulanEdit'+i+'" value="'+array1[i]+'" name="keunggulanEdit[]"><button style="margin-left:10px;" class="btn btn-sm btn-danger" onclick="RmKeunggulanEdit('+i+')"><i class="fas fa-minus"></i></button></div></div></div>';
                        $('#input_form_edit2').append(div);
                    }
                    for (let i = 0; i < array2.length; i++) {
                        var div = '<div class="row mb-2" id="SnKEdit'+i+'"> <div class="col-sm-12"> <div class="input-group"> <input required class="form-control" id="syarat_ketentuanEdit'+i+'" value="'+array2[i]+'" name="syarat_ketentuanEdit[]"><button type="button" style="margin-left:10px;" class="btn btn-sm btn-danger" type="button" onclick="RmSnKEdit('+i+')"><i class="fas fa-minus"></i></button></div></div></div>';
                        $('#input_form_edit').append(div);
                    }
                    if(data.sub_produk_count > 0){
                        $('#ListSubProduk').show();
                        for (let i = 0; i < data.sub_produk.length; i++) {
                            var div = '<div class="card CardSub" style="margin-bottom: 0px !important;border-bottom:1px solid #ddd;"> <div class="card-header" id="heading'+data.sub_produk[i].id+'">'+data.sub_produk[i].nama_sub+'<div class="float-right"> <button type="button" class="btn btn-sm btn-primary btnShow collapsed" style="margin-right:2px;" data-toggle="collapse" data-target="#collapse'+i+'"></button> <button type="button" class="btn btnDelete btn-sm btn-danger" onclick="SubProdukDelete('+data.sub_produk[i].id+')"><i class="fa fa-trash"></i></button> </div> </div> <div id="collapse'+i+'" class="collapse" aria-labelledby="heading'+i+'" data-parent="#AccordionListSub"> <div class="card-body">'+data.sub_produk[i].deskripsi+'</div> </div> </div>'
                            $('#AccordionListSub').append(div);
                        }
                    }else{
                        $('#ListSubProduk').hide();
                    }
                    $('.btnDelete').show();

                    if(data.foto_home || data.foto_list_produk || data.brosur_produk){
                        $('#imgModal').show();
                        if(data.foto_home !== null){
                            var div1 = '<div class="row rowBtnImg" id="btnImgHome" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-primary" onClick="showImg(`'+data.foto_home+'`)"" type="button"><i class="fa fa-eye"></i> Foto Home</button></button> </div>';
                            $('#ListBtnImg').append(div1);
                        }
                        if(data.foto_list_produk !== null){
                            var div2 = '<div class="row rowBtnImg" id="btnImgList" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-primary" onClick="showImg(`'+data.foto_list_produk+'`)" type="button"><i class="fa fa-eye"></i> Foto List Produk</button><button type="button" class="btn btnDelete btn-sm btn-danger" onclick="ImgDelete(`'+data.foto_list_produk+'`,'+data.id+',`Img_List`)"><i class="fa fa-trash"></i></button></div>';
                            $('#ListBtnImg').append(div2);
                        }

                        if(data.brosur_produk !== null){
                            var div3 = '<div class="row rowBtnImg" id="btnImgBrosur" style="margin-bottom:5px; padding-right:10px;padding-left:10px;"><button class="btn btn-success" onClick="showImg(`'+data.brosur_produk+'`)" type="button"><i class="fa fa-download"></i> Download Brosur</button><button type="button" class="btn btnDelete btn-sm btn-danger" onclick="ImgDelete(`'+data.brosur_produk+'`,'+data.id+',`Img_Brosur`)"><i class="fa fa-trash"></i></button></div>';
                            $('#ListBtnImg').append(div3);
                        }
                    }else{
                        $('#imgModal').hide();
                    }
                $('#btnKeunggulan').show();
                $('#btnSnK').show();
                $('#FooterModal').show();
            }
            $('#MyModal2').modal('show')
        }

        function showImg(imgName){
            // $('#imgLoading').show();
            // $('#ImgPlace').one("load",function(){
            //     $('#imgLoading').show();
            // }).attr('src',"/img/produk/"+imgName);
            // $('#imgLoading').show();
            $('#imgLoading').show();
            $('#ImgPlace').hide();
            // main image loaded ?
            $('#ImgPlace').on('load', function(){
                setTimeout(function(){
                    $('#imgLoading').hide();
                    $('#ImgPlace').show();
                },300);
            }).attr('src',"/img/produk/"+imgName);
            // $('#ImgPlace').attr('src',"/img/produk/"+imgName);
        }
        function ImgErrorLoad(){
            $('#ImgPlace').attr('src',"/admin/images/not-found-img.png");
        }

     </script>
     {{-- <script src="{{asset('/admin/js/pages/datatable/datatable-basic.init.js')}}"></script> --}}
@endpush
