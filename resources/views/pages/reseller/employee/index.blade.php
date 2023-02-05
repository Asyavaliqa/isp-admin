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
                        <a href="" class="btn btn-primary btn-outline">Tambah Karyawan</a>
                    </div>
                </div>
                <div class="table-responsive px-3">
                    <table class="table table-hover align-middle custom-table">
                        <thead>
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Role</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Alamat</th>
                              <th scope="col">Divisi</th> {{-- hanya catatan, bisa di hapus jika tidak diperlukan--}}
                            </tr>
                          </thead>
                          <tbody class="table-group-divider">
                            <td>
                                <div class="">1</div>      {{-- edit lagi --}}
                            </td>
                            <td>
                                <div class="">Admin</div>      {{-- edit lagi --}}
                            </td>
                            <td>
                                <div class="">Agus Setyo</div>      {{-- edit lagi --}}
                            </td>
                            <td>
                                <div class="">Mojogedang, Karanganyar</div>      {{-- edit lagi --}}
                            </td>
                            <td>
                                <div class="">Admin Keuangan</div>      {{-- edit lagi --}}
                            </td>
                          <tr>
                            <td>
                                <div class="">2</div>      {{-- edit lagi --}}
                            </td>
                            <td>
                                <div class="">Teknisi</div>      {{-- edit lagi --}}
                            </td>
                            <td>
                                <div class="">Bambang</div>      {{-- edit lagi --}}
                            </td>
                            <td>
                                <div class="">Palur, Karanganyar</div>      {{-- edit lagi --}}
                            </td>
                            <td>
                                <div class="">Teknisi Pemasangan</div>      {{-- edit lagi --}}
                            </td>
                            </tr>
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
