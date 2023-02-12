@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title ?? 'Pelanggan' }}
@endsection

@section('content')
    <div class="container-lg">
        <div class="row g-0">
            <div class="card">
                <div class="card-header">
                    <strong>Pelanggan</strong>
                </div>
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="px-3">
                            <input type="text" class="form-control" placeholder="Search ..">
                        </div>
                        <div class="px-3">
                        <a href="{{ route('business.clientMenu.create') }}" class="btn btn-primary btn-outline">Tambah Pelanggan</a>
                    </div>
                    </div>
                    <div class="table-responsive px-3">
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('status') }}
                            <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <table class="table table-hover align-middle custom-table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">No.Telp</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">PPN</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($clients as $client)

                                <tr>
                                    <th>
                                        <a href="{{ route('business.clientMenu.detail', ['id' => $client->id]) }}">
                                            <img alt="{{ $client->user->fullname }}" src="{{ asset($client->user->photo ?? 'assets/brand/GMDP_100x100.png') }}" class="img-thumbnail rounded-circle" style="width: 60px">
                                            <span class="ms-2">{{ $client->user->fullname }}</span>
                                        </a>
                                    </th>
                                    <td>
                                        <a href="{{ route('business.planMenu.detail', ['id' => $client->plan->id]) }}">
                                            {{ $client->plan->name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $client->user->phone_number }}
                                    </td>
                                    <td>
                                        {{ $client->user->address }}
                                    </td>
                                    <td class="text-center">
                                        @if ($client->is_ppn)
                                        <span class="badge rounded-pill bg-primary">Ya</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">Tidak</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $clients->links('components.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
