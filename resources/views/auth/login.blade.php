<!DOCTYPE html>
<html lang="en">

<head>
    <title>Roditri - Mobil</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Tailwind CSS & Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="tailwind, tailwindcss, metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="http://preview.keenthemes.comindex.html" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script></script>
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body id="kt_body" class="auth-bg">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" novalidate="novalidate" action="{{ route('postlogin') }}"
                            method="POST">
                            @csrf
                            <!-- <div class="row g-3 mb-9">
                                <div class="col-md-6">
                                    <a href="{{ route('home') }}" class="btn text-white"
                                        style="background-color: #D84040">
                                        <span class="indicator-label">Back Home</span>
                                    </a>
                                </div>
                            </div> -->
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Masuk</h1>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-info">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger mt-3" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                            <div class="fv-row mb-4">
                                <label class="form-label fw-semibold text-dark">Username</label>
                                <input type="text" name="username" autocomplete="off"
                                    class="form-control form-control-lg bg-white border rounded required" placeholder="Masukkan username" required />
                            </div>

                            <div class="fv-row mb-4">
                                <label class="form-label fw-semibold text-dark">Password</label>
                                <input type="password" name="password" autocomplete="off"
                                    class="form-control form-control-lg bg-white border rounded required" placeholder="Masukkan password" required />
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn text-white" style="background-color: #D84040">
                                    <span class="indicator-label">Masuk</span>
                            </div>
                            <div class="d-flex justify-content-between text-gray-500 fw-semibold fs-6">
                                <span>Kembali ke
                                    <a href="{{ route('home') }}" style="color:#D84040">Home</a>
                                </span>
                                <span>Belum punya akun?
                                    <a href="{{ url('register') }}" style="color:#D84040">Daftar</a>
                                </span>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url(assets/media/misc/auth-bg2.png)">
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <img class="d-none d-lg-block mx-auto w-265px w-md-40 w-xl-400px mb-8 mb-lg-20 animate__animated animate__fadeInRight"
                        style="--animate-duration: 1.5s; --animate-delay: 0.5s;"
                        src="{{ asset('assets/media/misc/logo-roditri.png') }}" alt="" />
                    <h1 class="d-none d-lg-block text-black fs-1qx fw-bolder text-center mb-7 ">Cepat, Nyaman, dan
                        Terpercaya</h1>
                    <div class="d-none d-lg-block text-black fs-qx text-center">Temukan kemudahan perjalanan Anda
                        bersama,
                        <a href="" class="opacity-75-hover text-warning fw-bold me-1">Roditri Mobil
                            Mobil</a>pilihan terbaik untuk kenyamanan dan efisiensi.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
</body>

</html>