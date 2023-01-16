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
                <form action="" method="post" class="px-4" autocomplete="off">
                    <fieldset class="border row p-3 mb-4 rounded-2">
                        <legend class="float-none w-auto px-4">Informasi Instansi</legend>
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Nama Instansi</label>
                            <input type="text" class="form-control" name="name" id="name" autocomplete="false" required aria-required="true" autofocus>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="email">Email Instansi</label>
                            <input type="email" name="email" id="email" class="form-control" required aria-required="true">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="phoneNumber">Nomor Telepon Instansi</label>
                            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="address" class="form-label">Alamat Lengkap Instansi</label>
                            <textarea name="address" id="address" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contractStartDate" class="form-label">Tanggal Mulai Kontrak</label>
                            <input type="date" name="contractStartDate" id="contractStartDate" class="form-control" required aria-required="true">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contractEndDate" class="form-label">Tanggal Berakhir Kontrak</label>
                            <input type="date" name="contractEndDate" id="contractEndDate" class="form-control" required aria-required="true">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="mb-2 d-block">Pratinjau Gambar</span>
                            <img style="width: 40%" class="" src="{{ asset('assets/img/logos/1.jpg') }}" class="img-fluid img-thumbnail" />
                        </div>
                    </fieldset>
                    <fieldset class="border rounded-2 row p-3">
                        <legend class="float-none w-auto px-4">Informasi Owner</legend>
                        <div class="col-md-12 mb-3">
                            <label for="owner_fullname" class="form-label">Nama Lengkap</label>
                            <input type="text" name="owner_fullname" id="owner_fullname" class="form-control" required aria-required="true">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="owner_username" class="form-label">Username Sistem</label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" name="owner_username" id="owner_username" class="form-control" required aria-required="true">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="owner_email" class="form-label">Email Owner</label>
                            <input type="email" name="owner_email" id="owner_email" class="form-control" required aria-required="true">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="owner_password" class="form-label">Kata Sandi Sistem</label>
                            <input type="password" name="owner_password" id="owner_email" class="form-control" required aria-required="true">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="owner_retype_password" class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" name="owner_retype_password" id="owner_retype_password" class="form-control" required aria-required="true">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="owner_birth" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="owner_birth" id="owner_birth" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="owner_gender" class="form-label">Jenis Kelamin</label>
                            <select name="owner_gender" id="owner_gender" class="form-control">
                                <option value="">--- Pilih Jenis Kelamin ---</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="owner_address" class="form-label">Alamat Lengkap Owner</label>
                            <textarea name="owner_address" id="owner_address" class="form-control" rows="5" required aria-required="true"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="owner_photo" class="form-label">Foto</label>
                            <input type="file" name="owner_photo" id="owner_photo" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="mb-2 d-block">Pratinjau Gambar</span>
                            <img style="width: 40%" class="" src="{{ asset('assets/img/logos/1.jpg') }}" class="img-fluid img-thumbnail" />
                        </div>
                    </fieldset>
                    <div class="d-flex justify-content-end my-4">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
