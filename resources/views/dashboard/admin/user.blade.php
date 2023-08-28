@extends('dashboard.layout.main')

@section('main')
    <div class="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="ticketsList">
                            <div class="card-header border-0">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title mb-0 flex-grow-1">Data Siswa</h5>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-wrap gap-2">
                                            <button class="btn btn-danger add-btn" data-bs-toggle="modal"
                                                data-bs-target="#showModal">
                                                <i class="ri-add-line align-bottom me-1"></i> Tambahkan
                                            </button>
                                            <button class="btn btn-secondary" id="remove-actions"
                                                onClick="deleteMultiple()">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border border-dashed border-end-0 border-start-0">
                                <form>
                                    <div class="row g-3">
                                        <div class="col-xxl-5 col-sm-12">
                                            <div class="search-box">
                                                <input type="text" class="form-control search bg-light border-light"
                                                    placeholder="Search for ticket details or something..." />
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-xxl-3 col-sm-4">
                                            <input type="text" class="form-control bg-light border-light"
                                                data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true"
                                                id="demo-datepicker" placeholder="Select date range" />
                                        </div>
                                        <!--end col-->

                                        <div class="col-xxl-3 col-sm-4">
                                            <div class="input-light">
                                                <select class="form-control" data-choices data-choices-search-false
                                                    name="choices-single-default" id="idStatus">
                                                    <option value="all" selected>All</option>
                                                    <option value="Open">Active</option>
                                                    <option value="Inprogress">Nonaktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-1 col-sm-4">
                                            <button type="button" class="btn btn-primary w-100" onclick="SearchData();">
                                                <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                                Filters
                                            </button>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <!--end card-body-->
                            <div class="card-body">
                                <div class="table-responsive table-card mb-4">
                                    <table class="table align-middle table-nowrap mb-0" id="ticketTable">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 40px">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option" />
                                                    </div>
                                                </th>
                                                <th class="sort" data-sort="id">No.</th>
                                                <th class="sort" data-sort="tasks_name">Nama</th>
                                                <th class="sort" data-sort="client_name">Asal Sekolah</th>
                                                <th class="sort" data-sort="assignedto">Jumlah Hadir</th>
                                                <th class="sort" data-sort="assignedto">Jumlah Absen</th>
                                                <th class="sort" data-sort="create_date">Tanggal Mulai</th>
                                                <th class="sort" data-sort="due_date">Tanggal Berakhir</th>
                                                <th class="sort" data-sort="status">Status</th>
                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all" id="ticket-list-data">
                                            @foreach ($students as $student)
                                                <tr>
                                                    <th scope="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="checkAll"
                                                                value="option1" />
                                                        </div>
                                                    </th>
                                                    <td class="id">
                                                        <a href="javascript:void(0);" onclick="ViewTickets(this)"
                                                            data-id="001"
                                                            class="fw-medium link-primary">{{ $student->id }}</a>
                                                    </td>
                                                    <td class="tasks_name">
                                                        {{ $student->name }}
                                                    </td>
                                                    <td class="client_name">{{ $student->school->school }}</td>
                                                    <td class="assignedto">Belum diketahui</td>
                                                    <td class="create_date">Belum diketahui</td>
                                                    <td class="due_date">{{ $student->start_date }}</td>
                                                    <td class="due_date">{{ $student->end_date }}</td>
                                                    <td class="status">
                                                        <span
                                                            class="badge @if ($student->isActive === 'Nonactive') badge-soft-danger @endif badge-soft-success text-uppercase">{{ $student->isActive }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-soft-secondary btn-sm dropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="ri-more-fill align-middle"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li>
                                                                    <button class="dropdown-item"
                                                                        onclick="location.href = 'apps-tickets-details.html';">
                                                                        <i
                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                        View
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item edit-item-btn"
                                                                        href="#showModal" data-bs-toggle="modal"><i
                                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                        Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item remove-item-btn"
                                                                        data-bs-toggle="modal" href="#deleteOrder">
                                                                        <i
                                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                        Delete
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a"
                                                style="width: 75px; height: 75px">
                                            </lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">
                                                We've searched more than 150+ Tickets We did not
                                                find any Tickets for you search.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#"> Next </a>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body p-5 text-center">
                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                    colors="primary:#405189,secondary:#f06548"
                                                    style="width: 90px; height: 90px">
                                                </lord-icon>
                                                <div class="mt-4 text-center">
                                                    <h4>You are about to delete a order ?</h4>
                                                    <p class="text-muted fs-14 mb-4">
                                                        Deleting your order will remove all of your
                                                        information from our database.
                                                    </p>
                                                    <div class="hstack gap-2 justify-content-center remove">
                                                        <button
                                                            class="btn btn-link link-success fw-medium text-decoration-none"
                                                            id="deleteRecord-close" data-bs-dismiss="modal">
                                                            <i class="ri-close-line me-1 align-middle"></i>
                                                            Close
                                                        </button>
                                                        <button class="btn btn-danger" id="delete-record">
                                                            Yes, Delete It
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end modal -->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>

                <div class="modal fade zoomIn" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0">
                            <div class="modal-header p-3 bg-soft-info">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                            </div>
                            <form action="/user" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-lg-12">
                                            <div>
                                                <label for="name" class="form-label">Nama</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Nama" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div>
                                                <label for="school_id" class="form-label">Asal Sekolah</label>
                                                <select class="form-control" data-plugin="choices" name="school_id"
                                                    id="school_id">
                                                    @foreach ($schools as $school)
                                                        <option value="{{ $school->id }}">{{ $school->school }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div>
                                                <label for="gender" class="form-label">Gender</label>
                                                <select class="form-control" data-plugin="choices" name="gender"
                                                    id="gender">
                                                    <option value="pria" selected>Laki-Laki</option>
                                                    <option value="wanita">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" id="username" class="form-control"
                                                    placeholder="Username" name="username" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" id="password" name="password"
                                                    class="form-control" placeholder="Password" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control"
                                                data-provider="flatpickr" data-date-format="d M, Y" required />
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="end_date" class="form-label">Tanggal Berakhir</label>
                                            <input type="date" id="end_date" name="end_date" class="form-control"
                                                data-provider="flatpickr" data-date-format="d M, Y" required />
                                        </div>
                                        <div class="col-lg-12">
                                            <div>
                                                <label for="isActive" class="form-label">Status</label>
                                                <select class="form-control" data-plugin="choices" name="isActive"
                                                    id="isActive">
                                                    <option value="Active" selected>Aktif</option>
                                                    <option value="Nonactive">Selesai</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-success">Add Ticket</button>
                                            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
