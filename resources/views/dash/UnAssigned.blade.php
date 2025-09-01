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
                                        <th class="min-w-100px text-center">SN</th>
                                        <th class="min-w-100px text-center">Device Name</th>
                                        <th class="min-w-150px text-center">Imei</th>
                                        <th class="min-w-150px text-center">Company</th>
                                    </tr>
                                </thead>
                                    
                                    <tbody>
                                        @forelse ($unassigned as $imei)
                                            <tr class="fs-4 border-bottom-2 justify-content-center">
                                                <td class="text-gray-600 fs-6 text-center">{{ $loop->iteration }}</td>
                                                <td class="text-gray-600 fs-6 text-center">{{ $imei->device_name }}</td>
                                                <td class="text-gray-600 fs-6 text-center">{{ $imei->imei }}</td>  
                                                <td class="text-gray-600 fs-6 text-center">{{ $imei->company }}</td>   
                                            </tr>
                                            @empty
                                            <tr>
                                                <td>No device unassigned found request more for admin</td>
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

</script>

</body>

</html>