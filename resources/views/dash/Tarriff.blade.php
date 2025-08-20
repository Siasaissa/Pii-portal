<!DOCTYPE html>
<html lang="en">

<head>
<title>Tarriff</title>
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
                                        <i class="bi bi-wallet2 fs-2 section-icon me-3"></i>
                                        Tariff Management
                                    </h1>
                                </div>
                                <div class="d-flex flex-wrap gap-4">
                                    <div>
                                        <small class="text-white-80 d-block">Active Tariffs</small>
                                        <div class="fw-semibold fs-5">{{ $activeCount }}</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">Monthly Revenue</small>
                                        <div class="fw-semibold fs-5">{{$newCount}}</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">Active Subscriptions</small>
                                        <div class="fw-semibold fs-5">{{ $activeCount }}</div>
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
                                            <button class="btn btn-sm text-white" style="background-color: #2E3192;" data-bs-toggle="modal" data-bs-target="#addTariffModal">
                                                <i class="fas fa-plus text-white"></i> Add Tariff
                                            </button>
                                    </div>
                                    <div class="card-toolbar ms-4 d-flex align-items-center gap-1">                                       
                                            <button class="btn btn-sm text-white" style="background-color: #2E3192;" id="exportReportBtn">
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
                            <table class="table table align-items-center border-warning" id="tariffsTable">
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2">
                                        <th class="min-w-100px text-center">Tariff ID</th>
                                        <th class="min-w-150px text-center">Tariff Name</th>
                                        <th class="min-w-100px text-center">Device Type</th>
                                        <th class="min-w-150px text-center">Billing Cycle</th>
                                        <th class="min-w-100px text-center">Amount (TZS)</th>
                                        <th class="min-w-150px text-center">Status</th>
                                        <th class="min-w-150px text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tarriffs as $tarriff)                   
                                    <tr class="fs-4 border-bottom-2 justify-content-center">
                                        <td class="text-gray-600 fs-6 text-center">TRF-00{{ $loop->iteration }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $tarriff->name }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $tarriff->device_type }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $tarriff->billing_cycle }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $tarriff->amount }}</td>
                                        <td class="fs-6 text-center">

                                            @if ($tarriff->status === 'Active')
                                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                                <i class="bi bi-check-circle-fill me-1"></i> {{ $tarriff->status }}
                                            </span> 
                                            @else ($tarriff->status === 'Pending Approval') 
                                            <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2">
                                                <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $tarriff->status }}
                                            </span>                                      
                                            @endif
                                        </td>
                                        <td class="text-center gap-3">
                                            <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#viewTariffModal{{ $tarriff->id }}">
                                                <i class="bi bi-eye"></i> View
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#editTariffModal{{ $tarriff->id }}">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteTariffModal{{ $tarriff->id }}">
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

    <!-- View Tariff Modal -->
     @foreach ($tarriffs as $tarriff)
    <div class="modal fade" id="viewTariffModal{{ $tarriff->id }}" tabindex="-1" aria-labelledby="viewTariffModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #F9A61A ;">
                    <h5 class="modal-title" id="viewTariffModalLabel">Tariff Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="bi bi-currency-dollar" style="font-size: 5rem; color: #2E3192;"></i>
                            </div>
                            <h5>{{ $tarriff->name }}</h5>
                            @if ($tarriff->status === 'Active')
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i> {{ $tarriff->status }}
                            </span>
                            @else($tarriff->status === 'Pending Approval')
                            <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2">
                                <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $tarriff->status }}
                            </span> 
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tariff ID</label>
                                    <p>TRF-00{{ $loop->iteration }}</p>
                                    
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Device Type</label>
                                    <p>{{ $tarriff->device_type }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Billing Cycle</label>
                                    <p>{{ $tarriff->billing_cycle }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Amount</label>
                                    <p>{{ $tarriff->amount }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tax Rate</label>
                                    <p>{{ $tarriff->tax }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Created Date</label>
                                    <p>{{$tarriff->created_at}}</p>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Description</label>
                                    <p>{{ $tarriff->description }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Active Subscriptions</label>
                                    <p>{{ $tarriff->newCount }}</p>
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

    <!-- Edit Tariff Modal -->
    @foreach ($tarriffs as $tarriff)
<div class="modal fade" id="editTariffModal{{ $tarriff->id }}" tabindex="-1" aria-labelledby="editTariffModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #F9A61A;">
                <h5 class="modal-title" id="editTariffModalLabel">Edit Tariff Information</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{ route('dash.tarriff.update', $tarriff->id) }}">
                @csrf
                @method('PUT')

                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tariff Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $tarriff->name }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Device Type</label>
                        <select name="device_type" class="form-select" required>
                            <option value="Vehicle" {{ $tarriff->device_type == 'Vehicle' ? 'selected' : '' }}>Vehicle</option>
                            <option value="Personal" {{ $tarriff->device_type == 'Personal' ? 'selected' : '' }}>Personal</option>
                            <option value="Asset" {{ $tarriff->device_type == 'Asset' ? 'selected' : '' }}>Asset</option>
                            <option value="Fleet" {{ $tarriff->device_type == 'Fleet' ? 'selected' : '' }}>Fleet</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Billing Cycle</label>
                        <select name="billing_cycle" class="form-select" required>
                            <option value="Daily" {{ $tarriff->billing_cycle == 'Daily' ? 'selected' : '' }}>Daily</option>
                            <option value="Weekly" {{ $tarriff->billing_cycle == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                            <option value="Monthly" {{ $tarriff->billing_cycle == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="Quarterly" {{ $tarriff->billing_cycle == 'Quarterly' ? 'selected' : '' }}>Quarterly</option>
                            <option value="Annual" {{ $tarriff->billing_cycle == 'Annual' ? 'selected' : '' }}>Annual</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Amount (TZS)</label>
                        <input type="number" name="amount" class="form-control" value="{{ $tarriff->amount }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tax Rate</label>
                        <select name="tax" class="form-select" required>
                            <option value="0" {{ $tarriff->tax == 0 ? 'selected' : '' }}>No Tax</option>
                            <option value="18" {{ $tarriff->tax == 18 ? 'selected' : '' }}>18% VAT</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" value="{{ $tarriff->status }}" class="form-select" required>
                            <option disabled >{{ $tarriff->status }}</option>
                            <option value="Active" {{ $tarriff->status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Pending Approval" {{ $tarriff->status == 'Pending' ? 'selected' : '' }}>Pending Approval</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ $tarriff->description }}</textarea>
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


    <!-- Delete Tariff Modal -->
    @foreach ($tarriffs as $tarriff)
    <div class="modal fade" id="deleteTariffModal{{ $tarriff->id }}" tabindex="-1" aria-labelledby="deleteCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteCustomerModalLabel">Confirm Customer Deletion</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dash.tarriff.delete', $tarriff->id) }}" method="post">
                    @csrf
                    @method('delete')
                <div class="modal-body">
                    <p>Are you sure you want to delete the customer <strong>CUS-0{{ $loop->iteration }}</strong>?</p>
                    <p class="text-danger">This action will permanently remove all customer data and cannot be undone.</p>
                    <div class="form-check mb-3">
                        <input class="form-check-input confirm-delete-checkbox" type="checkbox" id="confirmDeleteCheckbox{{ $tarriff->id }}">
                        <label class="form-check-label" for="confirmDeleteCheckbox{{ $tarriff->id }}">
                            I understand this action is irreversible
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary bg-danger confirm-delete-btn" 
                        style="color: white;" disabled>Delete Customer</button>
                </div>
                </form>
            </div>
        </div>
    </div>
         
     @endforeach

    <div class="modal fade" id="addTariffModal" tabindex="-1" aria-labelledby="addTariffModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header  text-white" style="background-color: #F9A61A;">
                    <h5 class="modal-title" id="addTariffModalLabel">Add New Tariff</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addTariffForm" method="POST" action="{{ route('dash.tarriff.store') }}">
                    @csrf
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tariff Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter tariff name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Device Type</label>
                            <select class="form-select" name="device_type" required>
                                <option value=""  selected disabled>Select device type</option>
                                <option value="Vehicle">Vehicle</option>
                                <option value="Personal">Personal</option>
                                <option value="Asset">Asset</option>
                                <option value="Fleet">Fleet</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Billing Cycle</label>
                            <select class="form-select" name="billing_cycle" required>
                                <option value="" selected disabled>Select billing cycle</option>
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Quarterly">Quarterly</option>
                                <option value="Annual">Annual</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Amount (TZS)</label>
                            <input type="number" name="amount" class="form-control" placeholder="Enter amount" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tax Rate</label>
                            <select class="form-select" name="tax" required>
                                <option value="0">No Tax</option>
                                <option value="18" selected>18% VAT</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Initial Status</label>
                            <select class="form-select" name="status" required>
                                <option value="Active">Active</option>
                                <option value="Pending Approval" selected>Pending Approval</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" name="description" placeholder="Enter tariff description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="color: white;">Add Tariff</button>
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



<!-- new-->
 <script>
$(document).ready(function () {
    $('#tariffsTable').DataTable({
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


<!--updated-->
<script>

    $(document).ready(function() {
    $('.confirm-delete-checkbox').on('change', function() {
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


document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('exportReportBtn').addEventListener('click', function() {
        showNotification('Tariff report is being prepared...', 'info');

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF({ orientation: 'landscape', unit: 'mm', format: 'a4' });

        // Ensure trriffsData exists and is an array
        if (!Array.isArray(trriffsData) || trriffsData.length === 0) {
            showNotification('No tariff data to export.', 'error');
            return;
        }

        // Table headers
        const headers = [['#', 'Name', 'Device Type', 'Billing Cycle', 'Amount', 'Tax', 'Status', 'Description']];

        // Prepare data
        const data = trriffsData.map((c, index) => [
            index + 1,
            c.name || '',
            c.device_type || '',
            c.billing_cycle || '',
            c.amount || '',
            c.tax || '',
            c.status || '',
            c.description || ''
        ]);

        // Add title
        doc.setFontSize(16);
        doc.text('Tariff List', 14, 15);

        // Add AutoTable
        doc.autoTable({
            head: headers,
            body: data,
            startY: 25,
            theme: 'grid',
            headStyles: { fillColor: [46, 49, 146], textColor: 255 },
            styles: { fontSize: 10, cellPadding: 3 },
            columnStyles: {
                0: { cellWidth: 10 },
                1: { cellWidth: 40 },
                2: { cellWidth: 30 },
                3: { cellWidth: 30 },
                4: { cellWidth: 25 },
                5: { cellWidth: 25 },
                6: { cellWidth: 25 },
                7: { cellWidth: 60 }
            },
            tableWidth: 'auto'
        });

        // Save PDF
        doc.save('tariff-list.pdf');
        showNotification('Tariff report exported successfully!', 'success');
    });
});



</script>
<script>
    const trriffsData = @json($tarriffs); // your controller passes $tarriffs
</script>


    <!--to be deleted -->

    
</body>
</html>