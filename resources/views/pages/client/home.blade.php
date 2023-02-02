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

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.1.2/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/chartjs@3.0.0/dist/js/coreui-chartjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/utils@1.3.1/dist/coreui-utils.js"></script>
    <script src="js/main.js"></script>
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
                            <div class="fs-6 fw-semibold text-primary">Paket Small (10Mb)</div>
                            <div class="text-medium-emphasis text-uppercase fw-semibold small">Paket</div>
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
                            <div class="fs-6 fw-semibold text-primary">Rp 200.000</div>
                            <div class="text-medium-emphasis text-uppercase fw-semibold small">Tagihan</div>
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
                            <div class="fs-6 fw-semibold text-primary">Lunas</div>
                            <div class="text-medium-emphasis text-uppercase fw-semibold small">Pembayaran Bulan Ini</div>
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
                            <div class="fs-6 fw-semibold text-primary">Buana Data Media</div>
                            <div class="text-medium-emphasis text-uppercase fw-semibold small">RESELLER</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header text-center fw-semibold">Daftar Transaksi</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table border mb-0">
                                <thead class="table-light fw-semibold">
                                    <tr class="align-middle">
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nomor invoice</th>
                                        <th class="text-center">Paket</th>
                                        <th class="text-center">Tagihan</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Status Konfirmasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align-middle">
                                        <td>
                                            <div class="fw-semibold text-center">1</div>      {{-- edit lagi --}}
                                        </td>
                                        <td>
                                            <div class="fw-bold text-center">INV/000</div>      {{-- edit lagi --}}
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Paket Small (10Mb)</div>      {{-- edit lagi --}}
                                        </td>
                                        <td>
                                            <div class="fw-bold text-center" >Rp 200.000</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center" >Senin, 02 januari 2023</div>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-center" >Dikonfirmasi</div>
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td>
                                            <div class="fw-semibold text-center">2</div>      {{-- edit lagi --}}
                                        </td>
                                        <td>
                                            <div class="fw-bold text-center">INV/001</div>      {{-- edit lagi --}}
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Paket Small (10Mb)</div>      {{-- edit lagi --}}
                                        </td>
                                        <td>
                                            <div class="fw-bold text-center" >Rp 200.000</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center" >Rabu, 02 Februari 2023</div>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-center" >Dikonfirmasi</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
    </div>
@endsection
