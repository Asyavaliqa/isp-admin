<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ $pageTitle }} | {{ config('app.name') }}</title>

    @vite(['resources/scss/vendors/simplebar.scss', 'resources/scss/style.scss'])
</head>

<body>
    @yield('content')

    @vite(['resources/js/app.js'])
    <script></script>

</body>

</html>
