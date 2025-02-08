@extends('template.main')
@section('konten')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table Member</h3>
                        <div class="p-2 g-col-6  ms-auto">
                            <a href="#" class="btn btn-primary btn-5 d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#tambahModal">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-2">
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Tambah Data Member
                            </a>
                        </div>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-secondary">
                                Show
                                <div class="mx-2 d-inline-block">
                                    <input type="text" class="form-control form-control-sm" value="8" size="3"
                                        aria-label="Invoices count">
                                </div>
                                entries
                            </div>
                            <div class="ms-auto text-secondary">
                                Search:
                                <div class="ms-2 d-inline-block">
                                    <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No. Telp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data as $user)
                                    <tr>
                                        <td width="5%">{{ $no++ }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->alamat }}</td>
                                        <td>
                                            @if ($user->jenis_kelamin == 'P')
                                                Perempuan
                                            @else
                                                Laki-laki
                                            @endif
                                        </td>
                                        <td>{{ $user->tlp }}</td>
                                        <td>
                                            <button type="button" id="edit" data-bs-toggle="modal" class="bg-warning"
                                                data-bs-target="#editModal" data-id="{{ $user->id }}"
                                                data-nama="{{ $user->nama }}" data-username="{{ $user->alamat }}"
                                                data-role="{{ $user->jenis_kelamin }}" data-outlet="{{ $user->tlp }}"">
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
                                                data-bs-target="#hapusModal" data-id="{{ $user->id }}">
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-secondary">Showing <span>1</span> to <span>8</span> of <span>16</span> entries
                        </p>
                        <ul class="pagination m-0 ms-auto">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 6l-6 6l6 6" />
                                    </svg>
                                    prev
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 6l6 6l-6 6" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
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
                    <h5 class="modal-title">Tambah Data Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah_member') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat
                                <textarea class="form-control" name="alamat" rows="5" placeholder="Alamat"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Jenis Kelamin</div>
                            <select class="form-select" name="jenis_kelamin">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telp</label>
                            <input type="text" class="form-control" name="tlp" placeholder="No. Telp">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary  btn-3" data-bs-dismiss="modal">
                                Batal
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
                <form action="{{ route('hapus_member') }}" method="POST">
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
                    <h5 class="modal-title">Edit Data Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit_member') }}" method="POST">
                        @csrf
                        <input type="hidden" id="ide" name="id">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat
                                <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Jenis Kelamin</div>
                            <select class="form-select" id="jk" name="jenis_kelamin">
                                <option value="L" {{ isset($user) && $user->jenis == 'L' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="P" {{ isset($user) && $user->jenis == 'P' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telp</label>
                            <input type="text" class="form-control" id="tlp" name="tlp"
                                placeholder="No. Telp">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary  btn-3" data-bs-dismiss="modal">
                                Batal
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

    {{-- modal transaksi --}}
    <div class="modal modal-blur fade" id="tambahModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah_member') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat
                                <textarea class="form-control" name="alamat" rows="5" placeholder="Alamat"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Jenis Kelamin</div>
                            <select class="form-select" name="jenis_kelamin">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telp</label>
                            <input type="text" class="form-control" name="tlp" placeholder="No. Telp">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary  btn-3" data-bs-dismiss="modal">
                                Batal
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
    {{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script> --}}
    {{-- <script src="/dist/js/jquery.js" defer></script> --}}

    <script>
        $(document).on('click', '#edit', function(e) {
            var id = $(this).attr("data-id");
            var nama = $(this).attr("data-nama");
            var username = $(this).attr("data-username");
            var role = $(this).attr("data-role");
            var outlet = $(this).attr("data-outlet");
            $('#ide').val(id);
            $('#nama').val(nama);
            $('#alamat').val(username);
            $('#jk').val(role);
            $('#tlp').val(outlet);
        });


        $(document).on('click', '#hapus', function(e) {
            var id = $(this).attr("data-id");
            $('#idhapus').val(id)
        });
    </script>
@endsection
