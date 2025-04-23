@extends('page.main')
@section('content')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Hubungi Kami</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Beranda<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('kontak') }}">Kontak</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="contact_area section_gap_bottom">
    <div class="container">
        <div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13"
            data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia." data-mlat="40.701083"
            data-mlon="-74.1522848">
        </div>
    </div>
</section>
@endsection