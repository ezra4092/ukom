@extends('template.main')
@section('konten')
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <h2 class="page-title">
                                Dashboard
                            </h2>
                            <div class="page-pretitle">
                                Tanggal
                            </div>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary btn-5 d-none d-sm-inline-block"
                                    data-bs-toggle="modal" data-bs-target="#modal-report">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-2">
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Create new report
                                </a>
                                <a href="#" class="btn btn-primary btn-6 d-sm-none btn-icon"
                                    data-bs-toggle="modal" data-bs-target="#modal-report"
                                    aria-label="Create new report">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-2">
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                </a>
                            </div>
                            <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">New report</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control"
                                                    name="example-text-input" placeholder="Your report name">
                                            </div>
                                            <label class="form-label">Report type</label>
                                            <div class="form-selectgroup-boxes row mb-3">
                                                <div class="col-lg-6">
                                                    <label class="form-selectgroup-item">
                                                        <input type="radio" name="report-type" value="1"
                                                            class="form-selectgroup-input" checked>
                                                        <span
                                                            class="form-selectgroup-label d-flex align-items-center p-3">
                                                            <span class="me-3">
                                                                <span class="form-selectgroup-check"></span>
                                                            </span>
                                                            <span class="form-selectgroup-label-content">
                                                                <span
                                                                    class="form-selectgroup-title strong mb-1">Simple</span>
                                                                <span class="d-block text-secondary">Provide only
                                                                    basic data needed for the report</span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-selectgroup-item">
                                                        <input type="radio" name="report-type" value="1"
                                                            class="form-selectgroup-input">
                                                        <span
                                                            class="form-selectgroup-label d-flex align-items-center p-3">
                                                            <span class="me-3">
                                                                <span class="form-selectgroup-check"></span>
                                                            </span>
                                                            <span class="form-selectgroup-label-content">
                                                                <span
                                                                    class="form-selectgroup-title strong mb-1">Advanced</span>
                                                                <span class="d-block text-secondary">Insert charts and
                                                                    additional advanced analyses to be inserted in the
                                                                    report</span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="mb-3">
                                                        <label class="form-label">Report url</label>
                                                        <div class="input-group input-group-flat">
                                                            <span class="input-group-text">
                                                                https://tabler.io/reports/
                                                            </span>
                                                            <input type="text" class="form-control ps-0"
                                                                value="report-01" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Visibility</label>
                                                        <select class="form-select">
                                                            <option value="1" selected>Private</option>
                                                            <option value="2">Public</option>
                                                            <option value="3">Hidden</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Client name</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Reporting period</label>
                                                        <input type="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div>
                                                        <label class="form-label">Additional information</label>
                                                        <textarea class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-link link-secondary btn-3"
                                                data-bs-dismiss="modal">
                                                Cancel
                                            </a>
                                            <a href="#" class="btn btn-primary btn-5 ms-auto"
                                                data-bs-dismiss="modal">
                                                <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="icon icon-2">
                                                    <path d="M12 5l0 14" />
                                                    <path d="M5 12l14 0" />
                                                </svg>
                                                Create new report
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        <div class="col-12">
                            <div class="row row-cards">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-primary text-white avatar">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-1">
                                                            <path
                                                                d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                                            <path d="M12 3v3m0 12v3" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        132 Sales
                                                    </div>
                                                    <div class="text-secondary">
                                                        12 waiting payments
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-green text-white avatar">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/shopping-cart -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
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
                                                        78 Orders
                                                    </div>
                                                    <div class="text-secondary">
                                                        32 shipped
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-x text-white avatar">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/brand-x -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-1">
                                                            <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                                            <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        623 Shares
                                                    </div>
                                                    <div class="text-secondary">
                                                        16 today
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-facebook text-white avatar">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/brand-facebook -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-1">
                                                            <path
                                                                d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        132 Likes
                                                    </div>
                                                    <div class="text-secondary">
                                                        21 today
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
