@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title }}
@endsection

@section('content')
<div class="container-lg">
    <div class="row g-0">
        <div class="card">
            <div class="card-header">
                <strong>{{ $owner->fullname }}</strong>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-thumbnail mx-auto d-block img-fluid" src="{{ asset($owner->photo ?? 'assets/brand/GMDP_100x100.png') }}" alt="{{ $owner->fullname }}" />
                        </div>
                        <div class="col-md-8">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
