@extends('layouts.main')
@section('main')
<main id="at-main" class="at-main at-haslayout">
    <div class="at-contactusvthree">
        <section class="at-mapandaddress at-haslayout">
            <div id="at-locationmap" class="at-locationmap"></div>
            <div class="container">
                <div class="at-addressarea">
                    <div id="at-addressslider" class="at-addressslider owl-carousel">
                        <div class="item">
                            <h2>Jakarta</h2>
                            <ul class="at-contactinfo">
                                <li>
                                    <i class="icon-icons202"></i>
                                    <span>021 2918 2901</span>
                                </li>
                                <li>
                                    <i class="icon-icons208"></i>
                                    <span><a href="mailto:hello@consultory.com">info@sipbos.com</a></span>
                                </li>
                                <li>
                                    <i class="icon-icons20"></i>
                                    <span>Mon to Fri - 08:00 to 17:00</span>
                                </li>
                                <li>
                                    <i class="icon-icons74"></i>
                                    <address>Hayam Wuruk Plaza Tower Lt.6-F, Jl. Hayam Wuruk No.108, RT.4/RW.9, Maphar, Kec. Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11160</address>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <form class="at-formtheme at-formcontacus">
                        <div class="at-sectiontitleborder">
                            <h2>Contact Us</h2>
                        </div>
                        <fieldset>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left">
                                    <div class="form-group">
                                        <input type="email" name="emailaddress" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left">
                                    <div class="form-group">
                                        <input type="text" name="phonenumber" class="form-control" placeholder="Phone Number">

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left">
                                    <button type="button" class="at-btn at-btnw">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
