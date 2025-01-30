@extends('template.main')
@section('konten')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="d-flex justify-content-between">
                    <div class="p-2 g-col-6">
                        <h2 class="page-title">
                            Table Outlet
                        </h2>
                    </div>
                    <div class="p-2 g-col-6">
                        <a class="btn btn-primary btn-5 d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#tambahModal">
                            <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-2">
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Tambah Data Outlet
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Outlet</th>
                                        <th>Alamat</th>
                                        <th>No. Telp</th>
                                        <th width="">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($data as $outlet)
                                        <tr>
                                            <td width="5%">{{ $no++ }}</td>

                                            <td>{{ $outlet->nama }}</td>
                                            <td>{{ $outlet->alamat }}</td>
                                            <td>{{ $outlet->tlp }}</td>
                                            <td>
                                                <button type="button" id="edit" data-bs-toggle="modal"
                                                    class="bg-warning" data-bs-target="#editModal"
                                                    data-id="{{ $outlet->id }}" data-nama="{{ $outlet->nama }}"
                                                    data-alamat="{{ $outlet->alamat }}" data-tlp="{{ $outlet->tlp }}">
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
                                                    data-id="{{ $outlet->id }}">
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
                    </div>
                </div>
            </div>

        </div>

        {{-- modal tambah --}}
        <div class="modal modal-blur fade" id="tambahModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Outlet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tambah_outlet') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Outlet</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Outlet">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Nama Outlet">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No. Telp</label>
                                <input type="text" class="form-control" name="tlp" placeholder="Nama Outlet">
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

        {{-- modal edit --}}
        <div class="modal modal-blur fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Outlet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('edit_outlet') }}" method="POST">
                            @csrf
                            <input type="hidden" id="ide" name="id">
                            <div class="mb-3">
                                <label class="form-label">Nama Outlet</label>
                                <input type="text" class="form-control" id="namae" name="nama" placeholder="Nama Outlet">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamate" name="alamat" placeholder="Nama Outlet">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No. Telp</label>
                                <input type="text" class="form-control" id="tlpe" name="tlp" placeholder="Nama Outlet">
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

        {{-- modal hapus --}}
        <div class="modal modal-blur fade" id="hapusModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <form action="{{ route('hapus_outlet') }}" method="POST">
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
                                            Cancel
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-danger btn-4 w-100"
                                            data-bs-dismiss="modal">
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
    </div>

    <script src="/dist/js/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script> --}}
    {{-- <script src="/dist/js/jquery.js" defer></script> --}}

    <script>
        $(document).on('click', '#edit', function(e) {
            var id = $(this).attr("data-id");
            var nama = $(this).attr("data-nama");
            var alamat = $(this).attr("data-alamat");
            var tlp = $(this).attr("data-tlp");
            $('#ide').val(id);
            $('#namae').val(nama);
            $('#alamate').val(alamat);
            $('#tlpe').val(tlp);
        });


        $(document).on('click', '#hapus', function(e) {
            var id = $(this).attr("data-id");
            $('#idhapus').val(id)
        });
    </script>
@endsection
