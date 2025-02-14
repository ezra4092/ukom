@extends('template.main')
@section('konten')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h1 class="page-title">
                        Halo {{ Auth::user()->nama }}, Selamat Datang di Outlet {{ Auth::user()->outlet->nama }}
                    </h1>
                    <div class="page-pretitle mt-2">
                        {{ \Carbon\Carbon::now()->isoFormat('dddd') }},
                        {{ \Carbon\Carbon::now()->isoFormat('DD MMMM YYYY') }}
                    </div>
                </div>
                <!-- Page title actions -->
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            {{-- <div class="row row-deck row-cards">
                <div class="col-15">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-4">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-primary text-white avatar">
                                                <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-building-store">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 21l18 0" />
                                                    <path
                                                        d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                                    <path d="M5 21l0 -10.15" />
                                                    <path d="M19 21l0 -10.15" />
                                                    <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Outlet
                                            </div>
                                            <div class="text-secondary">
                                                {{ $outlet }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-green text-white avatar">
                                                <!-- Download SVG icon from http://tabler.io/icons/icon/shopping-cart -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-1">
                                                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                    <path d="M17 17h-11v-14h-2" />
                                                    <path d="M6 5l14 1l-1 7h-13" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Transaksi
                                            </div>
                                            <div class="text-secondary">
                                                {{ $transaksi }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-facebook text-white avatar">
                                                <!-- Download SVG icon from http://tabler.io/icons/icon/brand-facebook -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user-square">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M9 10a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                    <path d="M6 21v-1a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v1" />
                                                    <path
                                                        d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Member
                                            </div>
                                            <div class="text-secondary">
                                                {{ $member }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <span class="badge bg-secondary-lt p-2 mb-3">
                                        New Member
                                    </span>
                                    <table class="table table-striples">
                                        <tr>
                                            <td>No.</td>
                                            <td>Nama</td>
                                        </tr>
                                        @php $no = 1; @endphp
                                        @foreach ($lastmember as $items)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $items->nama }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-warning-lt p-2 mb-3">
                                                Transaksi terakhir
                                            </span>
                                        </div>
                                        <table class="table table-striples">
                                            <tr>
                                                <th width="20%">Kode Invoice</th>
                                                <th>Member</th>
                                                <th>Status</th>
                                                <th>Pembayaran</th>
                                            </tr>
                                            @foreach ($last as $item)
                                                <tr>
                                                    <td>{{ $item->kode_invoice }}</td>
                                                    <td>{{ $item->member->nama }}</td>
                                                    <td>
                                                        @if ($item->status == 'baru')
                                                            Baru
                                                        @elseif ($item->status == 'proses')
                                                            Proses
                                                        @elseif ($item->status == 'selesai')
                                                            Selesai
                                                        @elseif ($item->status == 'diambil')
                                                            Diambil
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->dibayar == 'dibayar')
                                                            <div class="badge bg-success-lt" style="border-radius:15px">
                                                                Dibayar
                                                            </div>
                                                        @elseif ($item->dibayar == 'belum_dibayar')
                                                            <div class="badge bg-danger-lt" style="border-radius:15px">Belum
                                                                Dibayar
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="row row-cards">
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'owner')
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-primary text-white avatar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icon-tabler-building-store">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M3 21l18 0" />
                                                        <path
                                                            d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                                        <path d="M5 21l0 -10.15" />
                                                        <path d="M19 21l0 -10.15" />
                                                        <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">Outlet

                                                </div>
                                                <div class="text-secondary">{{ $outlet }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-green text-white avatar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icon-tabler-shopping-cart">
                                                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                        <path d="M17 17h-11v-14h-2" />
                                                        <path d="M6 5l14 1l-1 7h-13" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">Transaksi</div>
                                                <div class="text-secondary">{{ $transaksi }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-facebook text-white avatar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icon-tabler-user-square">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M9 10a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                        <path d="M6 21v-1a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v1" />
                                                        <path
                                                            d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">Member</div>
                                                <div class="text-secondary">{{ $member }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="card mt-3">
                            <div class="card-body">
                                <span class="badge bg-warning-lt p-2 mb-3">Transaksi Terakhir</span>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Kode Invoice</th>
                                        <th>Member</th>
                                        <th>Status</th>
                                        <th>Batas Waktu</th>
                                        <th>Pembayaran</th>
                                    </tr>
                                    @foreach ($last as $item)
                                        <tr>
                                            <td>{{ $item->kode_invoice }}</td>
                                            <td>{{ $item->member->nama }}</td>
                                            <td>{{ ucfirst($item->status) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->batas_waktu)->format('d-m-Y') }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $item->dibayar == 'dibayar' ? 'bg-success-lt' : 'bg-danger-lt' }}"
                                                    style="border-radius:15px">{{ ucfirst($item->dibayar) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'owner')
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="card card-sm mt-3">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="/dist/js/chart.js"></script>

    {{-- <script>
        const ctx = document.getElementById('myChart');
        const labels = @json($labels); // Nama outlet
        const values = @json($values); // Jumlah transaksi

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Transaksi',
                    data: values,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script> --}}

    <script>
        const ctx = document.getElementById('myChart');
        const labels = @json($labels); // Nama outlet
        const values = @json($values); // Jumlah transaksi

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Transaksi',
                    data: values,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1, // Pastikan label hanya bilangan bulat
                            precision: 0 // Hilangkan desimal
                        }
                    }
                },
                responsive: true, // Agar chart responsif terhadap ukuran container
                maintainAspectRatio: false // Biarkan chart menyesuaikan ukuran container
            }
        });
    </script>
@endsection
