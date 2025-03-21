@extends('template.main')
@section('konten')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Detail Transaksi
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <a href="" class="btn bg-primary-lt me-2" data-bs-toggle="modal" data-bs-target="#tambahModal">
                            <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-2">
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Tambah Data
                        </a>
                        {{-- <a href="" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                            data-bs-target="#tambahModal">
                            <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cash">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                                <path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" />
                            </svg>
                            Bayar
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card card-lg">
                    <div class="card-body">
                        <p class="h2 text-center">{{ $pelanggan->kode_invoice }}</p>
                        <table class="w-100 mb-4">
                            <tr>
                                <td>
                                    <strong>{{ $pelanggan->member->nama }}</strong><br>
                                    {{ $pelanggan->member->alamat }}
                                </td>
                                <td class="text-end">
                                    <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pelanggan->tgl)->format('d-m-Y') }}<br>
                                    <strong>Status:</strong>
                                    @if ($pelanggan->dibayar == 'dibayar')
                                        <span class="text-success">Dibayar</span>
                                    @elseif ($pelanggan->dibayar == 'belum_dibayar')
                                        <span class="text-danger">Belum Dibayar</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <table class="table table-transparent table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 1%">No</th>
                                    <th>Paket</th>
                                    <th class="text-center" style="width: 5%">Qnt</th>
                                    <th class="text-end" style="width: 20%">Harga</th>
                                    <th class="text-end" style="width: 20%">Total</th>
                                </tr>
                            </thead>
                            @php $no = 1; @endphp
                            @foreach ($data as $invoice)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>
                                        <p class="strong mb-1">{{ $invoice->paket->nama_paket }}</p>
                                    </td>
                                    <td class="text-center">
                                        {{ $invoice->qty }}
                                    </td>
                                    <td class="text-end">Rp. {{ number_format($invoice->paket->harga, 0, ',', '.') }}</td>
                                    <td class="text-end">Rp.
                                        {{ number_format($invoice->qty * $invoice->paket->harga, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="font-weight-bold text-uppercase text-end">Pajak (2%)</td>
                                <td class="font-weight-bold text-end">Rp. {{ number_format($pajak, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="font-weight-bold text-uppercase text-end">Biaya Tambahan</td>
                                <td class="font-weight-bold text-end">Rp. {{ number_format($biaya_tambahan, 0, ',', '.') }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="font-weight-bold text-uppercase text-end">Diskon</td>
                                <td class="font-weight-bold text-end">Rp. {{ number_format($diskon, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                                <td class="font-weight-bold text-end">Rp. {{ number_format($total, 0, ',', '.') }}</td>
                            </tr>
                        </table>
                        <p class="text-secondary text-center mt-5">Thank you very much for trusting our laundry service. We
                            look forward to serving you again!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xl d-flex justify-content-between">
            <a href="/transaksi" class="btn bg-secondary-lt">Kembali ke halaman transaksi</a>
            <button type="button" class="btn bg-success-lt" onclick="printSection()">
                <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                    <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                    <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                </svg>
                Print Invoice
            </button>
        </div>

        {{-- modal tambah --}}
        <div class="modal modal-blur fade" id="tambahModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Paket yang Dibeli</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- @if ($idtransaksi && $idtransaksi->isNotEmpty()) --}}
                        <form action="{{ route('detail', ['id' => $idtransaksi]) }}" method="POST">
                            @csrf
                            <input type="hidden" id="id" name="id_transaksi" value="{{ $idtransaksi }}">

                            <div class="mb-3">
                                <label class="form-label">Paket yang dibeli</label>
                                <div id="paket-container">
                                    <div class="input-group mb-2 paket-item">
                                        <select class="form-select" name="id_paket[]">
                                            @foreach ($paket as $o)
                                                <option value="{{ $o->id }}">{{ $o->nama_paket }}</option>
                                            @endforeach
                                        </select>
                                        <input type="number" class="form-control" name="qty[]" placeholder="Quantity"
                                            autocomplete="off" required>
                                        <button type="button" class="btn btn-danger remove-paket">X</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary mt-2" id="add-paket">Tambah</button>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                            </div>

                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <script src="/dist/js/jquery.min.js"></script>
        <script>
            $(document).on('click', '#edit', function(e) {
                var id = $(this).attr("data-id");
                var nama = $(this).attr("data-nama");
                var jenis = $(this).attr("data-jenis");
                var nama_paket = $(this).attr("data-nama_paket");
                var harga = $(this).attr("data-harga");
                $('#ide').val(id);
                $('#namae').val(nama);
                $('#jenise').val(jenis);
                $('#nama_pakete').val(nama_paket);
                $('#hargae').val(harga);
            });


            $(document).on('click', '#hapus', function(e) {
                var id = $(this).attr("data-id");
                $('#idhapus').val(id)
            });

            // function printSection() {
            //     var printContents = document.querySelector('.page-body').outerHTML;
            //     var originalContents = document.body.innerHTML;

            //     document.body.innerHTML = printContents;
            //     window.print();
            //     document.body.innerHTML = originalContents;
            // }

            function printSection() {
        var printContents = document.querySelector('.page-body').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(); // Reload untuk mengembalikan tampilan asli
    }
        </script>

        <script>
            document.getElementById('add-paket').addEventListener('click', function() {
                let paketContainer = document.getElementById('paket-container');
                let paketItem = document.createElement('div');
                paketItem.classList.add('input-group', 'mb-2', 'paket-item');

                paketItem.innerHTML = `
            <select class="form-select" name="id_paket[]" required>
                @foreach ($paket as $o)
                    <option value="{{ $o->id }}">{{ $o->nama_paket }}</option>
                @endforeach
            </select>
            <input type="number" class="form-control" name="qty[]" placeholder="Quantity" autocomplete="off" required>
            <button type="button" class="btn btn-danger btn-sm remove-paket">X</button>
        `;

                paketContainer.appendChild(paketItem);
            });

            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-paket')) {
                    event.target.closest('.paket-item').remove();
                }
            });
        </script>
    @endsection
