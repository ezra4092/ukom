<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0
* @link https://tabler.io
* Copyright 2018-2025 The Tabler Authors
* Copyright 2018-2025 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <!-- CSS files -->
    <link href="/dist/css/tabler.min.css?1738102150" rel="stylesheet" />
    <link href="/dist/css/tabler-flags.min.css?1738102150" rel="stylesheet" />
    <link href="/dist/css/tabler-socials.min.css?1738102150" rel="stylesheet" />
    <link href="/dist/css/tabler-payments.min.css?1738102150" rel="stylesheet" />
    <link href="/dist/css/tabler-vendors.min.css?1738102150" rel="stylesheet" />
    <link href="/dist/css/tabler-marketing.min.css?1738102150" rel="stylesheet" />
    <link href="/dist/css/demo.min.css?1738102150" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');
    </style>
</head>

<body>
    <script src="/dist/js/demo-theme.min.js?1738102150"></script>
    <div class="page">
        <!-- Sidebar -->
        @include('template.sidebar')

        <!-- Navbar -->
        @include('template.navbar')
        <div class="page-wrapper">
            <!-- Page header -->
            @yield('konten')
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank"
                                        class="link-secondary" rel="noopener">Documentation</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2025
                                    Ezra Faira UKOM.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Libs JS -->
    <script src="/dist/libs/apexcharts/dist/apexcharts.min.js?1738102150" ></script>
    <script src="/dist/libs/jsvectormap/dist/jsvectormap.min.js?1738102150" ></script>
    <script src="/dist/libs/jsvectormap/dist/maps/world.js?1738102150" ></script>
    <script src="/dist/libs/jsvectormap/dist/maps/world-merc.js?1738102150" ></script>
    <script src="/dist/js/jquery.min.js" ></script>
    <script src="/dist/js/jquery.js" ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Tabler Core -->
    <script src="/dist/js/tabler.min.js?1738102150" ></script>
    <script src="/dist/js/demo.min.js?1738102150" ></script>
    <script  src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"909d707ee981fd98","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.1.0","token":"84cae67e72b342399609db8f32d1c3ff"}'
        crossorigin="anonymous"></script>

</body>

</html>
