<!DOCTYPE html>
<html lang="en">

<head>
<title>Users</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layouts.heads')
@include('layouts.service')
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
                                        <i class="bi bi-people-fill fs-2 section-icon me-3"></i>
                                        Users Management
                                    </h1>
                                </div>
                                <div class="d-flex flex-wrap gap-4">
                                    <div>
                                        <small class="text-white-80 d-block">Total users</small>
                                        <div class="fw-semibold fs-5">{{ $totalUsers }}</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">Active users</small>
                                        <div class="fw-semibold fs-5">{{ $activeUsers }}</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">New this month</small>
                                        <div class="fw-semibold fs-5">{{ $newCount }}</div>
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
                                    <div class="card-toolbar ms-4 d-flex align-items-center gap-1">                                       
                                            <button class="btn btn-sm text-white" style="background-color: #2E3192;" data-bs-toggle="modal" data-bs-target="#adduserModal">
                                                <i class="fas fa-plus text-white"></i> Add user
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
                            <table class="table table align-items-center border-warning" id="usersTable">
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2">
                                        <th class="min-w-100px text-center">ID</th>
                                        <th class="min-w-150px text-center">user Name</th>
                                        <th class="min-w-150px text-center">Email</th>
                                        <th class="min-w-150px text-center">Enable/Disable</th>
                                        <th class="min-w-150px text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr class="fs-4 border-bottom-2 justify-content-center">
                                        <td class="text-gray-600 fs-6 text-center">CUS-00{{ $loop->iteration }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $user->name }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $user->email }}</td>
                                            <td class="text-gray-600 fs-6 text-center">
                                                <label class="toggle-switch">
                                                    <input type="checkbox" 
                                                        class="status-toggle" 
                                                        data-id="{{ $user->id }}" 
                                                        {{ $user->status === 'active' ? 'checked' : '' }}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>

                                        <td class="text-center gap-3">
                                            <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#viewuserModal{{ $user->id }}">
                                                <i class="bi bi-eye"></i> View
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#edituserModal{{ $user->id }}">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteuserModal{{ $user->id }}">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </td>
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

    <!-- View user Modal -->
     @foreach ($users as $user )
    <div class="modal fade" id="viewuserModal{{ $user->id }}" tabindex="-1" aria-labelledby="viewuserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #F9A61A ;">
                    <h5 class="modal-title" id="viewuserModalLabel">user Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="bi bi-person-circle" style="font-size: 5rem; color: #2E3192;"></i>
                            </div>
                            <h5>{{ $user->name }}</h5>
                        </div>
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">user ID</label>
                                    <p>CUS-00{{ $loop->iteration }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email</label>
                                    <p>{{ $user->email }}</p>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">user Since</label>
                                    <p>{{ $user->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="color: white;">Close</button>
                </div>
            </div>
        </div>
    </div>
         
     @endforeach

    <!-- Edit user Modal -->

    @foreach ($users as $user )

    <div class="modal fade" id="edituserModal{{ $user->id }}" tabindex="-1" aria-labelledby="edituserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #F9A61A ;">
                    <h5 class="modal-title" id="edituserModalLabel">Edit user Information</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edituserForm" method="POST" action="{{ route('dash.user.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" value="{{$user->name}}" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" name="email" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="color: white;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
    @endforeach

    <!-- Delete user Modal -->
     @foreach ($users as $user)
    <div class="modal fade" id="deleteuserModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteuserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteuserModalLabel">Confirm user Deletion</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dash.user.delete', $user->id) }}" method="post">
                    @csrf
                    @method('delete')
                <div class="modal-body">
                    <p>Are you sure you want to delete the user <strong>{{ $user->name }} CUS-0{{ $loop->iteration }}</strong>?</p>
                    <p class="text-danger">This action will permanently remove all user data and cannot be undone.</p>
                    <div class="form-check mb-3">
                        <input class="form-check-input confirm-delete-checkbox" type="checkbox" id="confirmDeleteCheckbox{{ $user->id }}">
                        <label class="form-check-label" for="confirmDeleteCheckbox{{ $user->id }}">
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

    <!-- Add user Modal -->
    <div class="modal fade" id="adduserModal" tabindex="-1" aria-labelledby="adduserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header  text-white" style="background-color: #F9A61A;">
                    <h5 class="modal-title" id="adduserModalLabel">Add New user</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="adduserForm" action="{{ route('dash.User') }}" method="POST">
                    @csrf
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter full name" name="name" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email address">
                        </div>


 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="color: white;">Add user</button>
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

        $(document).ready(function() {
    $('.confirm-delete-checkbox').on('change', function() {
        let modal = $(this).closest('.modal');
        let btn = modal.find('.confirm-delete-btn');
        btn.prop('disabled', !$(this).is(':checked'));
    });
});
// For checking the password confirmation
document.addEventListener('input', function () {
    const password = document.querySelector('input[name="password"]');
    const confirm = document.querySelector('input[name="password_confirmation"]');
    if (password && confirm) {
        confirm.setCustomValidity(
            password.value !== confirm.value ? "Passwords do not match" : ""
        );
    }
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

$(document).ready(function () {
    // Initialize DataTable
    $('#usersTable').DataTable({
        pageLength: 10,
        responsive: true,
        language: {
            search: "Search users:",
            lengthMenu: "Show _MENU_ users per page",
            info: "Showing _START_ to _END_ of _TOTAL_ users",
            paginate: {
                previous: "<i class='bi bi-chevron-left'></i>",
                next: "<i class='bi bi-chevron-right'></i>"
            }
        }
    });

    // Show toast notifications if session has messages
    @if(session('success'))
        showNotification('{{ session('success') }}', 'success');
    @endif

    @if(session('error'))
        showNotification('{{ session('error') }}', 'danger');
    @endif

    @if(session('warning'))
        showNotification('{{ session('warning') }}', 'warning');
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            showNotification('{{ $error }}', 'danger');
        @endforeach
    @endif

});
</script>

<script>
// Handle user status toggle
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.status-toggle').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            let userId = this.dataset.id;
            let newStatus = this.checked ? 'active' : 'inactive';

            fetch(`/dash/user/status/${userId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    alert('Failed to update status');
                }
            })
            .catch(() => alert('Success updating status'));
        });
    });
});
</script>


</body>
</html>