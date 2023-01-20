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
                </div>
                <div class="table-responsive px-3">
                    <table class="table table-hover align-middle custom-table">
                        <thead>
                            <tr>
                              <th scope="col">Nama Pelanggan</th>
                              <th scope="col">Reseller</th>
                              <th scope="col">No.Telp</th>
                              <th scope="col">Status PPN</th>
                              <th scope="col">Paket </th>
                            </tr>
                          </thead>
                          <tbody class="table-group-divider">
                           @foreach ($clients as $client)
                               <tr>
                                    <th>
                                        <a href="">
                                            <img alt="{{ $client->user->fullname }}" src="{{ asset($client->user->photo ?? 'assets/brand/GMDP_100x100.png') }}" class="img-thumbnail rounded-circle" style="width: 60px">
                                            <span class="ms-2">{{ $client->user->fullname }}</span>
                                        </a>
                                    </th>
                                    <td>
                                        <a href="">
                                            {{ $client->reseller->name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $client->user->phone_number }}
                                    </td>
                                    <td>
                                        @if ($client->is_ppn)
                                        <span class="badge rounded-pill bg-primary">Ya</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">Tidak</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $client->bandwidth->name }}
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
