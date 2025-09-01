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
                @include('layouts.trackerheader')

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
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table align-items-center border-warning" id="tripsTable">
                                    <thead>
                                        <tr class="fs-5 fw-bold text-dark border-bottom-2">
                                            <th class="min-w-100px text-center">Trip ID</th>
                                            <th class="min-w-100px text-center">Device ID</th>
                                            <th class="min-w-150px text-center">Nickname</th>
                                            <th class="min-w-100px text-center">Plate Number</th>
                                            <th class="min-w-150px text-center">Driver Name</th>
                                            <th class="min-w-150px text-center">Trip Start</th>
                                            <th class="min-w-150px text-center">Trip End</th>
                                            <th class="min-w-100px text-center">Avg. Speed</th>
                                            <th class="min-w-100px text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($trips as $trip)
                                            <tr class="fs-4 border-bottom-2 justify-content-center">
                                                <td class="text-gray-600 fs-6 text-center">{{ $trip->tid }}</td>
                                                <td class="text-gray-600 fs-6 text-center">{{ $trip->vid }}</td>
                                                <td class="text-gray-600 fs-6 text-center">{{ $trip->nickname }}</td>
                                                <td class="text-gray-600 fs-6 text-center">{{ $trip->plate_number }}</td>
                                                <td class="text-gray-600 fs-6 text-center">{{ $trip->driver_name }}</td>
                                                <td class="text-gray-600 fs-6 text-center">{{ $trip->trip_start }}</td>
                                                <td class="text-gray-600 fs-6 text-center">{{ $trip->trip_end }}</td>
                                                <td class="text-gray-600 fs-6 text-center">{{ $trip->avg_speed }}</td>
                                                <td class="text-center gap-3">
                                                    <button class="btn btn-sm btn-outline-primary me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#viewTripModal{{ $trip->id }}">
                                                        <i class="bi bi-eye"></i> View
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal for details -->
                                            <div class="modal fade" id="viewTripModal{{ $trip->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content p-4">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Trip Details ({{ $trip->tid }})</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Driver:</strong> {{ $trip->driver_name }}</p>
                                                            <p><strong>trip:</strong> {{ $trip->plate_number }}
                                                                ({{ $trip->nickname }})</p>
                                                            <p><strong>Start:</strong> {{ $trip->trip_start }}</p>
                                                            <p><strong>End:</strong> {{ $trip->trip_end }}</p>
                                                            <p><strong>Odometer:</strong> {{ $trip->odometer_start }} →
                                                                {{ $trip->odometer_end }}</p>
                                                            <p><strong>Fuel Usage:</strong> {{ $trip->fuel_usage }} L</p>
                                                            <p><strong>Location Start:</strong> {{ $trip->start_latitude }},
                                                                {{ $trip->start_longitude }}</p>
                                                            <p><strong>Location End:</strong> {{ $trip->end_latitude }},
                                                                {{ $trip->end_longitude }}</p>
                                                            <p><strong>Start Address:</strong> {{ $trip->start_address }}
                                                            </p>
                                                            <p><strong>End Address:</strong> {{ $trip->end_address }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">No trips found. Please sync from API.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

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
    @foreach ($trips as $trip)
        <div class="modal fade" id="viewtripModal{{ $trip->id }}" tabindex="-1"
            aria-labelledby="viewtripModalLabel{{ $trip->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header text-white" style="background-color: #F9A61A;">
                        <h5 class="modal-title" id="viewtripModalLabel{{ $trip->id }}">
                            trip Details - {{ $trip->plate_number ?? 'N/A' }}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <div class="row mb-4">
                            <!-- Left side: trip image + driver -->
                            <div class="col-md-4 text-center">
                                <div class="mb-3">
                                    @if(!empty($trip->image))
                                        <img src="{{ asset('storage/trips/' . $trip->image) }}" alt="trip"
                                            class="img-fluid rounded shadow" style="max-height: 150px;">
                                    @else
                                        <i class="bi bi-truck" style="font-size: 5rem; color: #2E3192;"></i>
                                    @endif
                                </div>
                                <h5>{{ $trip->driver_name ?? 'Unknown Driver' }}</h5>
                                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ $trip->trip_state ?? 'Active' }}
                                </span>
                            </div>

                            <!-- Right side: trip details -->
                            <div class="col-md-8">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Device ID</label>
                                        <p>{{ $trip->device_id }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Plate Number</label>
                                        <p>{{ $trip->plate_number }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Nickname</label>
                                        <p>{{ $trip->nickname }}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Trip Type</label>
                                        <p>{{ $trip->trip_type }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Event</label>
                                        <p>{{ $trip->event_name ?? 'N/A' }} ({{ $trip->event_code ?? '' }})</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Event Time</label>
                                        <p>{{ $trip->event_time }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Speed</label>
                                        <p>{{ $trip->speed }} km/h</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Odometer</label>
                                        <p>{{ $trip->odometer }} km</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Engine Hours</label>
                                        <p>{{ $trip->engine_hours ?? 'N/A' }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">GPS Status</label>
                                        <p>{{ $trip->gps_status }}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Coordinates</label>
                                        <p>{{ $trip->latitude }}, {{ $trip->longitude }}</p>
                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Fuel</label>
                                        <p>{{ $trip->fuel_percent }}% ({{ $trip->fuel_quantity }} L)</p>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Battery</label>
                                        <p>{{ $trip->battery_level }}%</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Idle Time</label>
                                        <p>{{ gmdate('H:i:s', $trip->idle_seconds ?? 0) }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Parking Time</label>
                                        <p>{{ gmdate('H:i:s', $trip->parking_seconds ?? 0) }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Trip Duration</label>
                                        <p>{{ gmdate('H:i:s', $trip->trip_seconds ?? 0) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                            style="color: white;">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Add Customer Modal -->
    <div class="modal fade" id="addTrackerModal" tabindex="-1" aria-labelledby="addTrackerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #F9A61A;">
                    <h5 class="modal-title" id="addTrackerModalLabel">Add New Tracker</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="addTrackerForm" method="POST" action="{{ route('dash.tracker.store') }}">
                    @csrf
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Device ID</label>
                            <input type="text" name="device_id" class="form-control" placeholder="Enter device ID"
                                required>
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
                            <input type="text" name="plate_number" class="form-control"
                                placeholder="Enter plate number">
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
                            <input type="text" name="odometer" class="form-control"
                                placeholder="Enter odometer reading">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Fuel Level (%)</label>
                            <input type="text" name="fuel_level" class="form-control" placeholder="Enter fuel level">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">trip State</label>
                            <select name="trip_state" class="form-select">
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
            $('#tripsTable').DataTable({
                "pageLength": 10,
                "responsive": true,
                "language": {
                    "search": "Search devices:",
                    "lengthMenu": "Show _MENU_ devices per page",
                    "info": "Showing _START_ to _END_ of _TOTAL_ devices",
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








        //for exporting pdf



document.getElementById('exportReportBtn').addEventListener('click', function () {
    showNotification('Trip report is being prepared...', 'info');

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF({
        orientation: 'portrait', // Correct spelling
        unit: 'mm',
        format: 'a4'
    });

    // Table headers (matching your trips table)
    const headers = [[
        '#',
        'Trip ID',
        'Device ID',
        'Plate Number',
        'Driver Name',
        'Trip Start',
        'Trip End',
        'Odometer Start',
        'Odometer End',
        'Avg Speed'
    ]];

    // Prepare data rows from tripsData
    const data = tripsData.map((t, index) => [
        index + 1,
        t.tid || '',
        t.vid || '',
        t.plate_number || '',
        t.driver_name || '',
        t.trip_start || '',
        t.trip_end || '',
        t.odometer_start || '',
        t.odometer_end || '',
        t.avg_speed || ''
    ]);

    // Add title
    doc.setFontSize(16);
    doc.text('Trip Report', 14, 15);

    // Add AutoTable
    doc.autoTable({
        head: headers,
        body: data,
        startY: 25,
        theme: 'grid',
        headStyles: { fillColor: [46, 49, 146], textColor: 255 },
        styles: { fontSize: 9, cellPadding: 2 },
        columnStyles: {
            0: { cellWidth: 8 },   // #
            1: { cellWidth: 15 },  // Trip ID
            2: { cellWidth: 25 },  // Device ID
            3: { cellWidth: 25 },  // Plate Number
            4: { cellWidth: 30 },  // Driver Name
            5: { cellWidth: 30 },  // Trip Start
            6: { cellWidth: 30 },  // Trip End
            7: { cellWidth: 20 },  // Odometer Start
            8: { cellWidth: 20 },  // Odometer End
            9: { cellWidth: 20 },  // Avg Speed
        },
        margin: { left: 10 },
        tableWidth: 'auto'
    });

    // Save PDF
    doc.save('trip-report.pdf');

    showNotification('Trip report exported successfully!', 'success');
});

// Pass trips data from backend
const tripsData = @json($trips);
</script>

</body>

</html>