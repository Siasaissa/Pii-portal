<!DOCTYPE html>
<html lang="en">

<head>
    <title>Services</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.heads')
    @include('layouts.service')
</head>

<body class="body">
    <div id="toast-container"></div>
    <div class="app-container container-xxl mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10 col-12">
                <div class="risk-header text-white p-4 mb-5">
                    <div class="position-relative z-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap">
                            <div class="mb-4 mb-md-0">
                                <div class="d-flex align-items-center mb-3">
                                    <h1 class="h2 mb-0">
                                        <i class="bi bi-gear fs-2 section-icon me-3"></i>
                                        Services Management
                                    </h1>
                                </div>
                                <div class="d-flex flex-wrap gap-4">
                                    <div>
                                        <small class="text-white-80 d-block">Total Services</small>
                                        <div class="fw-semibold fs-5" id="totalServices">{{ $totalService }}</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">Active Services</small>
                                        <div class="fw-semibold fs-5" id="activeServices">{{ $activeCount }}</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">Inactive Services</small>
                                        <div class="fw-semibold fs-5" id="inactiveServices">{{ $inactiveCount }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <div class="text-end mb-3">
                                    <small class="text-white-80 d-block">Last Updated</small>
                                    <div class="fw-semibold" id="lastUpdated">Today</div>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ url('dash/index') }}">
                                        <button class="btn btn-sm btn-outline-light rounded-pill px-3">
                                            <i class="bi bi-house me-1"></i> Dashboard
                                        </button>
                                    </a>
                                    <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                        <button class="btn btn-sm text-white" style="background-color: #2E3192;"
                                            data-bs-toggle="modal" data-bs-target="#addServiceModal">
                                            <i class="fas fa-plus text-white"></i> Add New Service
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services Table -->
                <div class="card card-flush">
                    <div class="card-header pt-7">
                        <h3 class="card-title">Tracking Device Services</h3>
                    </div>
                    <div class="card-body pt-6">
                        <div class="table-responsive">
                            <table class="table table-bodered align-items-center border-danger justify-content-start"
                                style=".border-light-danger {border-color: #f8d7da !important; } font-family: Geneva !important; ">
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2 text-center">
                                        <th>S/No</th>
                                        <th>Service Name</th>
                                        <th>Description</th>
                                        <th>Price (TZS)</th>
                                        <th>Billing Cycle</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                    <tr class="fs-6 text-center">  
                                        <td>SER-00{{ $loop->iteration }}</td>
                                        <td>{{ $service->service_name }}</td>
                                        <td>{{ $service->description }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td>{{ $service->billing_cycle }}</td>
                                        <td class="text-gray-600 fs-6 text-center">
                                                <label class="toggle-switch">
                                                    <input type="checkbox" 
                                                        class="status-toggle" 
                                                        data-id="{{ $service->id }}" 
                                                        {{ $service->status === 'active' ? 'checked' : '' }}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                        <td class="text-center gap-3 d-inline-block">
                                            <i class="bi bi-eye fs-6 me-2 cursor-pointer text-success"
                                                data-bs-toggle="modal" data-bs-target="#viewServiceModal{{ $service->id }}"></i>
                                            <i class="bi bi-pencil-square fs-6 me-2 ms-2 cursor-pointer"
                                                style="color: orange !important;" data-bs-toggle="modal"
                                                data-bs-target="#editServiceModal{{ $service->id }}"></i>
                                            <i class="bi bi-trash fs-6 text-danger ms-2 cursor-pointer"
                                                style="color: #dc3545 !important;" data-bs-toggle="modal"
                                                data-bs-target="#deleteServiceModal{{ $service->id }}"></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View Service Modal -->
             @foreach ($services as $service )
            <div class="modal fade" id="viewServiceModal{{ $service->id }}" tabindex="-1" aria-labelledby="viewServiceModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md-custom">
                    <div class="modal-content">
                        <div class="card card-flush">
                            <div class="card-header pt-7">
                                <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="w-100 text-center mb-2 text-success">
                                    <h2>Service Details</h2>
                                </div>
                            </div>
                            <div class="card-body pt-6">
                                <div class="row align-items-start ms-4">
                                    <div class="col-md-12">
                                        <p><strong>Service Name:</strong> {{ $service->service_name }}</p>
                                        <p><strong>Description:</strong>{{ $service->description }}</p>
                                        <p><strong>Price:</strong>{{ $service->price }}</p>
                                        <p><strong>Billing Cycle:</strong>{{ $service->billing_cycle }}</p>
                                        <p><strong>Status:</strong>{{ $service->status }}</p>
                                        <p><strong>Created At:</strong>{{ $service->created_at }}</p>
                                        <p><strong>Last Updated:</strong>{{ $service->updated_at }}</p>
                                        <p><strong>Features:</strong></p>
                                        <ul>
                                            <li>15-minute location updates</li>
                                            <li>Geofencing alerts</li>
                                            <li>Speed monitoring</li>
                                            <li>24/7 support</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                         
             @endforeach

            <!-- Add Service Modal -->
            <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header  text-white" style="background-color: #F9A61A;">
                            <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ route('dash.Services.add') }}">
                            @csrf
                            <div class="modal-body row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Service Name</label>
                                    <input type="text" class="form-control" placeholder="Enter service name"
                                        name="service_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Price (TZS)</label>
                                    <input type="number" class="form-control" placeholder="Enter price" name="price"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Billing Cycle</label>
                                    <select class="form-select" name="billing_cycle" required>
                                        <option value="" disabled>Select billing cycle</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="annual">Annual</option>
                                    </select>
                                </div>
                                <!-- <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>-->
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="3" name="description"
                                        placeholder="Enter service description" required></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary text-white">Add Service</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Service Modal -->
             @foreach ($services as $service)
            
            <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" aria-labelledby="editServiceModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header text-white" style="background-color: #F9A61A;">
                            <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form id="editServiceForm" method="post" action="{{ route('dash.Services.update', $service->id) }}">
                             @csrf
                            @method('PUT')
                           
                            <div class="modal-body row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Service Name</label>
                                    <input type="text" class="form-control" name="service_name" value="{{ $service->service_name }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Price (TZS)</label>
                                    <input type="number" class="form-control" name="price" value="{{ $service->price }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Billing Cycle</label>
                                    <select class="form-select" name="billing_cycle" required>
                                        <option disabled  selected>{{ $service->billing_cycle }}</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly" selected>Monthly</option>
                                        <option value="quarterly">Quarterly</option>
                                        <option value="annual">Annual</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="active" selected>{{ $service->status }}</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" name="description" >Description</label>
                                    <textarea class="form-control" rows="3" name="description" required>{{ $service->description }}</textarea>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary text-white">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                         @endforeach

            <!-- Delete Service Modal -->
             @foreach ($services as $service)
            <div class="modal fade" id="deleteServiceModal{{ $service->id }}" tabindex="-1" aria-labelledby="deleteuserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteuserModalLabel">Confirm user Deletion</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dash.Services.delete', $service->id) }}" method="post">
                    @csrf
                    @method('delete')
                <div class="modal-body">
                    <p>Are you sure you want to delete the user <strong>{{ $service->name }} SER-00{{ $loop->iteration }}</strong>?</p>
                    <p class="text-danger">This action will permanently remove all user data and cannot be undone.</p>
                    <div class="form-check mb-3">
                        <input class="form-check-input confirm-delete-checkbox" type="checkbox" id="confirmDeleteCheckbox{{ $service->id }}">
                        <label class="form-check-label" for="confirmDeleteCheckbox{{ $service->id }}">
                            I understand this action is irreversible
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary bg-danger confirm-delete-btn" 
                        style="color: white;" disabled>Delete user</button>
                </div>
                </form>
            </div>
        </div>
    </div>
                         
             @endforeach
        </div>
    </div>

    <!-- Scripts -->
    <script src="../assets/js/scripts.bundle.js"></script>
    <script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="../assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="../assets/js/widgets.bundle.js"></script>
    <script src="../assets/js/custom/apps/chat/chat.js"></script>
    <script src="../assets/js/custom/utilities/modals/create-campaign.js"></script>
    <script src="../assets/js/custom/utilities/modals/users-search.js"></script>
    <script src="../assets/plugins/global/plugins.bundle.js"></script>
    <script src="../assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <script>

        $(document).ready(function() {
    $('.confirm-delete-checkbox').on('change', function() {
        let modal = $(this).closest('.modal');
        let btn = modal.find('.confirm-delete-btn');
        btn.prop('disabled', !$(this).is(':checked'));
    });
});



document.addEventListener('DOMContentLoaded', function () {
    // === STATUS TOGGLE ===
    document.querySelectorAll('.status-toggle').forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        let serviceId = this.dataset.id;
        let newStatus = this.checked ? 'active' : 'inactive';

        console.log("Sending request for service:", serviceId, "with status:", newStatus);

        fetch(`/dash/services/status/${serviceId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ status: newStatus })
        })
        .then(async response => {
            console.log("Raw response:", response);

            if (!response.ok) {
                let text = await response.text();
                throw new Error("Server error: " + response.status + " - " + text);
            }

            return response.json();
        })
        .then(data => {
            console.log("Response JSON:", data);

            if (data.success) {
                showNotification('Status updated successfully', 'success');
            } else {
                showNotification('Failed to update status', 'danger');
                this.checked = !this.checked;
            }
        })
        .catch(error => {
            console.error("Fetch error:", error);
            showNotification('Error updating status', 'danger');
            this.checked = !this.checked;
        });
    });
});


    // === DATATABLE INIT ===
    $('.table').DataTable({
        "pageLength": 10
    });

    // === TOASTS FROM SESSION ===
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


// === GLOBAL NOTIFICATION FUNCTION ===
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