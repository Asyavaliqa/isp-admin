@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title ?? 'Paket' }}
@endsection

@section('content')
    <div class="container-lg">
        <div class="row g-0 mb-4">
            <div class="card">
                <div class="card-header">
                    <strong>Detail Paket: {{ $bandwidth->name }}</strong>
                </div>
                <div class="card-body py-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th scope="col">Nama</th>
                                <td scope="col">:</td>
                                <td scope="col">{{ $bandwidth->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Bandwidth</th>
                                <td>:</td>
                                <td>
                                    <span class="badge rounded-pill bg-primary">{{ $bandwidth->bandwidth }} Mbps</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Deskripsi</th>
                                <td>:</td>
                                <td>{{ $bandwidth->description ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Terakhir diubah</th>
                                <td>:</td>
                                <td>{{ $bandwidth->updated_at->isoFormat('dddd, D MMMM g HH:mm:ss') }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Dibuat pada</th>
                                <td>:</td>
                                <td>{{ $bandwidth->updated_at->isoFormat('dddd, D MMMM g HH:mm:ss') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                        <a class="btn btn-info text-white" href="{{ route('reseller_owner.bandwidth.edit', ['id' => $bandwidth->id]) }}">
                            Ubah Paket
                        </a>
                        <a class="btn btn-danger text-white">
                            Hapus Paket
                        </a>
                </div>
            </div>
        </div>
    </div>
@endsection
