@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title ?? 'Paket' }}
@endsection

@section('content')
    <div class="container-lg">
        <div class="row g-0 mb-4">
            <div class="card">
                <div class="card-header">
                    <strong>Paket Internet</strong>
                </div>
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="px-3">
                            <input type="text" class="form-control" placeholder="Search ..">
                        </div>
                        <div class="px-3">
                            <a href="{{ route('business.planMenu.create') }}"
                                class="btn btn-primary btn-outline">Tambah Paket</a>
                        </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('status') }}
                            <button type="button" class="btn-close" data-coreui-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive px-3">
                        <table class="table table-hover align-middle custom-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col" class="text-center">Bandwidth</th>
                                    <th scope="col" class="text-center">Jumlah Pengguna</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Pajak PPN</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($plans as $plan)
                                    <tr>
                                        <th scope="col">{{ $loop->iteration }}</th>
                                        <td scope="col">
                                            <a
                                                href="{{ route('business.planMenu.detail', ['id' => $plan->id]) }}">{{ $plan->name }}</a>
                                        </td>
                                        <td scope="col" class="text-center">
                                            <span class="badge badge-pills bg-info">
                                                {{ $plan->bandwidth }} Mbps
                                            </span>
                                        </td>
                                        <td scope="col" class="text-center">
                                            <span class="badge badge-pills bg-primary">
                                                {{ $plan->clients_count }} Pengguna
                                            </span>
                                        </td>
                                        <td scope="col">Rp{{ number_format($plan->price, 2, ',', '.') }}</td>
                                        <td>
                                            @if ($plan->tax_type === App\Models\Plan::TAX_INCLUDED)
                                                <span class="badge badge-pills bg-success">Sudah Termasuk</span>
                                            @else
                                                <span class="badge badge-pills bg-danger">Belum Termasuk</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $plans->links('components.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
