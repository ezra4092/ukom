@extends('template.main')
@section('konten')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table Transaksi</h3>
                        <div class="p-2 g-col-6  ms-auto">
                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                                <a href="#" class="btn bg-primary-lt me-2" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Tambah Data
                                </a>
                            @endif
                            <a href="" class="btn bg-success-lt">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <path d="M8 11h8v7h-8z" />
                                    <path d="M8 15h8" />
                                    <path d="M11 11v7" />
                                </svg>
                                Generate Laporan
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Outlet</th>
                                    <th>Kode Invoice</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Batas Waktu</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Total</th>
                                    {{-- <th>Biaya Tambahan</th>
                                    <th>Diskon</th>
                                    <th>Pajak</th> --}}
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th>Nama Petugas</th>
                                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data as $transaksi)
                                    <tr>
                                        <td width="1%" class="text-end">{{ $no++ }}</td>
                                        <td>{{ $transaksi->outlet->nama }}</td>
                                        <td>{{ $transaksi->kode_invoice }}</td>
                                        <td>{{ $transaksi->member->nama }}</td>
                                        <td>{{ \Carbon\Carbon::parse($transaksi->tgl)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($transaksi->batas_waktu)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($transaksi->tgl_bayar)->format('d-m-Y') }}</td>
                                        <td>{{ $transaksi->total}}</td>
                                        {{-- <td>{{ $transaksi->biaya_tambahan }}</td>
                                        <td>{{ $transaksi->diskon }}</td>
                                        <td>{{ $transaksi->pajak }}</td> --}}
                                        <td>
                                            @if ($transaksi->status == 'baru')
                                            <span class="badge bg-primary me-1"></span> Baru
                                            @elseif ($transaksi->status == 'proses')
                                            <span class="badge bg-warning me-1"></span>Proses
                                            @elseif ($transaksi->status == 'selesai')
                                            <span class="badge bg-success me-1"></span>Selesai
                                            @elseif ($transaksi->status == 'diambil')
                                            <span class="badge bg-secondary me-1"></span>Diambil
                                            @endif
                                        </td>
                                        <td>
                                            @if ($transaksi->dibayar == 'dibayar')
                                            <div class="badge bg-success-lt" style="border-radius:15px">Dibayar</div>
                                            @elseif ($transaksi->dibayar == 'belum_dibayar')
                                            <div class="badge bg-danger-lt" style="border-radius:15px">Belum Dibayar</div>
                                            @endif
                                        </td>
                                        <td>{{ $transaksi->user->nama }}</td>
                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                                        <td>
                                            <button type="button" class="bg-success"
                                                onclick="window.location.href='/detailtransaksi/{{ $transaksi->id }}'">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-shopping-cart text-light">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M6 2a1 1 0 0 1 .993 .883l.007 .117v1.068l13.071 .935a1 1 0 0 1 .929 1.024l-.01 .114l-1 7a1 1 0 0 1 -.877 .853l-.113 .006h-12v2h10a3 3 0 1 1 -2.995 3.176l-.005 -.176l.005 -.176c.017 -.288 .074 -.564 .166 -.824h-5.342a3 3 0 1 1 -5.824 1.176l-.005 -.176l.005 -.176a3.002 3.002 0 0 1 1.995 -2.654v-12.17h-1a1 1 0 0 1 -.993 -.883l-.007 -.117a1 1 0 0 1 .883 -.993l.117 -.007h2zm0 16a1 1 0 1 0 0 2a1 1 0 0 0 0 -2zm11 0a1 1 0 1 0 0 2a1 1 0 0 0 0 -2z" />
                                                </svg>
                                            </button>
                                            <button type="button" id="edit" data-bs-toggle="modal" class="bg-warning"
                                                data-bs-target="#editModal" data-id="{{ $transaksi->id }}"
                                                data-outlet="{{ $transaksi->id_outlet }}"
                                                data-kode="{{ $transaksi->kode_invoice }}"
                                                data-member="{{ $transaksi->id_member }}" data-tgl="{{ $transaksi->tgl }}"
                                                data-bataswaktu="{{ $transaksi->batas_waktu }}"
                                                data-tglbayar="{{ $transaksi->tgl_bayar }}"
                                                data-biaya="{{ $transaksi->biaya_tambahan }}"
                                                data-diskon="{{ $transaksi->diskon }}"
                                                data-pajak="{{ $transaksi->pajak }}"
                                                data-status="{{ $transaksi->status }}"
                                                data-dibayar="{{ $transaksi->dibayar }}"
                                                data-id_user="{{ $transaksi->id_user }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-edit text-light">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                            </button>
                                            <button type="button" id="hapus" data-bs-toggle="modal" class="bg-danger"
                                                data-bs-target="#hapusModal" data-id="{{ $transaksi->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash text-light">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg>
                                            </button>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                     <div class="card-footer d-flex align-items-center">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal tambah --}}
    <div class="modal modal-blur fade" id="tambahModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah_transaksi') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="form-label">Outlet</div>
                            <input type="input" class="form-control" placeholder="Outlet"
                                value="{{ Auth::user()->outlet->nama }}" readonly>
                            <input type="hidden" name="id_outlet" value="{{ Auth::user()->id_outlet }}">
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Member</div>
                            <select class="form-select" name="id_member" required>
                                @foreach ($member as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tgl" placeholder="Tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Bayar</label>
                            <input type="date" class="form-control" name="tgl_bayar" placeholder="Tanggal Bayar">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biaya Tambahan</label>
                            <input type="number" class="form-control" name="biaya_tambahan"
                                placeholder="Biaya Tambahan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Diskon</label>
                            <input type="number" class="form-control" name="diskon" placeholder="Diskon">
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Status</div>
                            <select class="form-select" name="status" required>
                                <option value="baru">Baru</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                                <option value="diambil">Diambil</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Pembayaran</div>
                            <select class="form-select" name="dibayar" required>
                                <option value="dibayar">Dibayar</option>
                                <option value="belum_dibayar">Belum Dibayar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Petugas</div>
                            <input type="input" class="form-control" placeholder="Outlet"
                                value="{{ Auth::user()->nama }}" readonly>
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                            {{-- <select class="form-select" name="id_user" required>
                                @foreach ($petugas as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary btn-3" data-bs-dismiss="modal">
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

    {{-- modal hapus --}}
    <div class="modal modal-blur fade" id="hapusModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <form action="{{ route('hapus_transaksi') }}" method="POST">
                    @csrf
                    <input type="hidden" id="idhapus" name="id">
                    <div class="modal-body text-center mt-5 py-4">
                        <h3>Apakah anda yakin ingin menghapus data?</h3>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-3 w-100" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-danger btn-4 w-100" data-bs-dismiss="modal">
                                        Hapus Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    <div class="modal modal-blur fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit_transaksi') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <div class="form-label">Outlet</div>
                            <input type="input" class="form-control" placeholder="Outlet"
                                value="{{ Auth::user()->outlet->nama }}" readonly>
                            <input type="hidden" name="id_outlet" value="{{ Auth::user()->id_outlet }}" disabled>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Member</div>
                            <select class="form-select" name="id_member" id="membere">
                                @foreach ($member as $m)
                                    <option value="{{ $m->id }}" disabled>{{ $m->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tgl" id="tgle"
                                placeholder="Tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Batas Waktu</label>
                            <input type="date" class="form-control" name="batas_waktu" id="batas_waktue"
                                placeholder="Tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Bayar</label>
                            <input type="date" class="form-control" name="tgl_bayar" id="tgl_bayare"
                                placeholder="Tanggal Bayar">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biaya Tambahan</label>
                            <input type="number" class="form-control" name="biaya_tambahan" id="biayae"
                                placeholder="Biaya Tambahan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Diskon</label>
                            <input type="number" class="form-control" name="diskon" id="diskone"
                                placeholder="Diskon">
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Status</div>
                            <select class="form-select" name="status" required>
                                <option value="baru"
                                    {{ isset($transaksi) && $transaksi->status == 'baru' ? 'selected' : '' }}>Baru</option>
                                <option value="proses"
                                    {{ isset($transaksi) && $transaksi->status == 'proses' ? 'selected' : '' }}>Proses
                                </option>
                                <option value="selesai"
                                    {{ isset($transaksi) && $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai
                                </option>
                                <option value="diambil"
                                    {{ isset($transaksi) && $transaksi->status == 'diambil' ? 'selected' : '' }}>Diambil
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Pembayaran</div>
                            <select class="form-select" name="dibayar" required>
                                <option value="dibayar"
                                    {{ isset($transaksi) && $transaksi->dibayar == 'dibayar' ? 'selected' : '' }}>Dibayar
                                </option>
                                <option value="belum_dibayar"
                                    {{ isset($transaksi) && $transaksi->dibayar == 'belum_dibayar' ? 'selected' : '' }}>
                                    Belum Dibayar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Petugas</div>
                            <input type="input" class="form-control" placeholder="Outlet"
                                value="{{ Auth::user()->nama }}" readonly>
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}" disabled>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary btn-3" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary btn-5 ms-auto" data-bs-dismiss="modal">
                                Perbarui Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/dist/js/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script> --}}
    {{-- <script src="/dist/js/jquery.js" defer></script> --}}

    <script>
        $(document).on('click', '#edit', function(e) {
            var id = $(this).attr("data-id");
            var kode = $(this).attr("data-kode");
            var member = $(this).attr("data-member");
            var tgl = $(this).attr("data-tgl");
            var batas_waktu = $(this).attr("data-bataswaktu");
            var tgl_bayar = $(this).attr("data-tglbayar");
            var biaya = $(this).attr("data-biaya");
            var diskon = $(this).attr("data-diskon");
            var pajak = $(this).attr("data-pajak");
            var status = $(this).attr("data-status");
            var dibayar = $(this).attr("data-dibayar");

            $('#id').val(id);
            $('#kode').val(kode);
            $('#membere').val(member);
            $('#tgle').val(tgl);
            $('#batas_waktue').val(batas_waktu);
            $('#tgl_bayare').val(tgl_bayar);
            $('#biayae').val(biaya);
            $('#diskone').val(diskon);
            $('#pajake').val(pajak);
            $('#statuse').val(status);
            $('#dibayare').val(dibayar);
        });



        $(document).on('click', '#hapus', function(e) {
            var id = $(this).attr("data-id");
            $('#idhapus').val(id)
        });
    </script>
@endsection
