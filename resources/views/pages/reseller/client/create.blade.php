@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title ?? 'Tambah Pelanggan' }}
@endsection

@section('content')
    <div class="container-lg">
        <div class="row g-0">
            <div class="card">
                <div class="card-header">
                    <strong>Pelanggan</strong>
                </div>
                <form action="{{ route('reseller_owner.client.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body p-4">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Galat!</strong> {{ $error }}
                                    <button type="button" class="btn-close" data-coreui-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                        <fieldset class="border row p-3 mb-4 rounded-2">
                            <legend class="float-none w-auto px-4">Data Diri Pelanggan</legend>
                            <div class="col-md-6 mb-3">
                                <label for="fullname" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="fullname" id="fullname"
                                    autocomplete="false" autofocus value="{{ old('fullname') }}"
                                    placeholder="Masukan nama lengkap (wajib)">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="username" class="form-label">Nama Pengguna</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    autocomplete="false" autofocus value="{{ old('username') }}"
                                    placeholder="Masukan nama pengguna (wajib)">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    autocomplete="false" autofocus value="{{ old('email') }}"
                                    placeholder="Masukan alamat email (opsional)">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="phoneNumber">Nomor Telepon</label>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control"
                                    value="{{ old('phoneNumber') }}" placeholder="Masukan nomor telepon (opsional)">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    autocomplete="false" autofocus value="{{ old('password') }}"
                                    placeholder="Masukan kata sandi (wajib)">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" autocomplete="false" autofocus
                                    value="{{ old('password_confirmation') }}" placeholder="Konfirmasi kata sandi (wajib)">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="birth" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="birth" id="birth" class="form-control"
                                    value="{{ old('birth') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">--- Pilih Jenis Kelamin (Opsional) ---</option>
                                    <option value="male" @selected(old('gender') === 'male')>Lelaki</option>
                                    <option value="female @selected(old('gender') === 'female')">Wanita</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Alamat Lengkap</label>
                                <textarea name="address" id="address" class="form-control" rows="5"
                                    placeholder="Masukan alamat pengguna (opsional)">{{ old('address') }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="photo" class="form-label">Foto</label>
                                <input type="file" accept="image/*" name="photo" id="photo"
                                    class="form-control" onchange="preview(event, 'imgOwner')">
                            </div>
                            <div class="col-md-6 mb-3">
                                <span class="mb-2 d-block">Pratinjau Gambar</span>
                                <img id="imgOwner" src="https://via.placeholder.com/200?text=Pratinjau Gambar"
                                    class="img-fluid img-thumbnail" />
                            </div>
                        </fieldset>

                        <fieldset class="border row p-3 mb-4 rounded-2">
                            <legend class="float-none w-auto px-4">Data Layanan</legend>
                            <div class="col-md-6 mb-3">
                                <label for="plan" class="form-label">Paket Internet</label>
                                <select name="plan" id="plan" class="form-control">
                                    <option value="">--- Pilih Paket Internet ---</option>
                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}" @selected(old('plan') == $plan->id)>
                                            {{ $plan->name }} - {{ $plan->bandwidth }}Mbps</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-2">Apakah User PPN ?</label>
                                <div class="form-check form-switch form-switch-lg">
                                    <input class="form-check-input" type="checkbox" name="ppn" id="ppn"
                                        @checked(old('ppn'))>
                                    <label class="form-check-label" for="ppn">PPN</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('js.previewImg')
@endsection
