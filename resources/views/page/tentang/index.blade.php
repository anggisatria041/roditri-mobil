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
        <!-- Gambar di tengah -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="feature-img text-center">
                    <img class="img-fluid rounded" src="{{ asset('themes/img/blog/car-11.jpg') }}" alt="Gambar Mobil">
                </div>
            </div>
        </div>

        <!-- Konten dan Sidebar sejajar -->
        <div class="row">
            <!-- Blog Detail -->
            <div class="col-lg-8 col-md-7">
                <div class="blog_details">
                    <h2>Roditri Mobil</h2>
                    <p class="excert text-justify">
                        Roditri Mobil adalah platform jual beli mobil bekas terpercaya yang hadir untuk memudahkan
                        Anda menemukan mobil impian dengan harga yang bersahabat dan proses yang transparan. Kami
                        menghadirkan pengalaman jual beli mobil yang aman, cepat, dan tanpa ribet, baik untuk
                        pembeli maupun penjual.
                    </p>
                    <p class="text-justify">
                        Dengan tim yang berpengalaman di bidang otomotif, kami siap membantu Anda dalam setiap
                        langkah—mulai dari memilih unit mobil terbaik, inspeksi kendaraan, pengurusan dokumen,
                        hingga layanan kredit dan tukar tambah.
                    </p>
                    <p class="text-justify">
                        Kami percaya bahwa setiap orang berhak memiliki kendaraan yang nyaman dan sesuai kebutuhan,
                        tanpa harus khawatir soal kualitas maupun proses transaksi. Karena itu, setiap unit mobil
                        yang kami jual sudah melalui proses seleksi dan pemeriksaan ketat.
                    </p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img rounded-circle" src="{{ asset('themes/img/blog/author.png') }}" alt="Author">
                        <h4>Tri Brothers</h4>
                        <p>Owner of Roditri Mobil</p>
                        <div class="social_icon mb-2"></div>
                        <p class="text-justify">
                            Roditri Mobil lahir dari semangat dan kolaborasi tiga saudara yang
                            memiliki kecintaan mendalam terhadap dunia otomotif. Berangkat dari pengalaman pribadi dalam jual beli
                            kendaraan serta keinginan untuk menciptakan layanan yang jujur dan terpercaya, lahirlah
                            brand "Roditri Mobil", yang merupakan singkatan dari "Roda Tiga Bersaudara" atau dikenal
                            juga dengan sebutan Tri Brother.
                        </p>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection