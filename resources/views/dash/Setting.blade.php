<!DOCTYPE html>
<html lang="en">

<head>
    <title>Settings</title>
    @include('layouts.heads')
</head>

<body class="body">
    <div id="toast-container"></div>
    <div class="app-container container-xxl mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10 col-12">
                <!--begin header-->
                <div class="risk-header text-white p-4 mb-5">
                    <div class="position-relative z-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap">
                            <div class="mb-4 mb-md-0">
                                <div class="d-flex align-items-center mb-3">
                                    <h1 class="h2 mb-0">
                                        <i class="bi bi-gear-fill fs-2 section-icon me-3"></i>
                                        System Settings
                                    </h1>
                                </div>
                                <div class="d-flex flex-wrap gap-4">
                                    <div>
                                        <small class="text-white-80 d-block">Tracker Models</small>
                                        <div class="fw-semibold fs-5">248</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">API Configurations</small>
                                        <div class="fw-semibold fs-5">215</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">Commission Configurations</small>
                                        <div class="fw-semibold fs-5">32</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <div class="text-end mb-3">
                                    <small class="text-white-80 d-block">Last Updated</small>
                                    <div class="fw-semibold">10-Nov-2023</div>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ url('dash/index') }}">
                                        <button class="btn btn-sm btn-outline-light rounded-pill px-3">
                                            <i class="bi bi-house me-1"></i> Dashboard
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of header-->

                <!-- Tracker Models Section -->
                <div class="card card-flush mb-2">
                    <div class="card-header d-flex justify-content-between align-items-center pt-2">
                        <div>
                            <h3 class="mt-2 text-warning mb-0">Manage Tracker Models</h3>
                        </div>
                        <button class="btn btn-sm text-white" style="background-color:#2E3192;" data-bs-toggle="modal"
                            data-bs-target="#uploadModal">
                            <i class="bi bi-upload me-1"></i> Add Model
                        </button>
                        <button class="btn btn-sm text-white justif" style="background-color:#2E3192;"
                            data-bs-toggle="modal" data-bs-target="#distributeModal">
                            <i class="bi bi-arrows-move me-1"></i> Distribute
                        </button>
                    </div>


                    <div class="card-body pt-6">
                        <div class="table-responsive">
                            <table class="table table align-items-center border-warning" id="trackersTable">
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2">
                                        <th class="min-w-100px text-center">SN</th>
                                        <th class="min-w-100px text-center">Device Name</th>
                                        <th class="min-w-150px text-center">Imei</th>
                                        <th class="min-w-150px text-center">Company</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trackers as $tracker)
                                        <tr class="fs-4 border-bottom-2 justify-content-center">
                                            <td class="text-gray-600 fs-6 text-center">{{ $loop->iteration }}</td>
                                            <td class="text-gray-600 fs-6 text-center">{{ $tracker->device_name }}</td>
                                            <td class="text-gray-600 fs-6 text-center">{{ $tracker->imei }}</td>
                                            <td class="text-gray-600 fs-6 text-center">{{ $tracker->company }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">No device found. Please upload.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- API Configurations Section -->
                <div class="card card-flush mb-5">
                    <div class="card-header pt-2">
                        <h3 class="mt-3 text-warning">API Configurations</h3>
                    </div>

                    <div class="card-body pt-6">
                        <div class="table-responsive">
                            <table class="table table align-items-center border-warning" id="apiTable">
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2">
                                        <th class="min-w-100px text-center">API ID</th>
                                        <th class="min-w-200px text-center">API Name</th>
                                        <th class="min-w-150px text-center">Endpoint</th>
                                        <th class="min-w-100px text-center">Status</th>
                                        <th class="min-w-200px text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="fs-4 border-bottom-2 justify-content-center">
                                        <td class="text-gray-600 fs-6 text-center">API-1001</td>
                                        <td class="text-gray-600 fs-6 text-center">GPS Tracking API</td>
                                        <td class="text-gray-600 fs-6 text-center">/api/v1/tracking</td>
                                        <td class="fs-6 text-center">
                                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                                <i class="bi bi-check-circle-fill me-1"></i> Active
                                            </span>
                                        </td>
                                        <td class="text-center gap-3">
                                            <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#viewApiModal">
                                                <i class="bi bi-eye"></i> View
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning me-2" data-bs-toggle="modal"
                                                data-bs-target="#editApiModal">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Commission Configurations Section -->
                <div class="card card-flush">
                    <div class="card-header pt-2">
                        <h3 class="text-warning mt-3">Commission Configurations</h3>
                    </div>

                    <div class="card-body pt-6">
                        <div class="table-responsive">
                            <table class="table table align-items-center border-warning" id="commissionTable">
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2">
                                        <th class="min-w-100px text-center">Tier</th>
                                        <th class="min-w-150px text-center">Commission Type</th>
                                        <th class="min-w-100px text-center">Rate (%)</th>
                                        <th class="min-w-150px text-center">Applicable To</th>
                                        <th class="min-w-100px text-center">Status</th>
                                        <th class="min-w-150px text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="fs-4 border-bottom-2 justify-content-center">
                                        <td class="text-gray-600 fs-6 text-center">1</td>
                                        <td class="text-gray-600 fs-6 text-center">Standard</td>
                                        <td class="text-gray-600 fs-6 text-center">5.0%</td>
                                        <td class="text-gray-600 fs-6 text-center">All Products</td>
                                        <td class="fs-6 text-center">
                                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                                <i class="bi bi-check-circle-fill me-1"></i> Active
                                            </span>
                                        </td>
                                        <td class="text-center gap-3">
                                            <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#viewCommissionModal">
                                                <i class="bi bi-eye"></i> View
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning me-2" data-bs-toggle="modal"
                                                data-bs-target="#editCommissionModal">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Tracker Model Modal -->
    <div class="modal fade" id="addModelModal" tabindex="-1" aria-labelledby="addModelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #2E3192;">
                    <h5 class="modal-title" id="addModelModalLabel">Add New Tracker Model</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="addModelForm">
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Model Name</label>
                            <input type="text" class="form-control" placeholder="Enter model name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Model ID</label>
                            <input type="text" class="form-control" placeholder="Auto-generated" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Enter model description"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Manufacturer</label>
                            <input type="text" class="form-control" placeholder="Enter manufacturer">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Firmware Version</label>
                            <input type="text" class="form-control" placeholder="Enter firmware version">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Initial Status</label>
                            <select class="form-select" required>
                                <option value="Active" selected>Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #2E3192; color: white;">Add Model</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Tracker Model Modal -->
    <div class="modal fade" id="editModelModal" tabindex="-1" aria-labelledby="editModelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #2E3192;">
                    <h5 class="modal-title" id="editModelModalLabel">Edit Tracker Model</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="editModelForm">
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Model ID</label>
                            <input type="text" class="form-control" value="TRK-1001" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Model Name</label>
                            <input type="text" class="form-control" value="Standard GPS Tracker" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3">Basic GPS tracking model</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Manufacturer</label>
                            <input type="text" class="form-control" value="TrackTech Inc.">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Firmware Version</label>
                            <input type="text" class="form-control" value="v2.5.1">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" required>
                                <option value="Active" selected>Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #2E3192; color: white;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Tracker Model Modal -->
    <div class="modal fade" id="deleteModelModal" tabindex="-1" aria-labelledby="deleteModelModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModelModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the tracker model <strong>Standard GPS Tracker
                            (TRK-1001)</strong>?</p>
                    <p class="text-danger">This action cannot be undone and will affect all devices using this model.
                    </p>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="confirmModelDelete">
                        <label class="form-check-label" for="confirmModelDelete">
                            I understand this action is irreversible
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>-->
                    <button type="button" class="btn btn-danger" id="confirmModelDeleteBtn" disabled>Delete
                        Model</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View API Modal -->
    <div class="modal fade" id="viewApiModal" tabindex="-1" aria-labelledby="viewApiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #2E3192;">
                    <h5 class="modal-title" id="viewApiModalLabel">API Configuration Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="bi bi-code-square" style="font-size: 5rem; color: #2E3192;"></i>
                            </div>
                            <h5>GPS Tracking API</h5>
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i> Active
                            </span>
                        </div>
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">API ID</label>
                                    <p>API-1001</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Endpoint</label>
                                    <p>/api/v1/tracking</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Authentication Type</label>
                                    <p>Bearer Token</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Rate Limit</label>
                                    <p>1000 requests/minute</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Last Updated</label>
                                    <p>15-Jan-2024</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Documentation</label>
                                    <p><a href="#">API Docs</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" style="background-color: #2E3192; color: white;"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit API Modal -->
    <div class="modal fade" id="editApiModal" tabindex="-1" aria-labelledby="editApiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #2E3192;">
                    <h5 class="modal-title" id="editApiModalLabel">Edit API Configuration</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="editApiForm">
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">API ID</label>
                            <input type="text" class="form-control" value="API-1001" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">API Name</label>
                            <input type="text" class="form-control" value="GPS Tracking API" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Endpoint</label>
                            <input type="text" class="form-control" value="/api/v1/tracking" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Authentication Type</label>
                            <select class="form-select" required>
                                <option value="Bearer Token" selected>Bearer Token</option>
                                <option value="API Key">API Key</option>
                                <option value="OAuth">OAuth</option>
                                <option value="Basic Auth">Basic Auth</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Rate Limit</label>
                            <input type="text" class="form-control" value="1000 requests/minute">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" required>
                                <option value="Active" selected>Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary"
                            style="background-color: #2E3192; color: white;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Commission Modal -->
    <div class="modal fade" id="viewCommissionModal" tabindex="-1" aria-labelledby="viewCommissionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #2E3192;">
                    <h5 class="modal-title" id="viewCommissionModalLabel">Commission Configuration Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="bi bi-percent" style="font-size: 5rem; color: #2E3192;"></i>
                            </div>
                            <h5>Standard Commission</h5>
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i> Active
                            </span>
                        </div>
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tier</label>
                                    <p>1</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Commission Rate</label>
                                    <p>5.0%</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Applicable To</label>
                                    <p>All Products</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Minimum Threshold</label>
                                    <p>TZS 100,000</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Effective Date</label>
                                    <p>01-Jan-2024</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Review Date</label>
                                    <p>01-Jul-2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" style="background-color: #2E3192; color: white;"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Commission Modal -->
    <div class="modal fade" id="editCommissionModal" tabindex="-1" aria-labelledby="editCommissionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #2E3192;">
                    <h5 class="modal-title" id="editCommissionModalLabel">Edit Commission Configuration</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="editCommissionForm">
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tier</label>
                            <input type="text" class="form-control" value="1" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Commission Type</label>
                            <input type="text" class="form-control" value="Standard" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Rate (%)</label>
                            <input type="number" step="0.1" class="form-control" value="5.0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Applicable To</label>
                            <select class="form-select" required>
                                <option value="All Products" selected>All Products</option>
                                <option value="Select Products">Select Products</option>
                                <option value="Specific Categories">Specific Categories</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Minimum Threshold (TZS)</label>
                            <input type="number" class="form-control" value="100000">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" required>
                                <option value="Active" selected>Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Pending Review">Pending Review</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary text-white" style="background-color: #2E3192;">Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize DataTables
            $('#trackersTable, #apiTable, #commissionTable').DataTable({
                responsive: true,
                pageLength: 4,
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        previous: "<i class='bi bi-chevron-left'></i>",
                        next: "<i class='bi bi-chevron-right'></i>"
                    }
                }
            });

            // Enable delete buttons only when checkbox is checked
            $('#confirmModelDelete').change(function () {
                $('#confirmModelDeleteBtn').prop('disabled', !$(this).is(':checked'));
            });

            // Form submission handlers with relevant toast messages
            $('#addModelForm').on('submit', function (e) {
                e.preventDefault();
                $('#addModelModal').modal('hide');
                showNotification('New tracker model added successfully!', 'success');
            });

            $('#editModelForm').on('submit', function (e) {
                e.preventDefault();
                $('#editModelModal').modal('hide');
                showNotification('Tracker model updated successfully!', 'success');
            });

            $('#confirmModelDeleteBtn').on('click', function () {
                $('#deleteModelModal').modal('hide');
                showNotification('Tracker model has been deleted.', 'danger');
            });

            $('#editApiForm').on('submit', function (e) {
                e.preventDefault();
                $('#editApiModal').modal('hide');
                showNotification('API configuration updated successfully!', 'success');
            });

            $('#editCommissionForm').on('submit', function (e) {
                e.preventDefault();
                $('#editCommissionModal').modal('hide');
                showNotification('Commission configuration updated successfully!', 'success');
            });

            // Toast notification function
            function showNotification(message, type) {
                const toastContainer = document.getElementById('toast-container');

                const toast = document.createElement('div');
                toast.className = `toast show align-items-center custom-toast toast-${type} bg-light border-0`;
                toast.setAttribute('role', 'alert');
                toast.setAttribute('aria-live', 'assertive');
                toast.setAttribute('aria-atomic', 'true');

                // Set icon based on type
                let icon = 'bi-info-circle';
                let iconColor = 'text-info';
                if (type === 'success') {
                    icon = 'bi-check-circle';
                    iconColor = 'text-success';
                }
                if (type === 'danger') {
                    icon = 'bi-x-circle';
                    iconColor = 'text-danger';
                }
                if (type === 'warning') {
                    icon = 'bi-exclamation-triangle';
                    iconColor = 'text-warning';
                }

                toast.innerHTML = `
                    <div class="d-flex align-items-center px-3 py-2">
                        <i class="bi ${icon} toast-icon ${iconColor}"></i>
                        <div class="toast-body">${message}</div>
                        <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                `;

                toastContainer.appendChild(toast);

                // Initialize Bootstrap Toast
                const bsToast = new bootstrap.Toast(toast, {
                    autohide: true,
                    delay: 5000
                });
                bsToast.show();

                // Remove toast after it's hidden
                toast.addEventListener('hidden.bs.toast', () => {
                    toast.remove();
                });

                // Allow clicking to dismiss
                toast.addEventListener('click', () => {
                    bsToast.hide();
                });
            }
        });
    </script>
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('dash.upload.excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Excel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary text-white">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="distributeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('dash.distribute') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Choose the distribution plan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Field 1: Distribution Plan -->
                        <label for="plan" class="form-label">Plan</label>
                        <select name="plan" id="plan" class="form-control">
                            <option value="all">All Users</option>
                            <option value="specific">Specific User</option>
                        </select>

                        <!-- Default: All Users -->
                        <label for="targetInput" class="form-label mt-3">Target</label>
                        <input type="text" id="targetInput" name="target" class="form-control" value="All Users"
                            readonly>

                        <!-- Datalist for Specific -->
                        <input type="text" id="targetSearch" name="target_user" class="form-control mt-2 d-none"
                            placeholder="Type name, email or number..." list="targetSelect">

                        <datalist id="targetSelect">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }} - {{ $user->email }}
                                </option>
                            @endforeach
                        </datalist>


                        <!-- Number input (only for specific user) -->
                        <input type="number" id="numberInput" name="number" class="form-control mt-2 d-none"
                            placeholder="Enter number...">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary text-white">Distribute</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const plan = document.getElementById("plan");
            const targetInput = document.getElementById("targetInput");
            const targetSearch = document.getElementById("targetSearch");
            const numberInput = document.getElementById("numberInput");

            plan.addEventListener("change", function () {
                if (this.value === "all") {
                    // Show "All Users"
                    targetInput.classList.remove("d-none");
                    targetInput.value = "All Users";
                    targetSearch.classList.add("d-none");
                    numberInput.classList.add("d-none");
                } else {
                    // Show user search + number input
                    targetInput.classList.add("d-none");
                    targetSearch.classList.remove("d-none");
                    numberInput.classList.remove("d-none");
                }
            });
        });
    </script>
    <script>

        $(document).ready(function () {
            $('.confirm-delete-checkbox').on('change', function () {
                let modal = $(this).closest('.modal');
                let btn = modal.find('.confirm-delete-btn');
                btn.prop('disabled', !$(this).is(':checked'));
            });
        });


        document.addEventListener('DOMContentLoaded', function () {
            const toastContainer = document.getElementById('toast-container');

            @if(session('success'))
                showNotification('{{ session('success') }}', 'success');
            @endif

            @if(session('error'))
                showNotification('{{ session('error') }}', 'danger');
            @endif

            @if(session('warning'))
                showNotification('{{ session('warning') }}', 'warning');
            @endif
});

        function showNotification(message, type) {
            const toastContainer = document.getElementById('toast-container');

            const toast = document.createElement('div');
            toast.className = `toast show align-items-center custom-toast toast-${type} bg-light border-0`;
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');

            // Set icon based on type
            let icon = 'bi-info-circle';
            let iconColor = 'text-info';
            if (type === 'success') {
                icon = 'bi-check-circle';
                iconColor = 'text-success';
            } else if (type === 'danger') {
                icon = 'bi-x-circle';
                iconColor = 'text-danger';
            } else if (type === 'warning') {
                icon = 'bi-exclamation-triangle';
                iconColor = 'text-warning';
            }

            toast.innerHTML = `
        <div class="d-flex align-items-center px-3 py-2">
            <i class="bi ${icon} toast-icon ${iconColor}"></i>
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    `;

            toastContainer.appendChild(toast);

            const bsToast = new bootstrap.Toast(toast, {
                autohide: true,
                delay: 5000
            });
            bsToast.show();

            toast.addEventListener('hidden.bs.toast', () => toast.remove());
            toast.addEventListener('click', () => bsToast.hide());
        }
    </script>

</body>

</html>