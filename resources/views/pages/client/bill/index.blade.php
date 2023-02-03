@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title ?? 'Transaksi' }}
@endsection

@section('content')
<div class="container-lg">
    <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header fw-semibold">Daftar Transaksi</div>
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
</div>
@endsection
