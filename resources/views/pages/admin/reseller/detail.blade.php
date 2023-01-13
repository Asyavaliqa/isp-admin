@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title }}
@endsection

@section('content')
<div class="container-lg">
    <div class="row g-0">
        <div class="card">
            <div class="card-header">
                <strong>Informasi Usaha</strong>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-thumbnail mx-auto d-block img-fluid" src="{{ asset($reseller->photo ?? 'assets/brand/GMDP_100x100.png') }}" alt="{{ $reseller->name }}" />
                        </div>
                        <div class="col-md-8">
                            <table class="table table-hover">
                                <tr>
                                    <td scope="col">Nama Instansi</td>
                                    <td>{{ $reseller->name }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Alamat Instansi</td>
                                    <td>{{ $reseller->address }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Alamat Email</td>
                                    <td>{{ $reseller->email }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Nomor Telepon</td>
                                    <td>{{ $reseller->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Kontrak</td>
                                    <td>
                                        <div>{{ $reseller->contract_start_at->isoFormat('dddd, D MMMM g') }} - {{ $reseller->contract_end_at->isoFormat('dddd, D MMMM g') }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Durasi Kontrak</td>
                                    <td>
                                        <span class="badge rounded-pill bg-info">{{ $reseller->contract_start_at->diffInMonths($reseller->contract_end_at) }} Bulan</span>
                                   </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if ($reseller->inactive_at)
                                            <span class="badge rounded-pill bg-danger">Non-aktif</span>
                                        @else
                                            <span class="badge rounded-pill bg-success">Aktif</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Terdaftar sejak</td>
                                    <td>{{ $reseller->created_at->isoFormat('dddd, D MMMM g') }}</td>
                                </tr>
                                <tr>
                                    <td>Pemilik</td>
                                    <td><a href="{{ route('admin.user', ['id' => $reseller->user->id]) }}">{{ $reseller->user->fullname }}</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
