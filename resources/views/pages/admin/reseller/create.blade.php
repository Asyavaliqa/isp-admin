@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title ?? 'Tambah Reseller' }}
@endsection

@section('content')
<div class="container-lg">
    <div class="row g-0">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Reseller</strong>
            </div>
            <div class="card-body py-4">
                <form action="" method="post" class="row g-3">
                    <div class="col-md-12">
                        <label for="fullname" class="form-label">Nama Instansi</label>
                        <input type="text" class="form-control" name="fullname" id="fullname">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="phoneNumber">Nomor Telepon</label>
                        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="address" class="form-label">Alamat Lengkap</label>
                        <textarea name="address" id="address" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="contractStartDate" class="form-label">Tanggal Mulai Kontrak</label>
                        <input type="date" name="contractStartDate" id="contractStartDate" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="contractEndDate" class="form-label">Tanggal Berakhir Kontrak</label>
                        <input type="date" name="contractEndDate" id="contractEndDate" class="form-control">
                    </div>
                    <div class="col-md-6 align-middle">
                        <div class="align-middle">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="mb-2 d-block">Pratinjau Gambar</span>
                        <img style="width: 40%" class="" src="{{ asset('assets/img/logos/1.jpg') }}" class="img-fluid img-thumbnail" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
