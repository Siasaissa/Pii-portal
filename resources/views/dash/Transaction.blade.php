<!DOCTYPE html>
<html lang="en">

<head>
<title>Transaction</title>
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
                                        <i class="bi bi-briefcase fs-2 section-icon me-3"></i>
                                        Transaction Management
                                    </h1>
                                </div>
                                <div class="d-flex flex-wrap gap-4">
                                    <div>
                                        <small class="text-white-80 d-block">Total Transactions</small>
                                        <div class="fw-semibold fs-5">1,248</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">Successful Payments</small>
                                        <div class="fw-semibold fs-5">1,032</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">Pending Payments</small>
                                        <div class="fw-semibold fs-5">156</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">Total Revenue</small>
                                        <div class="fw-semibold fs-5">TZS 12,450,000</div>
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
                                            <button class="btn btn-sm text-white" style="background-color: #2E3192;" data-bs-toggle="modal" data-bs-target="#newPaymentModal">
                                                <i class="fas fa-plus text-white"></i> New Payment
                                            </button>
                                    </div>
                                    <div class="card-toolbar ms-4 d-flex align-items-center gap-1">                                       
                                            <button class="btn btn-sm text-white" style="background-color: #2E3192;" id="exportTransactionsBtn">
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
                            <table class="table table align-items-center border-warning" id="transactionsTable">
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2">
                                        <th class="min-w-100px text-center">Transaction ID</th>
                                        <th class="min-w-150px text-center">Customer</th>
                                        <th class="min-w-100px text-center">Device ID</th>
                                        <th class="min-w-100px text-center">Amount</th>
                                        <th class="min-w-100px text-center">Payment Method</th>
                                        <th class="min-w-100px text-center">Date</th>
                                        <th class="min-w-100px text-center">Status</th>
                                        <th class="min-w-150px text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="fs-4 border-bottom-2 justify-content-center">
                                        <td class="text-gray-600 fs-6 text-center">TRX-2023-0101</td>
                                        <td class="text-gray-600 fs-6 text-center">Ahmed Siasa</td>
                                        <td class="text-gray-600 fs-6 text-center">DEV-1001</td>
                                        <td class="text-gray-600 fs-6 text-center">TZS 150,000</td>
                                        <td class="text-gray-600 fs-6 text-center">M-Pesa</td>
                                        <td class="text-gray-600 fs-6 text-center">10-Nov-2023</td>
                                        <td class="fs-6 text-center">
                                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                                <i class="bi bi-check-circle-fill me-1"></i> Completed
                                            </span>
                                        </td>
                                        <td class="text-center gap-3">
                                            <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#viewTransactionModal">
                                                <i class="bi bi-eye"></i> View
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#editTransactionModal">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteTransactionModal">
                                                <i class="bi bi-trash"></i> Void
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="fs-4 border-bottom-2 justify-content-center">
                                        <td class="text-gray-600 fs-6 text-center">TRX-2023-0102</td>
                                        <td class="text-gray-600 fs-6 text-center">Jackson Byabato</td>
                                        <td class="text-gray-600 fs-6 text-center">DEV-1002</td>
                                        <td class="text-gray-600 fs-6 text-center">TZS 120,000</td>
                                        <td class="text-gray-600 fs-6 text-center">Tigo Pesa</td>
                                        <td class="text-gray-600 fs-6 text-center">09-Nov-2023</td>
                                        <td class="fs-6 text-center">
                                            <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2">
                                                <i class="bi bi-exclamation-triangle-fill me-1"></i> Pending
                                            </span>
                                        </td>
                                        <td class="text-center gap-3">
                                            <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#viewTransactionModal">
                                                <i class="bi bi-eye"></i> View
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#editTransactionModal">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteTransactionModal">
                                                <i class="bi bi-trash"></i> Void
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="fs-4 border-bottom-2 justify-content-center">
                                        <td class="text-gray-600 fs-6 text-center">TRX-2023-0103</td>
                                        <td class="text-gray-600 fs-6 text-center">Nasra Kassim</td>
                                        <td class="text-gray-600 fs-6 text-center">DEV-1003</td>
                                        <td class="text-gray-600 fs-6 text-center">TZS 180,000</td>
                                        <td class="text-gray-600 fs-6 text-center">Airtel Money</td>
                                        <td class="text-gray-600 fs-6 text-center">08-Nov-2023</td>
                                        <td class="fs-6 text-center">
                                            <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2">
                                                <i class="bi bi-x-circle-fill me-1"></i> Failed
                                            </span>
                                        </td>
                                        <td class="text-center gap-3">
                                            <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#viewTransactionModal">
                                                <i class="bi bi-eye"></i> View
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#editTransactionModal">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteTransactionModal">
                                                <i class="bi bi-trash"></i> Void
                                            </button>
                                        </td>
                                    </tr>
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

    <!-- View Transaction Modal -->
    <div class="modal fade" id="viewTransactionModal" tabindex="-1" aria-labelledby="viewTransactionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #F9A61A ;">
                    <h5 class="modal-title" id="viewTransactionModalLabel">Transaction Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="bi bi-receipt-cutoff" style="font-size: 5rem; color: #2E3192;"></i>
                            </div>
                            <h5>TRX-2023-0101</h5>
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i> Completed
                            </span>
                        </div>
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Customer</label>
                                    <p>Ahmed Siasa (CUS-0101)</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Device ID</label>
                                    <p>DEV-1001</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Amount</label>
                                    <p>TZS 150,000</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Payment Method</label>
                                    <p>M-Pesa</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Transaction Date</label>
                                    <p>10-Nov-2023 14:30</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Reference Number</label>
                                    <p>MP1234567890</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Payment Period</label>
                                    <p>November 2023</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Processed By</label>
                                    <p>Admin User</p>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Notes</label>
                                    <p>Monthly subscription payment for tracking services</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="color: white;">Close</button>
                    <button type="button" class="btn btn-primary" style="color: white;">
                        <i class="bi bi-printer"></i> Print Receipt
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Transaction Modal -->
    <div class="modal fade" id="editTransactionModal" tabindex="-1" aria-labelledby="editTransactionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #F9A61A ;">
                    <h5 class="modal-title" id="editTransactionModalLabel">Edit Transaction</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editTransactionForm">
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Transaction ID</label>
                            <input type="text" class="form-control" value="TRX-2023-0101" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Customer</label>
                            <select class="form-select" required>
                                <option value="CUS-0101" selected>Ahmed Siasa (CUS-0101)</option>
                                <option value="CUS-0102">Jackson Byabato (CUS-0102)</option>
                                <option value="CUS-0103">Nasra Kassim (CUS-0103)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Device ID</label>
                            <select class="form-select" required>
                                <option value="DEV-1001" selected>DEV-1001</option>
                                <option value="DEV-1002">DEV-1002</option>
                                <option value="DEV-1003">DEV-1003</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Amount (TZS)</label>
                            <input type="number" class="form-control" value="150000" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Payment Method</label>
                            <select class="form-select" required>
                                <option value="M-Pesa" selected>M-Pesa</option>
                                <option value="Tigo Pesa">Tigo Pesa</option>
                                <option value="Airtel Money">Airtel Money</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Reference Number</label>
                            <input type="text" class="form-control" value="MP1234567890" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Payment Period</label>
                            <select class="form-select" required>
                                <option value="2023-11" selected>November 2023</option>
                                <option value="2023-10">October 2023</option>
                                <option value="2023-12">December 2023</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" required>
                                <option value="Completed" selected>Completed</option>
                                <option value="Pending">Pending</option>
                                <option value="Failed">Failed</option>
                                <option value="Refunded">Refunded</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3">Monthly subscription payment for tracking services</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="color: white;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete/Void Transaction Modal -->
    <div class="modal fade" id="deleteTransactionModal" tabindex="-1" aria-labelledby="deleteTransactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteTransactionModalLabel">Void Transaction</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to void the transaction <strong>TRX-2023-0101</strong>?</p>
                    <p class="text-danger">This action will mark the transaction as voided and cannot be undone.</p>
                    <div class="form-group">
                        <label for="voidReason">Reason for voiding:</label>
                        <select class="form-select" id="voidReason" required>
                            <option value="" selected disabled>Select reason</option>
                            <option value="Duplicate Payment">Duplicate Payment</option>
                            <option value="Incorrect Amount">Incorrect Amount</option>
                            <option value="Payment Error">Payment Error</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="voidNotes">Additional Notes:</label>
                        <textarea class="form-control" id="voidNotes" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmVoidTransactionBtn">Void Transaction</button>
                </div>
            </div>
        </div>
    </div>

    <!-- New Payment Modal -->
    <div class="modal fade" id="newPaymentModal" tabindex="-1" aria-labelledby="newPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header  text-white" style="background-color: #F9A61A;">
                    <h5 class="modal-title" id="newPaymentModalLabel">Record New Payment</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="newPaymentForm">
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Customer</label>
                            

                            <select class="form-select" required>

                                <option value="" selected disabled>Select customer</option>
                                @foreach ($customers as $customer )
                                <option value="CUS-0101">{{ $customer->name }} (CUS-00{{ $loop->iteration }})</option>
                                 @endforeach

                            </select>
                                                        

                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Device ID</label>
                            <select class="form-select" required>
                                <option value="" selected disabled>Select device</option>
                                <option value="DEV-1001">DEV-1001</option>
                                <option value="DEV-1002">DEV-1002</option>
                                <option value="DEV-1003">DEV-1003</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Amount (TZS)</label>
                            <input type="number" class="form-control" placeholder="Enter amount" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Payment Method</label>
                            <select class="form-select" required>
                                <option value="" selected disabled>Select method</option>
                                <option value="M-Pesa">M-Pesa</option>
                                <option value="Tigo Pesa">Tigo Pesa</option>
                                <option value="Airtel Money">Airtel Money</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Reference Number</label>
                            <input type="text" class="form-control" placeholder="Enter reference number" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Payment Period</label>
                            <select class="form-select" required>
                                <option value="2023-11" selected>November 2023</option>
                                <option value="2023-10">October 2023</option>
                                <option value="2023-12">December 2023</option>
                                <option value="2024-01">January 2024</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" required>
                                <option value="Completed" selected>Completed</option>
                                <option value="Pending">Pending</option>
                                <option value="Failed">Failed</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Transaction Date</label>
                            <input type="datetime-local" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Enter any additional notes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="color: white;">Record Payment</button>
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
            // Initialize DataTable
            $('#transactionsTable').DataTable({
                "pageLength": 10,
                "responsive": true,
                "language": {
                    "search": "Search transactions:",
                    "lengthMenu": "Show _MENU_ transactions per page",
                    "info": "Showing _START_ to _END_ of _TOTAL_ transactions",
                    "paginate": {
                        "previous": "<i class='bi bi-chevron-left'></i>",
                        "next": "<i class='bi bi-chevron-right'></i>"
                    }
                },
                "order": [[5, "desc"]] // Sort by date descending by default
            });
            
            // Form submission handlers
            $('#editTransactionForm').on('submit', function(e) {
                e.preventDefault();
                $('#editTransactionModal').modal('hide');
                showNotification('Transaction updated successfully!', 'success');
            });

            $('#confirmVoidTransactionBtn').on('click', function() {
                if ($('#voidReason').val()) {
                    $('#deleteTransactionModal').modal('hide');
                    showNotification('Transaction TRX-2023-0101 has been voided.', 'danger');
                } else {
                    showNotification('Please select a reason for voiding the transaction.', 'warning');
                }
            });

            $('#newPaymentForm').on('submit', function(e) {
                e.preventDefault();
                $('#newPaymentModal').modal('hide');
                showNotification('New payment recorded successfully!', 'success');
                this.reset();
            });
            
            $('#exportTransactionsBtn').on('click', function() {
                showNotification('Transaction report is being prepared for download...', 'info');
                // Simulate report generation delay
                setTimeout(() => {
                    showNotification('Transaction report has been exported successfully!', 'success');
                }, 2000);
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
</body>
</html>