<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.heads')
<link rel="stylesheet" href="{{asset('board_files/notification.css')}}">
</head>

<body>
    <div class="app-container container-xxl mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10 col-12">
                <div class="risk-header text-white p-4 mb-5">
                    <div class="position-relative z-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap">
                            <div class="mb-4 mb-md-0">
                                <div class="d-flex align-items-center mb-3">
                                    <h1 class="h2 mb-0">
                                        <i class="bi bi-bell fs-2 section-icon me-3"></i>
                                        Notifications
                                    </h1>
                                </div>
                                <div class="d-flex flex-wrap gap-4">
                                    <div>
                                        <small class="text-white-80 d-block">New Notification</small>
                                        <div class="fw-semibold fs-5">5</div>
                                    </div>
                                    <div>
                                        <small class="text-white-80 d-block">All Notification</small>
                                        <div class="fw-semibold fs-5">290</div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <div class="text-end mb-3">
                                    <small class="text-white-80 d-block">Created</small>
                                    <div class="fw-semibold">10-Nov-2023</div>
                                </div>
                                <div class="d-flex gap-2">

                                    <a href="{{ auth()->user()->role === 'admin' ? route('dash.index') : route('dash.dashboard') }}">
                                        <button class="btn btn-sm btn-outline-light rounded-pill px-3">
                                            <i class="bi bi-house me-1"></i> Dashboard
                                        </button>
                                    </a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-flush">
                    <!--begin::Header-->
                    <div class="card-header pt-7">

                        <!--end::Toolbar-->
                    </div>
                    <div class="card-body pt-6">
                        <div class="mb-4">
                            <h3 class="fw-bold">Notifications</h3>
                            <p class="text-muted">Here's a list of your recent notifications.</p>
                        </div>

                        <!-- Notification 1 - New -->
                        <div class=" mb-3 notification-card new shadow-sm p-3">
                            <div class="d-flex align-items-start">
                                <div class="notification-icon text-warning me-3">
                                    <i class="bi bi-exclamation-circle fs-2"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-1">ID2123 Renew</h6>
                                    <p class="mb-1">ID2123 Renew Subscription of 2 tracker
                                        </p>
                                    <div class="notification-timestamp">2 minutes ago</div>
                                </div>
                            </div>
                        </div>

                        <div class=" mb-3 notification-card new shadow-sm p-3">
                            <div class="d-flex align-items-start">
                                <div class="notification-icon text-danger me-3">
                                    <i class="bi bi-x-circle fs-2"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-1">Cancel the service</h6>
                                    <p class="mb-1">ID 22334 Cancel the service to not need anymore
                                        </p>
                                    <div class="notification-timestamp">10 minutes ago</div>
                                </div>
                            </div>
                        </div>

                        <!-- Notification 2 -->
                        <div class=" mb-3 notification-card shadow-sm p-3">
                            <div class="d-flex align-items-start">
                                <div class="notification-icon text-success me-3">
                                    <i class="bi bi-check-circle fs-2"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-1">Payment Confirmed</h6>
                                    <p class="mb-1">Payment Successful received .</p>
                                    <div class="notification-timestamp">1 hour ago</div>
                                </div>
                            </div>
                        </div>

                        <!-- Notification 3 -->
                        <div class=" mb-3 notification-card shadow-sm p-3">
                            <div class="d-flex align-items-start">
                                <div class="notification-icon text-primary me-3">
                                    <i class="bi bi-info-circle fs-2"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-1">Tracker Deactivated Admin</h6>
                                    <p class="mb-1">Camera Tracker deactivated to not appear anymore
                                        insurance.</p>
                                    <div class="notification-timestamp">Yesterday</div>
                                </div>
                            </div>
                        </div>

                        <!-- Notification 4 - New -->
                        

                    </div>
                </div>
            </div>
        </div>
</body>

</html>