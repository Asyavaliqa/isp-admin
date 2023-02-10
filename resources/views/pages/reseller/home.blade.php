@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title ?? 'Dasboard' }}
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/free.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/brand.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/flag.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/chartjs@3.0.0/dist/css/coreui-chartjs.min.css">
@endsection

@section('content')
    <div class="container-lg">
        <div class="row mb-4">
            <div class="col-sm-6 col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body p-0 d-flex align-items-center">
                        <div class="bg-primary text-white py-4 px-4 me-3">
                            <i class="icon icon-xl cil-people"></i>
                        </div>
                        <div>
                            <div class="fs-6 fw-semibold text-primary">{{ $widget['totalClient'] }}</div>
                            <div class="text-medium-emphasis text-uppercase fw-semibold small">Pelanggan</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body p-0 d-flex align-items-center">
                        <div class="bg-primary text-white py-4 px-4 me-3">
                            <i class="icon icon-xl cil-people"></i>
                        </div>
                        <div>
                            <div class="fs-6 fw-semibold text-primary">{{ $widget['totalEmployee'] }}</div>
                            <div class="text-medium-emphasis text-uppercase fw-semibold small">Pegawai</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body p-0 d-flex align-items-center">
                        <div class="bg-primary text-white py-4 px-4 me-3">
                            <i class="icon icon-xl cil-people"></i>
                        </div>
                        <div>
                            <div class="fs-6 fw-semibold text-primary">{{ $widget['unpayedBill'] }}</div>
                            <div class="text-medium-emphasis text-uppercase fw-semibold small">pelanggan belum bayar</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body p-0 d-flex align-items-center">
                        <div class="bg-primary text-white py-4 px-4 me-3">
                            <i class="icon icon-xl cil-people"></i>
                        </div>
                        <div>
                            <div class="fs-6 fw-semibold text-primary">Rp{{ number_format($widget['totalEarning'], 2, ',', '.') }}</div>
                            <div class="text-medium-emphasis text-uppercase fw-semibold small">Penghasilan</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <canvas id="earningChart" aria-label="Grafik Penghasilan Perbulan" role="img">
                            Your browser does not support the canvas element
                        </canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <canvas id="clientChart" aria-label="Grafik Pelanggan" role="img">
                            Your browser does not support the canvas element
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
    <script>
        const clientCtx = document.getElementById('clientChart');
        const earningCtx = document.getElementById('earningChart')

        new Chart(clientCtx, {
            type: 'line',
            data: {
                labels: {{ Js::from($client['labels']) }},
                datasets: [{
                    label: 'Pelanggan Aktif',
                    data: {{ Js::from($client['data']) }},
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        new Chart(earningCtx, {
            type: 'line',
            data: {
                labels: {{ Js::from($earning['labels']) }},
                datasets: [{
                    label: 'Penghasilan Perbulan',
                    data: {{ Js::from($earning['data']) }},
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
@endsection
