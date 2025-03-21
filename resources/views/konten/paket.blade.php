@extends('template.main')
@section('konten')
    <div class="page-header d-print-none">
        <div class="container-xl">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table Paket</h3>
                        <div class="p-2 g-col-6  ms-auto">
                            @if (Auth::user()->role == 'admin')
                                <a href="#" class="btn bg-primary-lt me-2" data-bs-toggle="modal"
                                    data-bs-target="#tambahModal">
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
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Outlet</th>
                                    <th>Jenis</th>
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    @if (Auth::user()->role == 'admin')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data as $paket)
                                    <tr>
                                        <td width="5%">{{ $no++ }}</td>
                                        <td>{{ $paket->outlet->nama }}</td>
                                        <td>
                                            @if ($paket->jenis == 'kiloan')
                                                Kiloan
                                            @elseif ($paket->jenis == 'selimut')
                                                Selimut
                                            @elseif ($paket->jenis == 'bed_cover')
                                                Bed Cover
                                            @elseif ($paket->jenis == 'kaos')
                                                Kaos
                                            @elseif ($paket->jenis == 'lain')
                                                Lain-lain
                                            @endif
                                        </td>
                                        <td>{{ $paket->nama_paket }}</td>
                                        <td>Rp. {{ number_format($paket->harga, 0, ',', '.') }}</td>
                                        @if (Auth::user()->role == 'admin')
                                            <td>
                                                <button type="button" id="edit" data-bs-toggle="modal"
                                                    class="bg-warning" data-bs-target="#editModal"
                                                    data-id="{{ $paket->id }}" data-nama="{{ $paket->outlet->nama }}"
                                                    data-jenis="{{ $paket->jenis }}"
                                                    data-nama_paket="{{ $paket->nama_paket }}"
                                                    data-harga="{{ $paket->harga }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-edit text-light">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                </button>
                                                <button type="button" id="hapus" data-bs-toggle="modal"
                                                    class="bg-danger" data-bs-target="#hapusModal"
                                                    data-id="{{ $paket->id }}" data-nama="{{ $paket->outlet->nama }}">
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

    {{-- <div class="page-header d-print-none">
        <div class="container-xl">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table User</h3>
                        <div class="p-2 g-col-6 ms-auto">
                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                                <a href="#" class="btn bg-primary-lt me-2" data-bs-toggle="modal"
                                    data-bs-target="#tambahModal">
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
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Outlet</th>
                                    <th>Jenis</th>
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data as $paket)
                                    <tr>
                                        <td width="5%">{{ $no++ }}</td>
                                        <td>{{ $paket->outlet->nama }}</td>
                                        <td>
                                            @if ($paket->jenis = 'kiloan')
                                                Kiloan
                                            @elseif ($paket->jenis = 'selimut')
                                                Selimut
                                            @elseif ($paket->jenis = 'bed_cover')
                                                Bed Cover
                                            @elseif ($paket->jenis = 'kaos')
                                                Kaos
                                            @elseif ($paket->jenis = 'lain')
                                                Lain-lain
                                            @endif
                                        </td>
                                        <td>{{ $paket->nama_paket }}</td>
                                        <td>Rp. {{ number_format($paket->harga, 0, ',', '.') }}</td>
                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                                            <td>
                                                <button type="button" id="edit" data-bs-toggle="modal"
                                                    class="bg-warning" data-bs-target="#editModal"
                                                    data-id="{{ $paket->id }}" data-nama="{{ $paket->outlet->nama }}"
                                                    data-jenis="{{ $paket->jenis }}"
                                                    data-nama_paket="{{ $paket->nama_paket }}"
                                                    data-harga="{{ $paket->harga }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-edit text-light">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                </button>
                                                <button type="button" id="hapus" data-bs-toggle="modal"
                                                    class="bg-danger" data-bs-target="#hapusModal"
                                                    data-id="{{ $paket->id }}" data-nama="{{ $paket->outlet->nama }}">
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
    </div> --}}

    {{-- modal tambah --}}
    <div class="modal modal-blur fade" id="tambahModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah_paket') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="form-label">Outlet</div>
                            <input type="input" class="form-control" placeholder="Outlet"
                                value="{{ Auth::user()->outlet->nama }}" readonly>
                            <input type="hidden" name="id_outlet" value="{{ Auth::user()->id_outlet }}">
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Jenis</div>
                            <select class="form-select" name="jenis">
                                <option value="kiloan">Kiloan</option>
                                <option value="selimut">Selimut</option>
                                <option value="bed_cover">Bed Cover</option>
                                <option value="kaos">Kaos</option>
                                <option value="lain">Lain-lain</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" name="nama_paket" placeholder="Nama Paket">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" class="form-control" id="harga" name="harga"
                                    placeholder="Harga">
                            </div>
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

    {{-- modal hapus --}}
    <div class="modal modal-blur fade" id="hapusModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <form action="{{ route('hapus_paket') }}" method="POST">
                    @csrf
                    <input type="hidden" id="idhapus" name="id">
                    <div class="modal-body text-center mt-5 py-4">
                        <h3>Apakah anda yakin menghapus data paket <span id="namaa" class="text-danger"></span>?
                            Tindakan ini akan menghapus permanen data transaksi tanpa bisa dikembalikan. </h3>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-3 w-100" data-bs-dismiss="modal">
                                        Cancel
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
                    <h5 class="modal-title">Edit Data Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit_paket') }}" method="POST">
                        @csrf
                        <input type="hidden" id="ide" name="id">
                        <div class="mb-3">
                            <div class="form-label">Outlet</div>
                            <input type="input" class="form-control" placeholder="Outlet"
                                value="{{ Auth::user()->outlet->nama }}" readonly>
                            <input type="hidden" name="id_outlet" value="{{ Auth::user()->id_outlet }}">
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Jenis</div>
                            <select class="form-select" id="jenise" name="jenis">
                                <option value="kiloan" {{ isset($paket) && $paket->jenis == 'kiloan' ? 'selected' : '' }}>
                                    Kiloan</option>
                                <option value="selimut"
                                    {{ isset($paket) && $paket->jenis == 'selimut' ? 'selected' : '' }}>
                                    Selimut</option>
                                <option value="bed_cover"
                                    {{ isset($paket) && $paket->jenis == 'bed_cover' ? 'selected' : '' }}>Bed Cover
                                </option>
                                <option value="kaos" {{ isset($paket) && $paket->jenis == 'kaos' ? 'selected' : '' }}>
                                    Kaos
                                </option>
                                <option value="lain" {{ isset($paket) && $paket->jenis == 'lain' ? 'selected' : '' }}>
                                    Lain-lain</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" id="nama_pakete" name="nama_paket"
                                placeholder="Nama Paket">
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" class="form-control" id="hargae" name="harga"
                                        placeholder="Harga">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary  btn-3" data-bs-dismiss="modal">
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
            var nama = $(this).attr("data-nama");
            $('#idhapus').val(id)
            $('#namaa').text(nama)
        });
    </script>

    <script>
        setTimeout(function() {
            let alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 500); // Hapus elemen setelah efek fade
            }
        }, 3000); // 3 detik
    </script>
@endsection
