@extends('template.main')
@section('konten')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table User</h3>
                        <div class="p-2 g-col-6 ms-auto">
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
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Outlet</th>
                                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data as $user)
                                    <tr>
                                        <td width="5%">{{ $no++ }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->outlet->nama }}</td>
                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                                        <td>
                                            <button type="button" id="edit" data-bs-toggle="modal" class="bg-warning"
                                                data-bs-target="#editModal" data-id="{{ $user->id }}"
                                                data-nama="{{ $user->nama }}" data-username="{{ $user->username }}"
                                                data-password="{{ $user->password }}" data-role="{{ $user->role }}"
                                                data-outlet="{{ $user->id_outlet }}"">
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
                    <h5 class="modal-title">Tambah Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah_user') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Role</div>
                            <select class="form-select" name="role">
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                                <option value="owner">Owner</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Outlet</div>
                            <select class="form-select" name="id_outlet">
                                @foreach ($outlet as $o)
                                    <option value="{{ $o->id }}">{{ $o->nama }}</option>
                                @endforeach
                            </select>
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
                <form action="{{ route('hapus_user') }}" method="POST">
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
                    <h5 class="modal-title">Edit Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit_user') }}" method="POST">
                        @csrf
                        <input type="hidden" id="ide" name="id">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" id="namae" name="nama"
                                placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" id="usne" name="username"
                                placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="text-danger" style="font-size:10px">*Kosongkan jika password tidak ingin
                                diganti</span>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Role</div>
                            <select class="form-select" id="rolee" name="role">
                                <option value="admin" {{ isset($user) && $user->jenis == 'admin' ? 'selected' : '' }}>
                                    Admin</option>
                                <option value="kasir" {{ isset($user) && $user->jenis == 'kasir' ? 'selected' : '' }}>
                                    Kasir</option>
                                <option value="owner" {{ isset($user) && $user->jenis == 'owner' ? 'selected' : '' }}>
                                    Owner</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Outlet</div>
                            <select class="form-select" id="outlet" name="id_outlet">
                                @foreach ($outlet as $o)
                                    <option value="{{ $o->id }}">{{ $o->nama }}</option>
                                @endforeach
                            </select>
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

    <script src="/dist/js/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script> --}}
    {{-- <script src="/dist/js/jquery.js" defer></script> --}}

    <script>
        $(document).on('click', '#edit', function(e) {
            var id = $(this).attr("data-id");
            var nama = $(this).attr("data-nama");
            var username = $(this).attr("data-username");
            // var password = $(this).attr("data-password");
            var role = $(this).attr("data-role");
            var outlet = $(this).attr("data-outlet");
            $('#ide').val(id);
            $('#namae').val(nama);
            $('#usne').val(username);
            // $('#pwde').val(password);
            $('#rolee').val(role);
            $('#outlet').val(outlet);
        });


        $(document).on('click', '#hapus', function(e) {
            var id = $(this).attr("data-id");
            $('#idhapus').val(id)
        });
    </script>
@endsection
