@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title }}
@endsection

@section('content')
{{-- TODO: Data masih mengambil dari data master --}}
<div class="container-lg">
    <div class="row g-0 mb-4">
        <div class="card mb-4">
            <div class="card-header">
                <strong>Detail Transaksi</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th scope="col">Nomor Invoice</th>
                            <td scope="col">:</td>
                            <td scope="col">{{ $transaction->invoice_id }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Tanggal Pembayaran</th>
                            <td scope="col">:</td>
                            <td scope="col">{{ $transaction->created_at->isoFormat('dddd, D MMMM g') }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Nama Pelanggan</th>
                            <td scope="col">:</td>
                            <td scope="col">{{ $transaction->client->user->fullname ?? $transaction->client_name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Paket</th>
                            <td scope="col">:</td>
                            <td scope="col">{{ $transaction->plan->name ?? $transaction->plan_name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Jumlah Bayar</th>
                            <td scope="col">:</td>
                            <td scope="col">Rp{{ number_format($transaction->balance, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Bukti Pembayaran</th>
                            <td scope="col">:</td>
                            <td scope="col">
                                <button type="button" class="btn btn-sm btn-primary" data-coreui-toggle="modal" data-coreui-target="#billPhoto">
                                    Tampilkan Bukti Bayar
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <strong>Paket</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th scope="col">Nama Paket</th>
                            <td scope="col">:</td>
                            <td scope="col">{{ $transaction->plan->name ?? $transaction->plan_name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Bandwidth</th>
                            <td scope="col">:</td>
                            <td scope="col">
                                <span class="badge rounded-pill bg-primary">
                                    {{ $transaction->plan->bandwidth }} Mbps
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Harga</th>
                            <td scope="col">:</td>
                            <td scope="col">Rp{{ number_format($transaction->balance, 2, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <strong>Pelanggan</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th scope="col">Nama</th>
                                <td scope="col">:</td>
                                <td scope="col">{{ $transaction->client->user->fullname }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Alamat</th>
                                <td scope="col">:</td>
                                <td scope="col">{{ $transaction->client->user->address }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Nomor Telepon</th>
                                <td scope="col">:</td>
                                <td scope="col">{{ $transaction->client->user->phone_number }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="billPhoto" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="billPhotoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="billPhotoLabel">Bukti Pembayaran</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img src="{{ asset($transaction->bill_photo ?? 'assets/img/bills/belum-bayar.webp') }}" alt="{{ $transaction->invoice_id }}" class="img-thumbnail img-fluid mx-auto d-block">
        </div>
        <div class="modal-footer">
            {{-- TODO Buat Aksi untuk konfirmasi transaksi --}}
            <button type="button" class="btn btn-primary">Konfirmasi</button>
            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection
