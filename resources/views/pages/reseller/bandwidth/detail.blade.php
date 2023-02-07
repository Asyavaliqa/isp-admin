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
                    @if (session('status'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Galat!</strong> {{ session('status') }}
                            <button type="button" class="btn-close" data-coreui-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
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
                                <th scope="col">Pengguna</th>
                                <td>:</td>
                                <td>
                                    <span class="badge rounded-pill bg-success">
                                        {{ $bandwidth->clients_count }} Pengguna
                                    </span>
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
                    <a class="btn btn-info text-white"
                        href="{{ route('reseller_owner.bandwidth.edit', ['id' => $bandwidth->id]) }}">
                        Ubah Paket
                    </a>
                    <button type="button" class="btn btn-danger text-white" data-coreui-toggle="modal"
                        data-coreui-target="#deleteModal">
                        Hapus Paket
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus "{{ $bandwidth->name }}" ?</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin untuk menghapus data "{{ $bandwidth->name }}" ?
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-success text-white" data-coreui-dismiss="modal">TIDAK</button>
                    <a href="{{ route('reseller_owner.bandwidth.delete', ['id' => $bandwidth->id]) }}" class="btn btn-danger text-white">YA</a>
                </div>
            </div>
        </div>
    </div>
@endsection
