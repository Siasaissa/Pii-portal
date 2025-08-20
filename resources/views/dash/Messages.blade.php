<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Customer</title>
    @include('layouts.heads')
</head>

<body>
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
                                        <i class="bi bi-chat-left-text fs-2 section-icon me-3"></i>
                                        Bulk Messages
                                    </h1>
                                </div>
                                <div class="d-flex flex-wrap gap-4">
                                    <div>
                                        <small class="text-white-80 d-block">Total Messages</small>
                                        <div class="fw-semibold fs-5">{{ $totalSms }}</div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <div class="text-end mb-3">
                                    <small class="text-white-80 d-block">Created</small>
                                    <div class="fw-semibold">10-Nov-2023</div>
                                </div>
                                <div class="d-flex gap-2">

                                    <a href="{{url('/dash/index')}}">
                                        <button class="btn btn-sm btn-outline-light rounded-pill px-3">
                                            <i class="bi bi-house me-1"></i> Dashboard
                                        </button>
                                    </a>
                                    <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                        <button class="btn btn-sm text-white" style="background-color: #2E3192;"
                                            data-bs-toggle="modal" data-bs-target="#createSMSmodal">
                                            <i class="bi bi-bag-plus text-white"></i> Create Message
                                            <!--existing customer-->
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-flush">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table align-items-center border-warning" id="bulkTable">
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2 text-center">
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Sent At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bulkMessages as $msg)
                                        <tr class="fs-6 border-bottom-2 text-center">
                                            <td class="text-gray-600">{{ 'BUL-' . str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}
                                            </td>
                                            <td class="text-gray-600">{{ $msg->name }}</td>
                                            <td class="text-gray-600">{{ $msg->email }}</td>
                                            <td class="text-gray-600 ">{{ Str::limit($msg->message, 50) }}</td>
                                            <td class="text-gray-600">{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                                            <td class="text-center">

                                                <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#viewMessageModal{{ $msg->id }}">
                                                <i class="bi bi-eye"></i> View
                                                </button>

                                                <form action="{{ route('dash.Message.delete', $msg->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- View Modal -->
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                </div>
                @foreach($bulkMessages as $msg)
                    <div class="modal fade" id="viewMessageModal{{ $msg->id }}" tabindex="-1"
                        aria-labelledby="viewMessageModalLabel{{ $msg->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header text-white" style="background-color: #F9A61A;">
                                    <h5 class="modal-title" id="viewMessageModalLabel{{ $msg->id }}">Bulk SMS Details</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body row">
                                    <!-- Icon Section -->
                                    <div class="col-md-4 text-center mt-4 mb-3">
                                        <i class="bi bi-chat-left-text" style="font-size: 5rem; color: #2E3192;"></i>
                                        <h5 class="mt-3">Bulk SMS</h5>
                                    </div>
                                    <!-- Message Details -->
                                    <div class="col-md-8">
                                        <p><strong>User:</strong> {{ $msg->name }}</p>
                                        <p><strong>Email:</strong> {{ $msg->email }}</p>
                                        <p><strong>Message:</strong></p>
                                        <p>{{ $msg->message }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="modal fade" id="createSMSmodal" tabindex="-1" aria-labelledby="createSMSmodalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Header -->
                            <div class="modal-header text-white" style="background-color: #F9A61A;">
                                <h5 class="modal-title " id="createSMSmodalLabel">Send Bulk SMS</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <!-- Body -->
                            <div class="modal-body">
                                <form id="bulkSMSForm" method="POST" action="{{ route('dash.Messages.bullk') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <!-- Left: Icon -->
                                        <div class="col-md-4 text-center mt-5">
                                            <i class="bi bi-chat-left-text"
                                                style="font-size: 5rem; color: #2E3192;"></i>
                                            <h5 class="mt-3">Bulk SMS</h5>
                                        </div>

                                        <!-- Right: Form fields -->
                                        <div class="col-md-8">
                                            <div class="row g-3">
                                                <!-- Recipient Group -->
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Recipients</label>
                                                    <select name="recipient_group" id="recipientGroup"
                                                        class="form-select" required>
                                                        <option value="" selected disabled>Select group</option>
                                                        <option value="Customer">All Clients</option>
                                                        <option value="staff">All Staff</option>
                                                    </select>
                                                </div>

                                                <!-- Message -->
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Message</label>
                                                    <textarea name="message" id="smsMessage"  rows="4" maxlength="480"
                                                        class="form-control" placeholder="use &#123;&#123; $name &#125;&#125; and &#123;&#123; $status &#125;&#125; to pass dynamic variable for your message" required></textarea>
                                                    <div class="d-flex justify-content-between">
                                                        <small id="charCount">0 / 480 characters</small>
                                                        <small id="smsCount">~1 SMS</small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Footer -->
                            <div class="modal-footer">
                                <button type="submit" form="bulkSMSForm" class="btn btn-primary text-white">
                                    <i class="bi bi-send text-white"></i> Send SMS
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#bulkTable').DataTable({
                "pageLength": 5,
                "responsive": true,
                "language": {
                    "search": "Search Bulk:",
                    "lengthMenu": "Show _MENU_ bulk per page",
                    "info": "Showing _START_ to _END_ of _TOTAL_ bulks",
                    "paginate": {
                        "previous": "<i class='bi bi-chevron-left'></i>",
                        "next": "<i class='bi bi-chevron-right'></i>"
                    }
                }
            });
            
            // Character counter for SMS message
            const smsMessage = document.getElementById("smsMessage");
            const charCount = document.getElementById("charCount");
            const smsCount = document.getElementById("smsCount");

            smsMessage.addEventListener("input", () => {
                const length = smsMessage.value.length;
                charCount.textContent = `${length} / 480 characters`;
                smsCount.textContent = `~${Math.ceil(length / 160) || 1} SMS`;
            });


                @if(session('success'))
                    showNotification('{{ session('success') }}', 'success');
                @endif

                @if(session('error'))
                    showNotification('{{ session('error') }}', 'danger');
                @endif

                @if(session('warning'))
                    showNotification('{{ session('warning') }}', 'warning');
                @endif

            
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
            
            // Example of showing a notification (you can remove this in production)
            // showNotification('DataTable initialized successfully!', 'success');
        });
    </script>

</body>
</html>