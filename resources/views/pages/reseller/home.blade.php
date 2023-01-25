@extends('layouts.dashboard')

@section('pageTitle')
    {{ $title ?? 'Dasboard' }}
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/free.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/brand.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/flag.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/chartjs@3.0.0/dist/css/coreui-chartjs.min.css">
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.1.2/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/chartjs@3.0.0/dist/js/coreui-chartjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/utils@1.3.1/dist/coreui-utils.js"></script>
    <script src="js/main.js"></script>
@endsection

@section('content')
<h1>Halaman Reseller</h1>
@endsection
