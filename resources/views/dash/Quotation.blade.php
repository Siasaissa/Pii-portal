<!DOCTYPE html>
<html lang="en">
<title>Quotation</title>
@include('layouts.heads')

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
                                        <i class="bi bi-people-fill fs-2 section-icon me-3"></i>
                                        Customer Assignment
                                    </h1>
                                </div>
                                <div class="d-flex flex-wrap gap-4">
                                    <div>
                                        <small class="text-white-80 d-block">Total Customers</small>
                                        <div class="fw-semibold fs-5"></div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">Active Customers</small>
                                        <div class="fw-semibold fs-5"></div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">New this month</small>
                                        <div class="fw-semibold fs-5"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <div class="text-end mb-3">
                                    <small class="text-white-80 d-block">Last Updated</small>
                                    <div class="fw-semibold">10-Nov-2023</div>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ auth()->user()->role === 'admin' ? route('dash.index') : route('dash.dashboard') }}">
                                        <button class="btn btn-sm btn-outline-light rounded-pill px-3">
                                            <i class="bi bi-house me-1"></i> Dashboard
                                        </button>
                                    </a>
                                    <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                        <button class="btn btn-sm text-white" style="background-color: #2E3192;"
                                            data-bs-toggle="modal" data-bs-target="#addCustomerModal">
                                            <i class="fas fa-plus text-white"></i> Add Quotation
                                        </button>
                                    </div>
                                    <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                        <button class="btn btn-sm text-white" style="background-color: #2E3192;"
                                            id="exportReportBtn">
                                            <i class="fas fa-download text-white"></i> Export
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of header-->
                <!--begin::Table widget 14-->
                <div class="card card-flush">
                    <!--begin::Header-->
                    <div class="card-header pt-2">
                        <div id="toast-container"></div>
                    </div>

                    <div class="card-body pt-6">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table align-items-center border-warning" id="customersTable">
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2">
                                        <th class="min-w-100px text-center">ID</th>
                                        <th class="min-w-100px text-center">Customer Email</th>
                                        <th class="min-w-150px text-center">Device Imei</th>
                                        <th class="min-w-150px text-center">Assigned Day</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($CustomerAll as $Customer)
                                    <tr class="fs-4 border-bottom-2 justify-content-center">
                                        <td class="text-gray-600 fs-6 text-center">{{ $loop->iteration }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $Customer->customer_email }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $Customer->device_imei }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $Customer->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                </div>
                <!--end::Table widget 14-->
            </div>
        </div>
    </div>

    <!-- View Customer Modal -->

    <div class="modal fade" id="viewCustomerModal" tabindex="-1" aria-labelledby="viewCustomerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #F9A61A ;">
                    <h5 class="modal-title" id="viewCustomerModalLabel">Customer Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="bi bi-person-circle" style="font-size: 5rem; color: #2E3192;"></i>
                            </div>
                            <h5></h5>

                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i>
                            </span>

                            <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2">
                                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                            </span>

                            <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2">
                                <i class="bi bi-x-circle-fill me-1"></i>
                            </span>

                        </div>
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Customer ID</label>
                                    <p>CUS-0</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Phone</label>
                                    <p>+255 </p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email</label>
                                    <p></p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">ID Type</label>
                                    <p></p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">ID Number</label>
                                    <p></p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Date of Birth</label>
                                    <p></p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Gender</label>
                                    <p></p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Customer Since</label>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        style="color: white;">Close</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Edit Customer Modal -->

    <div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #F9A61A;">
                    <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer Information</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ID Type</label>
                            <select class="form-select" name="id_type" required>
                                <option value="NIDA">NIDA</option>
                                <option value="Passport">Passport</option>
                                <option value="Driving License">Driving License</option>
                                <option value="Voter ID">Voter ID</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ID Number</label>
                            <input type="text" class="form-control" name="id_no" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gender</label>
                            <select class="form-select" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="color:white;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Delete Customer Modal -->

    <div class="modal fade" id="deleteCustomerModal" tabindex="-1" aria-labelledby="deleteCustomerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteCustomerModalLabel">Confirm Customer Deletion</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="" method="post">

                    <div class="modal-body">
                        <p>Are you sure you want to delete the customer <strong>CUS-0</strong>?</p>
                        <p class="text-danger">This action will permanently remove all customer data and cannot be
                            undone.</p>
                        <div class="form-check mb-3">
                            <input class="form-check-input confirm-delete-checkbox" type="checkbox"
                                id="confirmDeleteCheckbox">
                            <label class="form-check-label" for="confirmDeleteCheckbox">
                                I understand this action is irreversible
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary bg-danger confirm-delete-btn" style="color: white;"
                            disabled>Delete Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Customer Modal -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header  text-white" style="background-color: #F9A61A;">
                    <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{ route('dash.Quotation.store') }}" method="POST">
                    @csrf

                    <!-- Select Customer -->
                     <div class="modal-body row g-3">
                    <div class="mb-3">
                        <label for="customer_email" class="form-label">Customer (Email)</label>
                        <input list="customers" id="customer_email" name="customer_email" class="form-control" required>
                        <datalist id="customers">
                            @foreach($customers as $customer)
                                <option value="{{ $customer->email }}">{{ $customer->name }} ({{ $customer->email }})</option>
                            @endforeach
                        </datalist>
                    </div>

                    <!-- Device -->
                    <div class="mb-3">
                        <label for="device_imei" class="form-label">Device (IMEI)</label>
                        <input list="devices" id="device_imei" name="device_imei" class="form-control" required>
                        <datalist id="devices">
                            @foreach($devices as $device)
                                <option value="{{ $device->imei }}">{{ $device->device_name }} ({{ $device->imei }})</option>
                            @endforeach
                        </datalist>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary text-white">Assign</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <!-- DataTable Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#customersTable').DataTable({
                "pageLength": 10,
                "responsive": true,
                "language": {
                    "search": "Search customers:",
                    "lengthMenu": "Show _MENU_ customers per page",
                    "info": "Showing _START_ to _END_ of _TOTAL_ customers",
                    "paginate": {
                        "previous": "<i class='bi bi-chevron-left'></i>",
                        "next": "<i class='bi bi-chevron-right'></i>"
                    }
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


    <!--updated-->





</body>

</html>