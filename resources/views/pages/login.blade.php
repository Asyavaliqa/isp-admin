@extends('layouts.pages')

@section('pageTitle')
    {{ $pageTitle ?? 'Login' }}
@endsection

@section('content')
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <form action="" method="POST">
                                    @csrf
                                    <h1>Login</h1>
                                    @if ($errors->any())
                                        <div class="my-4">

                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Error!</strong> {{ $error }}
                                                    <b4utton type="button" class="btn-close" data-coreui-dismiss="alert"
                                                        aria-label="Close"></b4utton>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <p class="text-medium-emphasis">Sign In to your account</p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="icon cil cil-user"></i>
                                        </span>
                                        <input class="form-control" type="text" placeholder="Username" name="username"
                                            required value="{{ old('username') }}" autocomplete="username">
                                    </div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text">
                                            <i class="icon cil cil-lock-locked"></i>
                                        </span>
                                        <input class="form-control" type="password" placeholder="Password" name="password"
                                            required autocomplete="current-password">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card col-md-5 text-white bg-primary py-5">
                            <div class="card-body text-center">
                                <div>
                                    <p class="fs-1 fw-bold"> LOGO </p>       {{-- edit --}}
                                    <h4>GMDP BILLING</h4>
                                    <p>Sistem Administrasi dan Pembayaran</p>
                                </div>
                            </div>
                            <p class="text-center fs-5 fw-light">PT.Global Media Data Prima</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
