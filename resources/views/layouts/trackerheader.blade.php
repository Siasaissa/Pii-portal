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
                                        <div class="fw-semibold fs-5"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <div class="text-end mb-3">
                                    <small class="text-white-80 d-block">Last Updated</small>
                                    <div class="fw-semibold">10-Nov-2023</div>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ auth()->user()->role === 'admin' ? route('dash.index') : route('dash.dashboard') }}">
                                        <button class="btn btn-sm btn-outline-light rounded-pill px-3">
                                            <i class="bi bi-house me-1"></i> Dashboard
                                        </button>
                                    </a>
                                    
                                    <a href="{{ route('dash.UnAssigned') }}" style="text-decoration: none;">
                                        <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                            <button class="btn btn-sm text-white" style="background-color: #2E3192;">
                                                <i class="fas fa-eye text-white "></i> Un assigned tracker
                                            </button>
                                        </div>
                                    </a>

                                    <a href="{{ route('dash.tracker') }}" style="text-decoration: none;">
                                        <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                            <button class="btn btn-sm text-white" style="background-color: #2E3192;">
                                                <i class="fas fa-eye text-white "></i>assigned tracker
                                            </button>
                                        </div>
                                    </a>

                                   
                                    <a href="{{ route('dash.sync.trips') }}" style="text-decoration: none;">
                                        <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                            <button class="btn btn-sm text-white" style="background-color: #2E3192;"
                                                id="exportReportBtn">
                                                <i class="fas fa-refresh text-white "></i> Sync Device
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
