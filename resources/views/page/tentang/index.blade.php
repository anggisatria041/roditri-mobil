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
                <img class="img-fluid rounded" src="{{ asset('themes/img/blog/lokasi.jpg') }}" alt="Gambar Mobil">
                </div>
            </div>
        </div>

        <!-- Konten dan Sidebar sejajar -->
        <div class="row">
            <!-- Blog Detail -->
            <div class="col-lg-8 col-md-7">
                <div class="blog_details">
                    <h2>Kenapa Roditri Mobil?</h2>
                    <p class="excert text-justify">
                    Roditri Mobil adalah platform jual beli mobil bekas terpercaya yang hadir sebagai solusi cerdas bagi Anda yang ingin melakukan transaksi kendaraan dengan aman, nyaman, dan efisien. Kami memahami bahwa membeli maupun menjual mobil merupakan keputusan besar yang memerlukan pertimbangan matang, oleh karena itu kami menghadirkan sistem yang transparan, proses yang mudah dipahami, serta layanan pelanggan yang responsif dan siap membantu kapan saja.
                    Dengan berbagai pilihan mobil bekas berkualitas yang telah melalui proses seleksi dan pengecekan kondisi secara menyeluruh, Roditri Mobil memastikan setiap kendaraan yang kami tampilkan layak jalan dan memiliki kelengkapan dokumen yang sah. Harga yang ditawarkan juga kompetitif dan bersahabat, sehingga dapat disesuaikan dengan kebutuhan dan anggaran Anda.
                    </p>
                    <p class="text-justify">
                    Kami paham bahwa membeli atau menjual mobil bukan hal sepele. Karena itu, kami berusaha memberikan pengalaman terbaik, baik bagi pembeli yang ingin mendapatkan mobil berkualitas, maupun bagi penjual yang ingin menjual mobilnya dengan cepat dan aman. Di Roditri Mobil, Anda akan dibantu oleh tim yang siap memberikan informasi secara jelas dan jujur, serta mendampingi proses jual beli dari awal hingga selesai.
                    Melalui pendekatan yang ramah, informatif, dan profesional, kami ingin memastikan bahwa setiap pelanggan merasa nyaman dan yakin dalam mengambil keputusan. Baik Anda sebagai pembeli yang sedang mencari kendaraan terbaik, maupun sebagai penjual yang ingin melepas mobil dengan harga wajar, kami hadir sebagai mitra yang dapat diandalkan.
                    </p>
                    <p class="text-justify">
                    Dengan layanan yang cepat, terbuka, dan bebas dari kerumitan, Roditri Mobil berkomitmen untuk menjadi pilihan utama bagi siapa pun yang ingin melakukan transaksi jual beli mobil bekas dengan cara yang lebih praktis dan dapat dipercaya. Kami percaya bahwa proses jual beli mobil tidak harus rumit atau membingungkan. Karena itu, kami menghadirkan sistem yang memudahkan Anda dalam setiap tahap—mulai dari pencarian unit, pengecekan kondisi mobil, konsultasi harga, hingga pengurusan dokumen dan proses pembayaran.
                    Roditri Mobil bukan hanya sekadar platform jual beli, tapi juga solusi otomotif yang memahami kebutuhan Anda. Kami ingin menjadi jembatan antara kebutuhan dan kenyamanan, antara mobil impian dan kemudahan transaksi. Dengan kami, proses jual beli mobil jadi lebih sederhana, transparan, dan menyenangkan.


                    </p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img rounded-circle" src="{{ asset('themes/img/blog/owner.png') }}" alt="Author">
                        <h4>Ananda Yudika</h4>
                        <p>Owner of Roditri Mobil</p>
                        <div class="social_icon mb-2"></div>
                        <p class="text-justify">
                        Ananda Yudika adalah pendiri sekaligus pemilik dari Roditri Mobil, sebuah platform jual beli mobil bekas yang dibangun atas dasar kecintaan mendalam terhadap dunia otomotif. Bersama dua saudaranya, ia memulai bisnis ini dengan semangat kolaborasi dan visi untuk menghadirkan layanan yang jujur, aman, dan dapat dipercaya oleh masyarakat.

Pilihan Ananda untuk terjun ke dunia bisnis otomotif tidak muncul begitu saja. Ia berangkat dari pengalaman pribadinya dalam proses jual beli kendaraan, yang kemudian membuka matanya terhadap berbagai tantangan dan kebutuhan pelanggan di lapangan. Dari situlah lahir ide untuk menciptakan sebuah layanan yang bukan hanya mengutamakan keuntungan, tetapi juga transparansi dan kenyamanan dalam setiap transaksi.

Nama Roditri Mobil sendiri merupakan singkatan dari "Roda Tiga Bersaudara", yang menggambarkan kekuatan persaudaraan sebagai fondasi utama dalam membangun bisnis ini. Selain itu, mereka juga dikenal dengan sebutan Tri Brother, simbol kekompakan dan kerja sama yang menjadi roh di balik perjalanan Roditri Mobil hingga saat ini.
                           
                        </p>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection