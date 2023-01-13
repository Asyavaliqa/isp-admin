@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title ?? 'Reseller' }}
@endsection

@section('content')
<div class="container-lg">
    <div class="row g-0">
        <div class="card">
            <div class="card-header">
                <strong>Reseller</strong>
            </div>
            <div class="card-body py-4">
                <div class="d-flex justify-content-between mb-3">
                    <div class="px-3">
                        <input type="text" class="form-control" placeholder="Search ..">
                    </div>
                    <div class="px-3">
                        <a href="" class="btn btn-primary btn-outline">New Reseller</a>
                    </div>
                </div>
                <div class="table-responsive px-3">
                    <table class="table table-hover align-middle custom-table">
                        <thead>
                            <tr>
                              <th scope="col">Instansi</th>
                              <th scope="col">Pemilik</th>
                              <th scope="col">Jumlah Pelanggan</th>
                              <th scope="col">Status</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody class="table-group-divider">
                            @foreach ($resellers as $reseller)
                                <tr>
                                    <th>
                                        <a href="{{ route('admin.reseller.detail', ['id' => $reseller->id]) }}">
                                            <img alt="{{ $reseller->name }}" src="{{ asset($reseller->photo ?? 'assets/brand/GMDP_100x100.png') }}" class="img-thumbnail rounded-circle" style="width: 60px">
                                            <span class="ms-2">{{ $reseller->name }}</span>
                                        </a>
                                    </th>
                                    <td>
                                        <a href="{{ route('admin.user', ['id' => $reseller->user->id]) }}">
                                            {{ $reseller->user->fullname }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill bg-primary">{{ $reseller->users_count }} Pelanggan</span>
                                    </td>
                                    <td>
                                        @if ($reseller->inactive_at)
                                            <span class="badge rounded-pill bg-danger">Non-aktif</span>
                                        @else
                                            <span class="badge rounded-pill bg-success">Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" @checked(!$reseller->inactive_at)>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>

                    {{ $resellers->links('components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
