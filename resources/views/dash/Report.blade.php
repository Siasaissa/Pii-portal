<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.heads')
<title>Report</title>
</head>

<body class="body">
    <div class="app-container container-xxl mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10 col-12">
                <div class="risk-header text-white p-4 mb-5">
                    <div class="position-relative z-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap">
                            <div class="mb-4 mb-md-0">
                                <div class="d-flex align-items-center mb-3">
                                    <h1 class="h2 mb-0">
                                        <i class="bi bi-file-earmark-medical fs-2 section-icon me-3"></i>
                                        Report
                                    </h1>
                                </div>
                                <div class="d-flex flex-wrap gap-4">
                                    <div>
                                        <small class="text-white-80 d-block">Total Payments</small>
                                        <div class="fw-semibold fs-5">TZS 2,450,000</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">Active Subscriptions</small>
                                        <div class="fw-semibold fs-5">48 Devices</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">Overdue Payments</small>
                                        <div class="fw-semibold fs-5">12 Devices</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <div class="text-end mb-3">
                                    <small class="text-white-80 d-block">Last Updated</small>
                                    <div class="fw-semibold">05-Aug-2025</div>
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
            <!--begin::Table widget 14-->
            <div class="card card-flush">
                <!--begin::Header-->
                <div class="card-header pt-7">
                    <!--begin::Title-->

                </div>
                <div class="card-body pt-6">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table align-items-center border-danger" style=".border-light-danger {border-color: #f8d7da !important; } font-family: Geneva !important; ">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fs-5 fw-bold text-dark border-bottom-2 ">
                                    <th class=" min-w-100px text-center ">S/No</th>
                                    <th class=" min-w-100px text-center ">Client</th>
                                    <th class=" min-w-100px text-center ">Device ID</th>
                                    <th class=" min-w-100px text-center ">Region</th>
                                    <th class=" min-w-100px text-center ">Payment</th>
                                    <th class=" min-w-100px text-center ">Date</th>
                                    <th class=" min-w-100px text-center ">Status</th>
                                    <th class=" min-w-100px text-center ">Export</th>
                                
                                </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
 
                                 <tr class=" text-center border-bottom-2 ">
                                    <td class="text-gray-600  fs-6 text-center">01</td>
                                    <td class="text-gray-600  fs-6 text-center">Ahmed Siasa</td>
                                    <td class="text-gray-600  fs-6">EEG 746</td>
                                    <td class="text-gray-600  fs-6">Dar Es Salaam</td>
                                    <td class="text-gray-600  fs-6">M-Pesa</td>
                                    <td class="text-gray-600  fs-6">12-01-2025</td>
                                    
                                    <td>
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                        <i class="bi bi-check-circle-fill me-1"></i> Successful
                                    </span>
                                    </td>

                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center gap-3">
                                            <a href="reportFormat.html?format=word" class="text-primary" title="View" ><i class="bi bi-file-earmark-word fs-4 me-4"></i></a>
                                            <a href="reportFormat.html?format=excel" class="text-secondary" title="Print" ><i class="bi bi-file-earmark-excel text-success fs-4"></i></a>
                                            <a href="reportFormat.html?format=pdf" class="text-secondary" title="Print" ><i class="bi bi-file-earmark-pdf text-danger fs-4 ms-4"></i></a>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                </div>
                <div>

                </div>
            </div>

        </div>

        <!--modal start-->
        <!-- View Modal -->
                <!-- View Modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md-custom">
                    <div class="modal-content shadow-lg">
                    <!-- Modal Header -->
                     <div id="printSection">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title fw-bold text-primary" id="viewModalLabel">Policy Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Modal Body -->
                     
                    <div class="modal-body">
                        <div class="row gy-3">
                        <div class="col-6">
                            <p class="mb-1"><strong>Client:</strong></p>
                            <p class="text-muted">Ahmed Siasa</p>
                        </div>
                        <div class="col-6">
                            <p class="mb-1"><strong>Policy Number:</strong></p>
                            <p class="text-muted">Pol1234</p>
                        </div>

                        <div class="col-6">
                            <p class="mb-1"><strong>Product:</strong></p>
                            <p class="text-muted">Motor</p>
                        </div>
                        <div class="col-6">
                            <p class="mb-1"><strong>Insurer:</strong></p>
                            <p class="text-muted">Heritage</p>
                        </div>

                        <div class="col-6">
                            <p class="mb-1"><strong>Region:</strong></p>
                            <p class="text-muted">Dar Es Salaam</p>
                        </div>
                        <div class="col-6">
                            <p class="mb-1"><strong>Payment Method:</strong></p>
                            <p class="text-muted">Mobile</p>
                        </div>

                        <div class="col-6">
                            <p class="mb-1"><strong>Premium:</strong></p>
                            <p class="text-muted">100,000.00</p>
                        </div>
                        <div class="col-6">
                            <p class="mb-1"><strong>Date:</strong></p>
                            <p class="text-muted">2025-07-14</p>
                        </div>

                        <div class="col-12">
                            <p class="mb-1"><strong>Status:</strong></p>
                            <span class="badge bg-success px-3 py-2">Success</span>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
            <!--modal end-->

            <!--begin::Global Javascript Bundle(mandatory for all pages)-->
            <script src="../assets/plugins/global/plugins.bundle.js"></script>
            <script src="../assets/js/scripts.bundle.js"></script>
            <!--end::Global Javascript Bundle-->

            <!--begin::Vendors Javascript(used for this page only)-->
            <script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
            <script src="../assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
            <!--end::Vendors Javascript-->

            <!--begin::Custom Javascript(used for this page only)-->
            <script src="../assets/js/widgets.bundle.js"></script>
            <script src="../assets/js/custom/apps/chat/chat.js"></script>
            <script src="../assets/js/custom/utilities/modals/create-campaign.js"></script>
            <script src="../assets/js/custom/utilities/modals/users-search.js"></script>
            <!--begin::Global Javascript Bundle(mandatory for all pages)-->
            <script src="../assets/plugins/global/plugins.bundle.js"></script>
            <script src="../assets/js/scripts.bundle.js"></script>
            <!--end::Global Javascript Bundle-->

            <!--begin::Vendors Javascript(used for this page only)-->
            <script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
            <script src="../assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
            <!--end::Vendors Javascript-->

            <!--begin::Custom Javascript(used for this page only)-->
            <script src="../assets/js/widgets.bundle.js"></script>
            <script src="../assets/js/custom/apps/chat/chat.js"></script>
            <script src="../assets/js/custom/utilities/modals/create-campaign.js"></script>
            <script src="../assets/js/custom/utilities/modals/users-search.js"></script>


            <!-- Add before closing </body> -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

            <script>
                $(document).ready(function () {
                    $('.table').DataTable({
                        "pageLength": 3 // Show only 5 rows per page
                    });
                });
                function printDiv(divId) {
                const printContents = document.getElementById(divId).innerHTML;
                const originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                location.reload(); // Optional: reloads to restore event listeners/styles
                }

            </script>
            

        </div>
</body>

</html>