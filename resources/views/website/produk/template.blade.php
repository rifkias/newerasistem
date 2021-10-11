@extends('layouts.main')
@section('main')
		<!--************************************
				Home Slider Start
		*************************************-->
		<div class="at-innerbanner at-innerbannervtwo">
			<div class="at-innerbannerbox">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="at-innerbannercontent">
								<ol class="at-breadcrumb">
									<li><a href="/">Home</a></li>
									<li><a href="/produk">Produk</a></li>
									<li class="at-active">{{$datas->nama_produk}}</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="at-main" class="at-main at-haslayout at-pagespace">
			<div class="container">
				<div class="row">
					<div class="at-content">
						<div class="at-services at-servicedetail">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								{{-- <figure class="at-sectionimg"><div class="at-imgholder"><img src="{{asset('/template/images/services/img-11.jpg')}}" alt="image description"></div></figure> --}}
                                <?php
                                if($datas->foto_list_produk){
                                    $path = asset('/img/produk/'.$datas->foto_list_produk);
                                    $img = @getimagesize($path);
                                    if(!$img){
                                        $img_loc = asset('/img/produk/'.$datas->foto_home);
                                    }else{
                                        $img_loc = $path;
                                    }
                                }else{
                                    $img_loc = asset('/img/produk/'.$datas->foto_home);
                                }

                                ?>
								<figure class="at-sectionimg"><div class="at-imgholder"><img style="width:839px; height:auto;" src="{{$img_loc}}" alt="image description"></div></figure>

								<section class="at-servicedetailsection">
									<div class="at-sectiontitleborder">
										<h2>{{$datas->nama_produk}}</h2>
									</div>
									<div class="at-description">
										<p>{{$datas->deskripsi_detail}}</p>
										{{-- <ul class="at-liststyle at-liststylearrowright">
											<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
											<li>Phasellus non felis malesuada, faucibus dui eget, sodales nibh.</li>
											<li>Duis non ipsum id mauris tristique sagittis.</li>
											<li>Duis malesuada ante eget blandit laoreet.</li>
											<li>Nulla quis nibh a diam pretium pretium.</li>
										</ul> --}}
									</div>
								</section>
								<section class="at-servicedetailsection">
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left">
                                            @php
                                                $array1 = json_decode($datas->syarat_ketentuan);
                                                $array2 = json_decode($datas->keunggulan_produk);
                                            @endphp
                                            <h3>Kelebihan Kami</h3>
                                            <ul class="at-liststyle at-liststylearrowright">
                                                @foreach ($array2 as $items)
                                                    <li>{{$items}}</li>
                                                @endforeach
                                                {{-- <li>Angsuran Tetap.</li>
                                                <li>Syarat Mudah.</li>
                                                <li>Proses pencairan cepat dan mudah.</li>
                                                <li>Jangka waktu pinjaman panjang.</li>
                                                <li>Bunga bersaing.</li> --}}
                                            </ul>
										</div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left">
                                            <h3>Syarat & Ketentuan</h3>
                                            <ul class="at-liststyle at-liststylearrowright">
                                                @foreach ($array1 as $items)
                                                    <li>{{$items}}</li>
                                                @endforeach
                                            </ul>
										</div>
									</div>
								</section>
                                @if ($datas->sub_produk_count !== 0)
                                <section class="at-servicedetailsection">
									<h3>Kategori</h3>
									<div class="at-description">
										<p>Kami memiliki beberapa kategori untuk produk ini.</p>
									</div>
									<div class="at-servicetabs">
										<ul class="at-servicetabsnav" role="tablist">
                                            @foreach ($datas->SubProduk as $key => $item)
                                            <li role="presentation" @if($key == 0) class="active" @endif><a href="#{{$key}}" aria-controls="{{$key}}" role="tab" data-toggle="tab">{{$item->nama_sub}}</a></li>
                                            @endforeach
										</ul>
										<div class="tab-content at-servicetabcontent">
                                            @foreach ($datas->SubProduk as $key => $item)
                                            <div role="tabpanel" class="tab-pane @if($key == 0) active @endif" id="{{$key}}">
												<div class="at-textcontent">
													{!!$item->deskripsi!!}
												</div>
											</div>
                                            @endforeach
										</div>
									</div>
								</section>
                                @endif
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:40px;text-align:center">
                                @if ($datas->brosur_produk)
                                    @php
                                        $pathPdf = asset('/img/produk/'.$datas->brosur_produk);
                                        $AgetHeaders = @get_headers($pathPdf);
                                        $filter = strpos($AgetHeaders[0],'200');
                                    @endphp
                                    @if($filter && $filter !== 'false')
                                        <button class="btn btn-lg btn-primary" onclick="window.open('{{$pathPdf}}')"><i class="fa fa-download" aria-hidden="true"></i> Unduh Brosur</button>
                                    @endif
                                @endif
                                <button class="btn btn-lg btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i> Kontak Kami Sekarang</button>
                                <button class="btn btn-lg btn-primary" onclick="showModal()"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Daftar Sekarang</button>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!--************************************
				Main End
		*************************************-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Form Registrasi Simpanan Berjangka</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="/registrasi/pinjaman" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" required id="nama" name="nama" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" required id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor Telpon</label>
                                <input type="text" class="form-control" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required id="phone" name="phone" placeholder="Nomor Telpon">
                            </div>
                    </div>
                    <p>Silakan Isi form di atas dengan benar dan kami akan langsung menghubungi anda</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim <i class="fa fa-paper-plane"></i></button>
                </div>
            </form>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
@endsection
@push('script')
    <script>
        function showModal() {
            $('#myModal').modal('show');
        }
    </script>
@endpush
