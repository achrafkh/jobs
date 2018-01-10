<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#0363c5"/>
    <title>Kpeiz Recruit</title>
    <link rel="icon" type="image/png" href="https://www.kpeiz.digital/assets/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://www.kpeiz.digital/assets/images/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="https://www.kpeiz.digital/assets/images/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="https://www.kpeiz.digital/assets/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="stylesheet" href="/assets/css/theme.min.css">

</head>
<body>
    <div id="wrapper" class="page-wrap {{$page_class or ''}}">
        @include('partials.header')
        @yield('content')
        @include('partials.footer')
    </div>

    <script src="/assets/js/vendors.min.js"></script>
    <script src="/assets/js/theme.js"></script>
    @yield('js')
</body>
</html>
