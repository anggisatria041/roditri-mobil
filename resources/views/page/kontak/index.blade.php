@extends('page.main')
@section('content')

<style>
    /* Styling biar contact section lo makin pro */
    :root {
        --primary-color: #007bff;
        /* Ganti warna ini sesuai branding lo */

        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        --text-color: #333;
        --text-muted: #6c757d;
    }

    .contact-card {
        background: var(--card-bg);
        padding: 30px;
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .contact-title {
        font-weight: 700;
        color: var(--text-color);
        position: relative;
        padding-bottom: 10px;
    }

    .contact-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: var(--primary-color);
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 25px;
    }

    .contact-item:last-child {
        margin-bottom: 0;
    }

    .icon-wrapper {
        flex-shrink: 0;
        width: 50px;
        height: 50px;
        background: var(--primary-color);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-right: 20px;
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }

    .info-text strong {
        display: block;
        font-size: 16px;
        color: var(--text-color);
        margin-bottom: 2px;
    }

    .info-text p {
        margin-bottom: 0;
        color: var(--text-muted);
        font-size: 15px;
    }

    .info-text a {
        color: var(--primary-color);
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .info-text a:hover {
        text-decoration: underline;
    }

    .mapBox {
        box-shadow: var(--card-shadow);
        border-radius: 15px;
        overflow: hidden;
        /* Biar iframe ngikutin border-radius */
    }
</style>
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
        <div class="row d-flex flex-lg-row justify-content-between align-items-stretch">

            <div class="col-lg-5 col-xl-4 mb-4 mb-lg-0">
                <div class="contact-card h-100">
                    <div class="contact_info">
                        <div class="contact-item">
                            <div class="icon-wrapper">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="info-text">
                                <strong>Alamat</strong>
                                <p>Jalan Arifin Ahmad Sidomulyo Tim.,<br>Kec. Marpoyan Damai, Kota Pekanbaru, Riau</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="icon-wrapper">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="info-text">
                                <strong>Telepon</strong>
                                <p><a href="tel:+6281383435007">+62 813-8343-5007</a></p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="icon-wrapper">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="info-text">
                                <strong>Email</strong>
                                <p><a href="mailto:RoditriMobil@gmail.com">RoditriMobil@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-xl-8">
                <div class="mapBox h-100">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.658273415943!2d101.43944987496469!3d0.4939217995166418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a9954d38559d%3A0x335c414434b8d65!2sJl.+Arifin+Ahmad%2C+Sidomulyo+Tim.%2C+Kec.+Marpoyan+Damai%2C+Kota+Pekanbaru%2C+Riau!5e0!3m2!1sen!2sid!4v1690000000000"
                        width="100%"
                        height="100%"
                        style="border:0; border-radius: 15px; min-height: 450px;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection