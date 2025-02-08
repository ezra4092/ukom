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
                        <button type="button" class="btn btn-primary" onclick="printSection()">
                            <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                            </svg>
                            Print Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card card-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="h3">BersihSekejab</p>
                                <address>
                                    Nama Petugas : {{ $nama }}<br>
                                    Nama Outlet : {{ $outlet }}<br>
                                </address>
                            </div>
                            <div class="col-6 text-end">
                                <p class="h3">{{ $namacust }}</p>
                                <address>
                                    {{ $tlp }}<br>
                                    {{ $alamat }}<br>
                                </address>
                            </div>
                            <div class="col-12 my-5 d-flex justify-align-reverse">
                                <h1>Kode : {{ $kode }}</h1>
                                <a href="" class="btn btn-primary btn-5 d-none d-sm-inline-block ms-auto"
                                    data-bs-toggle="modal" data-bs-target="#tambahModal">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Tambah Data Transaksi
                                </a>
                            </div>
                        </div>
                        <table class="table table-transparent table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 1%"></th>
                                    <th>Paket</th>
                                    <th class="text-center" style="width: 1%">Qnt</th>
                                    <th class="text-end" style="width: 1%">Harga</th>
                                    <th class="text-end" style="width: 1%">Total</th>
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
                                    <td class="text-end"> {{ $invoice->paket->harga }}</td>
                                    <td class="text-end">{{ $invoice->qty * $invoice->paket->harga }}</td>
                                </tr>
                            @endforeach
                            {{-- <tr>
                                <td colspan="4" class="strong text-end">Vat Rate</td>
                                <td class="text-end">20%</td>
                            </tr> --}}
                            {{-- <tr>
                                <td colspan="4" class="strong text-end">Vat Due</td>
                                <td class="text-end">$5.000,00</td>
                            </tr> --}}
                            <tr>
                                <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                                <td class="font-weight-bold text-end">{{ $total }}</td>
                            </tr>
                        </table>
                        <table class="table table-transparent table-responsive mt-5">
                        <tr>
                            <td class="text-center">Total</td>
                            <td class="text-center">Dibayar</td>
                            <td class="text-center">Kembalian</td>
                        </tr>

                        </table>
                        <p class="text-secondary text-center mt-5">Thank you very much for trusting our laundry service. We look forward to serving you again!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xl">
            <a href="/transaksi" class="btn btn-primary">Kembali ke halaman transaksi</a>
        </div>

        {{-- modal tambah --}}
        <div class="modal modal-blur fade" id="tambahModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- @if ($idtransaksi && $idtransaksi->isNotEmpty()) --}}
                        <form action="{{ route('detail', ['id' => $idtransaksi]) }}" method="POST">
                            @csrf
                            <input type="hidden" id="id" name="id_transaksi" value="{{ $idtransaksi }}">
                            <div class="mb-3">
                                <div class="form-label">Nama Paket</div>
                                <select class="form-select" name="id_paket">
                                    @foreach ($paket as $o)
                                        <option value="{{ $o->id }}">{{ $o->nama_paket }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="qty" placeholder="Quantity">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary  btn-3" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary btn-5 ms-auto" data-bs-dismiss="modal">
                                    Tambah Data
                                </button>
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

            function printSection() {
    var printContents = document.querySelector('.page-body').outerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
        </script>
    @endsection
