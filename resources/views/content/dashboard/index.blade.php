@extends('layouts.main')
@section('toolbar')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center me-3 flex-wrap lh-1">
            <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">Dashboard</h1>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-gray-900">Index</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-5 gx-xl-10">
                <div class="page-heading">
                </div>
                <div class="col-xxl-12 mb-md-5 mb-xl-10">
                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-3">
                            <a href="{{ route('produk.index') }}" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                                <div class="card-body">
                                    <i class="ki-outline ki-chart-simple text-primary fs-2x ms-n1"></i>
                                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">Total: {{ $produk }}</div>
                                    <div class="fw-semibold text-gray-400">Jumlah Produk</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3">
                            <a href="{{ route('pemesanan.index') }}" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                                <div class="card-body">
                                    <i class="ki-outline ki-cheque text-gray-100 fs-2x ms-n1"></i>
                                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">Total: {{ $pesanan }}</div>
                                    <div class="fw-semibold text-gray-100">Jumlah Pemesanan</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3">
                            <a href="{{ route('pemesanan.index') }}"
                                class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                                <div class="card-body">
                                    <i class="ki-outline ki-briefcase text-white fs-2x ms-n1"></i>
                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Total: {{ $pesanan_kredit }}</div>
                                    <div class="fw-semibold text-white">Jumlah Pemesanan Kredit</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3">
                            <a href="{{ route('pemesanan.index') }}"
                                class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                                <div class="card-body">
                                    <i class="ki-outline ki-chart-pie-simple text-white fs-2x ms-n1"></i>
                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Total: {{ $pesanan_tunai }}</div>
                                    <div class="fw-semibold text-white">Jumlah Pemesanan Tunai</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card card-flush h-xl-100">
                    <div class="card-header pt-7">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Grafik Penjualan</span>
                            <span class="text-gray-500 mt-1 fw-semibold fs-6">Per Bulan</span>
                        </h3>
                    </div>
                    <div class="card-body d-flex align-items-end px-0 pt-3 pb-5">
                        <div id="grafik_penjualan" class="h-325px w-100 min-h-auto ps-4 pe-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            initChart({});
        });
        var initChart = function(chart) {
            var element = document.getElementById("grafik_penjualan");

            if (!element) {
                return;
            }

            var height = parseInt(KTUtil.css(element, 'height'));
            var labelColor = KTUtil.getCssVariableValue('--bs-gray-900');
            var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');

            var options = {
                series: [{
                    name: 'Jumlah',
                    data: <?= json_encode($jumlah) ?>,
                }],
                chart: {
                    fontFamily: 'inherit',
                    type: 'bar',
                    height: height,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: ['28%'],
                        borderRadius: 5,
                        dataLabels: {
                            position: "top"
                        },
                        startingShape: 'flat'
                    },
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: true,
                    offsetY: -28,
                    style: {
                        fontSize: '13px',
                        colors: [labelColor]
                    },
                    formatter: function(val) {
                        return val; // + "H";
                    }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: <?= json_encode($bulan) ?>,
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: KTUtil.getCssVariableValue('--bs-gray-500'),
                            fontSize: '13px'
                        }
                    },
                    crosshairs: {
                        fill: {
                            gradient: {
                                opacityFrom: 0,
                                opacityTo: 0
                            }
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: KTUtil.getCssVariableValue('--bs-gray-500'),
                            fontSize: '13px'
                        },
                        formatter: function(val) {
                            return val + "H";
                        }
                    }
                },
                fill: {
                    opacity: 1
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px'
                    },
                    y: {
                        formatter: function(val) {
                            return +val + ' unit'
                        }
                    }
                },
                colors: [KTUtil.getCssVariableValue('--bs-primary'), KTUtil.getCssVariableValue(
                    '--bs-primary-light')],
                grid: {
                    borderColor: borderColor,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                }
            };

            chart.self = new ApexCharts(element, options);

            setTimeout(function() {
                chart.self.render();
                chart.rendered = true;
            }, 200);
        }
    </script>
@endsection
