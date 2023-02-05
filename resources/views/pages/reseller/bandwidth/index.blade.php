@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title ?? 'Paket' }}
@endsection

@section('content')
<div class="container-lg">
    <div class="row g-0">
        <div class="card">
            <div class="card-header">
                <strong>Paket</strong>
            </div>
            <div class="card-body py-4">
                <div class="d-flex justify-content-between mb-3">
                    <div class="px-3">
                        <input type="text" class="form-control" placeholder="Search ..">
                    </div>
                    <div class="px-3">
                        <a href="" class="btn btn-primary btn-outline">Tambah Paket</a>
                    </div>
                </div>
                <div class="table-responsive px-3">
                    <table class="table table-hover align-middle custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                              <th scope="col">Nama Paket</th>
                              <th scope="col">Bandwidth</th>
                              <th scope="col">Harga</th>
                            </tr>
                          </thead>
                          <tbody class="table-group-divider">
                            @foreach ($bandwidths as $bandwidth)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $bandwidth->name }}</td>
                                    <td>{{ $bandwidth->bandwidth }} Mbps</td>
                                    <td>Rp{{ number_format($bandwidth->price, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>

                    {{ $bandwidths->links('components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
