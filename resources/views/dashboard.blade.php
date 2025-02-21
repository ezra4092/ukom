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
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="row row-cards">
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'owner')
                            <div class="col-sm-6 col-lg-3">
                                <a href="/outlet">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-primary text-white avatar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icon-tabler-building-store">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3 21l18 0" />
                                                            <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                                            <path d="M5 21l0 -10.15" />
                                                            <path d="M19 21l0 -10.15" />
                                                            <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">Total Outlet
                                                    </div>
                                                    <div class="text-secondary">{{ $outlet }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                            <div class="col-sm-6 col-lg-3">
                                <a href="/member">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-facebook text-white avatar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
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
                                                    <div class="font-weight-medium">Total Pelanggan</div>
                                                    <div class="text-secondary">{{ $member }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="/transaksi">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-green text-white avatar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icon-tabler-shopping-cart">
                                                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path d="M17 17h-11v-14h-2" />
                                                            <path d="M6 5l14 1l-1 7h-13" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium"> Total Transaksi</div>
                                                    <div class="text-secondary">{{ $transaksi }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-warning text-white avatar">
                                                    <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-cash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" /></svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Total Penjualan
                                                </div>
                                                <div class="text-secondary">
                                                Rp. {{number_format($totalpenjualan, 0, ',', '.')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-12 col-sm-8 col-lg-8">
                        <div class="card mt-3">
                            <div class="card-body">
                                <span class="badge bg-warning-lt p-2 mb-3">Transaksi Terakhir</span>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Kode Invoice</th>
                                        <th>Member</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Batas Waktu</th>
                                        <th>Pembayaran</th>
                                    </tr>
                                    @foreach ($last as $item)
                                        <tr>
                                            <td style="width: 20%">{{ $item->kode_invoice }}</td>
                                            <td>{{ $item->member->nama }}</td>
                                            <td>{{ ucfirst($item->status) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tgl)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->batas_waktu)->format('d-m-Y') }}</td>
                                            <td>
                                                @if ($item->dibayar == 'dibayar')
                                                <div class="badge bg-success-lt" style="border-radius:15px">Dibayar</div>
                                            @elseif ($item->dibayar == 'belum_dibayar')
                                                <div class="badge bg-danger-lt" style="border-radius:15px">Belum Dibayar
                                                </div>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'owner')
                        <div class="col-12 col-sm-4 col-lg-4">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <span class="badge bg-primary-lt">Grafik Transaksi</span>
                                </div>
                                <div class="card card-sm">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="/dist/js/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        const labels = @json($labels); // Label bulan
        const data = @json($data); // Data transaksi per outlet

        // Konversi data menjadi format dataset yang diterima oleh Chart.js
        const datasets = Object.keys(data).map(outlet => ({
            label: outlet, // Nama outlet sebagai label dataset
            data: Object.values(data[outlet]), // Jumlah transaksi per bulan
            backgroundColor: getRandomColor(), // Warna latar belakang acak
            borderColor: getRandomColor(), // Warna border acak
            borderWidth: 1
        }));

        // Fungsi untuk menghasilkan warna acak
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Render chart
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels, // Label bulan
                datasets: datasets // Dataset transaksi per outlet
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

<script>
    const ctx = document.getElementById('myChart2');
    const labels = @json($labels); // Label bulan
    const data = @json($data); // Data transaksi per outlet

    // Konversi data menjadi format dataset yang diterima oleh Chart.js
    const datasets = Object.keys(data).map(outlet => ({
        label: outlet, // Nama outlet sebagai label dataset
        data: Object.values(data[outlet]), // Jumlah transaksi per bulan
        backgroundColor: getRandomColor(), // Warna latar belakang acak
        borderColor: getRandomColor(), // Warna border acak
        borderWidth: 1
    }));

    // Fungsi untuk menghasilkan warna acak
    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Render chart
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels, // Label bulan
            datasets: datasets // Dataset transaksi per outlet
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
