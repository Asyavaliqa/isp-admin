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
        <div class="row">
        <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-secondary">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                                <div class="fs-6 fw-semibold"><i class="cil-microchip"></i>CPU 10%</div> <!-- edit lagi -->
                        </div>
                    </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:0px;"></div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-secondary">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                                <div class="fs-6 fw-semibold"><i class="cil-microchip"></i>RAM 500MB</div> <!-- edit lagi -->
                        </div>
                    </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:0px;"></div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-secondary">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                                <div class="fs-6 fw-semibold"><i class="cil-microchip"></i>Disk 10%</div> <!-- edit lagi -->
                        </div>
                    </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:0px;"></div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-secondary">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                                <div class="fs-6 fw-semibold"><i class="cil-microchip"></i>Uptime 3 days</div> <!-- edit lagi -->
                        </div>
                    </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:0px;"></div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-1 text-white bg-primary">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                                <div class="fs-1 fw-bold"><i class="cil-user"></i>10</div> <!-- edit lagi -->
                                <div class="fs-4 fw-semibold">Admin</div>
                        </div>
                    </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:10px;"></div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-info">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                                <div class="fs-1 fw-bold"><i class="cil-people"></i>100</div> <!-- edit lagi -->
                                <div class="fs-4 fw-semibold">Reseller Aktif</div>
                        </div>
                    </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:10px;"></div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-danger">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                                <div class="fs-1 fw-bold"><i class="cil-people"></i>50</div> <!-- edit lagi -->
                                <div class="fs-4 fw-semibold">Reseller Nonaktif</div>
                        </div>
                    </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:10px;"></div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-warning">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                                <div class="fs-1 fw-bold"><i class="cil-people"></i>500</div> <!-- edit lagi -->
                                <div class="fs-4 fw-semibold">Pelanggan</div>
                        </div>
                    </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:10px;"></div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header text-center fw-semibold">Daftar Reseller Dengan Pelanggan Terbanyak</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table border mb-0">
                                <thead class="table-light fw-semibold">
                                    <tr class="align-middle">
                                        <th class="text-center">
                                            <svg class="icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                                            </svg>
                                        </th>
                                        <th class="text-center">Reseller</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Jumlah Pelanggan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align-middle">
                                        <td class="text-center">
                                            <div class="avatar avatar-md"><img class="avatar-img"
                                                    src="assets/img/avatars/1.jpg" alt="user@email.com"></div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Yiorgos Avraamu</div>      {{-- edit lagi --}}
                                            <div class="small text-medium-emphasis text-center"> Aktif sejak 1 Januari 2023</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Mojogedang, Karanganyar</div>      {{-- edit lagi --}}
                                            <div class="small text-medium-emphasis text-center  "> +628999</div>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-center" >10</div>
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td class="text-center">
                                            <div class="avatar avatar-md"><img class="avatar-img"
                                                    src="assets/img/avatars/2.jpg" alt="user@email.com"></div>
                                        </td>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Yiorgos Avraamu</div>      {{-- edit lagi --}}
                                            <div class="small text-medium-emphasis text-center"> Aktif sejak 1 Januari 2023</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Mojogedang, Karanganyar</div>      {{-- edit lagi --}}
                                            <div class="small text-medium-emphasis text-center"> +628999</div>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-center" >10</div>
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td class="text-center">
                                            <div class="avatar avatar-md"><img class="avatar-img"
                                                    src="assets/img/avatars/3.jpg" alt="user@email.com"></div>
                                        </td>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Yiorgos Avraamu</div>      {{-- edit lagi --}}
                                            <div class="small text-medium-emphasis text-center"> Aktif sejak 1 Januari 2023</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Mojogedang, Karanganyar</div>      {{-- edit lagi --}}
                                            <div class="small text-medium-emphasis text-center"> +628999</div>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-center" >10</div>
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td class="text-center">
                                            <div class="avatar avatar-md"><img class="avatar-img"
                                                    src="assets/img/avatars/4.jpg" alt="user@email.com"></div>
                                        </td>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Yiorgos Avraamu</div>      {{-- edit lagi --}}
                                            <div class="small text-medium-emphasis text-center"> Aktif sejak 1 Januari 2023</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Mojogedang, Karanganyar</div>      {{-- edit lagi --}}
                                            <div class="small text-medium-emphasis text-center"> +628999</div>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-center" >10</div>
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td class="text-center">
                                            <div class="avatar avatar-md"><img class="avatar-img"
                                                    src="assets/img/avatars/5.jpg" alt="user@email.com"></div>
                                        </td>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Yiorgos Avraamu</div>      {{-- edit lagi --}}
                                            <div class="small text-medium-emphasis text-center"> Aktif sejak 1 Januari 2023</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Mojogedang, Karanganyar</div>      {{-- edit lagi --}}
                                            <div class="small text-medium-emphasis text-center"> +628999</div>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-center" >10</div>
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td class="text-center">
                                            <div class="avatar avatar-md"><img class="avatar-img"
                                                    src="assets/img/avatars/6.jpg" alt="user@email.com"></div>
                                        </td>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Yiorgos Avraamu</div>      {{-- edit lagi --}}
                                            <div class="small text-medium-emphasis text-center"> Aktif sejak 1 Januari 2023</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-center">Mojogedang, Karanganyar</div>      {{-- edit lagi --}}
                                            <div class="small text-medium-emphasis text-center"> +628999</div>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-center" >10</div>
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
