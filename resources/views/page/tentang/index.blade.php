@extends('page.main')
@section('content')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Tentang Kami</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Beranda<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('tentang') }}">Tentang</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset('themes/img/blog/car-11.jpg') }}" alt="">
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 blog_details">
                        <h2>Roditri Mobil</h2>
                        <p class="excert">
                            Roditri Mobil adalah platform jual beli mobil bekas terpercaya yang hadir untuk memudahkan
                            Anda menemukan mobil impian dengan harga yang bersahabat dan proses yang transparan. Kami
                            menghadirkan pengalaman jual beli mobil yang aman, cepat, dan tanpa ribet, baik untuk
                            pembeli maupun penjual.
                        </p>
                        <p>
                            Dengan tim yang berpengalaman di bidang otomotif, kami siap membantu Anda dalam setiap
                            langkah—mulai dari memilih unit mobil terbaik, inspeksi kendaraan, pengurusan dokumen,
                            hingga layanan kredit dan tukar tambah.
                        </p>
                        <p>
                            Kami percaya bahwa setiap orang berhak memiliki kendaraan yang nyaman dan sesuai kebutuhan,
                            tanpa harus khawatir soal kualitas maupun proses transaksi. Karena itu, setiap unit mobil
                            yang kami jual sudah melalui proses seleksi dan pemeriksaan ketat.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">

                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img rounded-circle" src="{{ asset('themes/img/blog/author.png') }}" alt="">
                        <h4>Tri Brothers</h4>
                        <p>Owner of Roditri Mobil</p>
                        <div class="social_icon">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                        <p>Roditri Mobil lahir dari semangat dan kolaborasi tiga saudara yang memiliki kecintaan
                            mendalam terhadap dunia otomotif. Berangkat dari pengalaman pribadi dalam jual beli
                            kendaraan serta keinginan untuk menciptakan layanan yang jujur dan terpercaya, lahirlah
                            brand "Roditri Mobil", yang merupakan singkatan dari "Roda Tiga Bersaudara" atau dikenal
                            juga dengan sebutan Tri Brother.</p>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection