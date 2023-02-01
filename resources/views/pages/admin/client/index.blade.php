@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title ?? 'Pelanggan' }}
@endsection

@section('content')
    <div class="container-lg">
        <div class="row g-0 mb-4">
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
                        @include('pages.admin.client.indexTable')
                    </div>
                    {{ $clients->links('components.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
