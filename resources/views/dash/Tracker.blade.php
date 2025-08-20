<!DOCTYPE html>
<html lang="en">

<head>
<title>Tracker</title>
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
                                        <i class="bi bi-clipboard2-pulse fs-2 section-icon me-3"></i>
                                        Tracker Management
                                    </h1>
                                </div>
                                <div class="d-flex flex-wrap gap-4">
                                    <div>
                                        <small class="text-white-80 d-block">Total Devices</small>
                                        <div class="fw-semibold fs-5">{{ $total }}</div>
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
                                            <button class="btn btn-sm text-white" style="background-color: #2E3192;" data-bs-toggle="modal" data-bs-target="#addTrackerModal">
                                                <i class="fas fa-plus text-white"></i> Add Tracker
                                            </button>
                                    </div>
                                    
                                    <div class="card-toolbar ms-4 d-flex align-items-center gap-1">                                       
                                            <button class="btn btn-sm text-white" style="background-color: #2E3192;" id="exportReportBtn">
                                                <i class="fas fa-download text-white"></i> Export
                                            </button>
                                    </div>
                                    <a href="{{ route('dash.trackers.sync') }}" style="text-decoration: none;">
                                    <div class="card-toolbar ms-4 d-flex align-items-center gap-1">                                       
                                            <button class="btn btn-sm text-white" style="background-color: #2E3192;" id="exportReportBtn">
                                                <i class="fas fa-refresh text-white "></i> Sync Device
                                            </button>
                                    </div>
                                    </a>
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
                                        <th class="min-w-100px text-center">Device ID</th>
                                        <th class="min-w-150px text-center">Nickname</th>
                                        <th class="min-w-100px text-center">Event Name</th>
                                        <th class="min-w-100px text-center">Plate Number</th>
                                        <th class="min-w-150px text-center">Driver name</th>
                                        
                                        <th class="min-w-150px text-center">Latitude</th>
                                        <th class="min-w-150px text-center">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($vehicles as $vehicle)
                                    <tr class="fs-4 border-bottom-2 justify-content-center">
                                        <td class="text-gray-600 fs-6 text-center">{{ $vehicle->device_id}}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $vehicle->nickname }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $vehicle->event_name }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $vehicle->plate_number }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $vehicle->driver_name }}</td>
                                        <td class="text-gray-600 fs-6 text-center">{{ $vehicle->latitude }}</td>
                                        
                                        <td class="text-center gap-3">
                                            <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#viewVehicleModal{{ $vehicle->id }}">
                                                <i class="bi bi-eye"></i> View
                                            </button>
                                           
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No vehicles found. Please sync from API.</td>
                                    </tr>
                                    @endforelse
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

    <!-- View Tracker Modal -->
    @foreach ($vehicles as $vehicle)
    <div class="modal fade" id="viewVehicleModal{{ $vehicle->id }}" tabindex="-1" aria-labelledby="viewVehicleModalLabel{{ $vehicle->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header text-white" style="background-color: #F9A61A;">
                    <h5 class="modal-title" id="viewVehicleModalLabel{{ $vehicle->id }}">
                        Vehicle Details - {{ $vehicle->plate_number ?? 'N/A' }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <div class="row mb-4">
                        <!-- Left side: Vehicle image + driver -->
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                @if(!empty($vehicle->image))
                                    <img src="{{ asset('storage/vehicles/' . $vehicle->image) }}" alt="Vehicle" class="img-fluid rounded shadow" style="max-height: 150px;">
                                @else
                                    <i class="bi bi-truck" style="font-size: 5rem; color: #2E3192;"></i>
                                @endif
                            </div>
                            <h5>{{ $vehicle->driver_name ?? 'Unknown Driver' }}</h5>
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i>
                                {{ $vehicle->vehicle_state ?? 'Active' }}
                            </span>
                        </div>

                        <!-- Right side: Vehicle details -->
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Device ID</label>
                                    <p>{{ $vehicle->device_id }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Plate Number</label>
                                    <p>{{ $vehicle->plate_number }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Nickname</label>
                                    <p>{{ $vehicle->nickname }}</p>
                                </div>
                               
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Trip Type</label>
                                    <p>{{ $vehicle->trip_type }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Event</label>
                                    <p>{{ $vehicle->event_name ?? 'N/A' }} ({{ $vehicle->event_code ?? '' }})</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Event Time</label>
                                    <p>{{ $vehicle->event_time }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Speed</label>
                                    <p>{{ $vehicle->speed }} km/h</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Odometer</label>
                                    <p>{{ $vehicle->odometer }} km</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Engine Hours</label>
                                    <p>{{ $vehicle->engine_hours ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">GPS Status</label>
                                    <p>{{ $vehicle->gps_status }}</p>
                                </div>
                               
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Coordinates</label>
                                    <p>{{ $vehicle->latitude }}, {{ $vehicle->longitude }}</p>
                                </div>

                                
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Fuel</label>
                                    <p>{{ $vehicle->fuel_percent }}% ({{ $vehicle->fuel_quantity }} L)</p>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Battery</label>
                                    <p>{{ $vehicle->battery_level }}%</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Idle Time</label>
                                    <p>{{ gmdate('H:i:s', $vehicle->idle_seconds ?? 0) }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Parking Time</label>
                                    <p>{{ gmdate('H:i:s', $vehicle->parking_seconds ?? 0) }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Trip Duration</label>
                                    <p>{{ gmdate('H:i:s', $vehicle->trip_seconds ?? 0) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="color: white;">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <!-- Add Customer Modal -->
    <div class="modal fade" id="addTrackerModal" tabindex="-1" aria-labelledby="addTrackerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #F9A61A;">
                <h5 class="modal-title" id="addTrackerModalLabel">Add New Tracker</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addTrackerForm" method="POST" action="{{ route('dash.tracker.store') }}">
                @csrf
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Device ID</label>
                        <input type="text" name="device_id" class="form-control" placeholder="Enter device ID" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nickname</label>
                        <input type="text" name="nickname" class="form-control" placeholder="Enter nickname">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Event Name</label>
                        <input type="text" name="event_name" class="form-control" placeholder="Enter event name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Plate Number</label>
                        <input type="text" name="plate_number" class="form-control" placeholder="Enter plate number">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Driver Name</label>
                        <input type="text" name="driver_name" class="form-control" placeholder="Enter driver name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control" placeholder="Enter latitude">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control" placeholder="Enter longitude">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Speed</label>
                        <input type="text" name="speed" class="form-control" placeholder="Enter speed">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Odometer</label>
                        <input type="text" name="odometer" class="form-control" placeholder="Enter odometer reading">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Fuel Level (%)</label>
                        <input type="text" name="fuel_level" class="form-control" placeholder="Enter fuel level">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Vehicle State</label>
                        <select name="vehicle_state" class="form-select">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Pending" selected>Pending</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Region</label>
                        <input type="text" name="region" class="form-control" placeholder="Enter region">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Event Time</label>
                        <input type="datetime-local" name="event_time" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="color: white;">Add Tracker</button>
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








//for exporting pdf


document.getElementById('exportReportBtn').addEventListener('click', function() {
    showNotification('Vehicle report is being prepared...', 'info');

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF({
        orientation: 'potrait', // Landscape orientation
        unit: 'mm',
        format: 'a4'
    });

    // Table headers (matching your vehicle table)
    const headers = [['#', 'Device ID', 'Nickname', 'Event Name', 'Plate Number', 'Driver Name', 'Latitude']];

    // Prepare data rows from vehiclesData
    const data = vehiclesData.map((v, index) => [
        index + 1,
        v.device_id || '',
        v.nickname || '',
        v.event_name || '',
        v.plate_number || '',
        v.driver_name || '',
        v.latitude || ''
    ]);

    // Add title
    doc.setFontSize(16);
    doc.text('Vehicle List', 14, 15);

    // Add AutoTable with column width adjustments
    doc.autoTable({
        head: headers,
        body: data,
        startY: 25,
        theme: 'grid',
        headStyles: { fillColor: [46, 49, 146], textColor: 255 },
        styles: { fontSize: 10, cellPadding: 3 },
        columnStyles: {
            0: { cellWidth: 10 },
            1: { cellWidth: 30 },
            2: { cellWidth: 30 },
            3: { cellWidth: 40 },
            4: { cellWidth: 30 },
            5: { cellWidth: 40 },
            6: { cellWidth: 30 }
        },
        margin: { left: (doc.internal.pageSize.getWidth() - 200) / 2 }, // 200 = approx total width
        tableWidth: 'auto'
    });

    // Save PDF
    doc.save('vehicle-list.pdf');

    showNotification('Vehicle report exported successfully!', 'success');
});


</script>
<script>const vehiclesData = @json($vehicles);
</script>

</body>
</html>