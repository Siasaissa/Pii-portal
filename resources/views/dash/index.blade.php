<!DOCTYPE html>
<!-- saved from url=(0041)https:/.SURETECH Systems.co.tz/dashboard -->
<html lang="en" data-bs-theme="light">
@include('layouts.inde')

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->


    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">


            <!--begin::Header-->
            <div id="kt_app_header" class="app-header " data-kt-sticky="true"
                data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky"
                data-kt-sticky-offset="{default: false, lg: '300px'}">

                <!--begin::Header container-->
                <div class="app-container  container-xxl d-flex align-items-stretch justify-content-between "
                    id="kt_app_header_container">
                    <!--begin::Header mobile toggle-->

                    <!--end::Header mobile toggle-->

                    <!--begin::Logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                        <a href="https:/.SURETECH Systems.co.tz/dashboard">
                            <img alt="Logo" src="{{asset('board_files/logo.jpg')}}"
                                class="h-80px h-lg-80px app-sidebar-logo-default theme-light-show mt-2" />
                    </div>
                    <!--end::Logo-->

                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1"
                        id="kt_app_header_wrapper">
                        <!--begin::Menu wrapper-->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                            data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                            data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
                            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                            <!--begin::Menu-->

                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->

                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">
                            <!--begin::Search-->
                            <div class="app-navbar-item align-items-stretch ms-1 ms-lg-3">

                                <!--begin::Search-->
                                <div id="kt_header_search" class="header-search d-flex align-items-stretch"
                                    data-kt-search-keypress="true" data-kt-search-min-length="2"
                                    data-kt-search-enter="enter" data-kt-search-layout="menu"
                                    data-kt-menu-trigger="auto" data-kt-menu-overflow="false"
                                    data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
                                    <!--end::Menu-->
                                </div>
                                <!--end::Search-->
                            </div>



                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="d-flex justify-content-center ms-4 me-15 ">
                                    <div class="d-flex fw-bold text-primary ms-20 me-10 menu-link px-2"
                                        style="color: rgb(15, 15, 83) !important;">
                                        <a href="#" style="text-decoration: none; color: inherit;">
                                            <span>Support</span></a>
                                    </div>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                style="border: none; background: none; color: inherit; font-weight: bold; cursor: pointer;">
                                                Logout
                                            </button>
                                        </form>
                                    <div class="d-flex fw-bold text-primary ms-4 menu-link"
                                        style="color: red !important;">
                                        <a href="#" style="text-decoration: none; color: #F9A61A;"><span>Welcome Back Admin|
                                                {{ Auth::user()->name }}</span></a>
                                    </div>
                                    <!--
                                    <div class="d-flex fw-bold text-primary ms-4 menu-link">
                                        <a href="../index.html">
                                        <button class="btn btn-primary btn-sm">Logout</button>
                                        </a>

                                    </div>
                                    -->
                                </div>
                                <div class="cursor-pointer symbol symbol-35px symbol-md-40px"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">

                                    <!-- Begin: User Initials as Avatar -->
                                    <!-- Your initials div with popover attributes -->
                                    <div class="symbol-label  text-white fw-bold fs-4 d-flex align-items-center justify-content-center rounded-circle"
                                        style="width: 50px; height: 50px; cursor: pointer; background-color: #F9A61A;" data-bs-toggle="popover"
                                        data-bs-trigger="hover" data-bs-placement="right" data-bs-html="true"
                                        data-bs-content='
                                        <div class="popover-profile">
                                            <div class="d-flex align-items-center mb-2">

                                                <div>
                                                    <h6 class="mb-0">Ahmad Siasa</h6>
                                                    <small class="text-muted">Software Developer</small>
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col-6"><small><strong>Email:</strong><br>ahmed@humtech.co.tz</small></div>
                                                <div class="col-6"><small><strong>Phone:</strong><br>0613 803662-</small></div>
                                                <div class="col-6"><small><strong>Department:</strong><br>Development</small></div>
                                                <div class="col-6"><small><strong>Joined:</strong><br>Jan 2020</small></div>
                                            </div>
                                        </div>
                                    '>
                                        AS
                                    </div>

                                    <!-- Optional: Status dot -->
                                    <div
                                        class="position-absolute translate-middle bottom-0 start-100 ms-n1 mb-7 rounded-circle h-10px w-10px" style="background-color: #F9A61A;">
                                    </div>
                                </div>

                                
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">

                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar (Initials instead of image)-->
                                            <div class="cursor-pointer symbol symbol-35px symbol-md-40px"
                                                data-kt-menu-trigger="{default: &#39;click&#39;, lg: &#39;hover&#39;}"
                                                data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">

                                                <!-- Begin: User Initials as Avatar -->
                                                <div class="symbol-label bg-primary text-white fw-bold fs-4 d-flex align-items-center justify-content-center rounded-circle"
                                                    style="width: 50px; height: 50px;">
                                                    IM
                                                </div>

                                                <!-- Optional: Status dot -->
                                                <div
                                                    class="position-absolute translate-middle bottom-0 start-100 ms-n1 mb-7 bg-danger rounded-circle h-10px w-10px">
                                                </div>
                                            </div>
                                            <!--end::Avatar-->

                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                    SURETECH Systems
                                                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">
                                                        admin
                                                    </span>
                                                </div>

                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                                    h.zuheri@SURETECH Systems.co.tz
                                                </a>
                                            </div>
                                            <!--end::Username-->
                                        </div>

                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="../account/overview.html" class="menu-link px-5">
                                            My Profile
                                        </a>
                                    </div>
                                    <!--end::Menu item-->


                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->




                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5 my-1">
                                        <a href="../account/settings.html" class="menu-link px-5">
                                            Account Settings
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <form method="POST" action="https:/.SURETECH Systems.co.tz/logout">
                                            <input type="hidden" name="_token"
                                                value="9IWdQgSdUy3b0mZ2V7oBOo0xJS9Hl9JxOilhlyoA" autocomplete="off"> <a
                                                href="#" class="menu-link px-5"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                Sign Out
                                            </a>
                                        </form>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->

                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->

                            <!--begin::Header menu toggle-->
                            <!--end::Header menu toggle-->
                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">


                        <!--begin::Toolbar-->

                        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-18 ">

                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center me-3 ">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-white fw-bold fs-3 flex-column justify-content-center my-0 "
                                        style="color: rgb(7, 7, 85) !important; ">
                                        Management Portal
                                    </h1>
                                    <!--end::Title-->


                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-primary">
                                            <a href="https:/.SURETECH Systems.co.tz/dashboard"
                                                class=" text-hover-primary" style="color: #2E3192;">
                                                Home | </a>
                                        </li>

                                        <li class="breadcrumb-item " style="color: #2E3192;">
                                            Dashboard </li>
                                        <!--end::Item-->

                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Floating label card (static)-->
                                    <div
                                        class="toolbar-select form-floating w-175px w-lg-175px h-55px me-4 bg-white rounded">
                                        <!-- Centered text container -->
                                        <div class="h-55px d-flex align-items-center justify-content-center">
                                            <span class="fs-5 fw-bold"
                                                style="color: rgb(12, 12, 138) !important;">Customer</span>
                                        </div>
                                        <!-- Floating label -->
                                    </div>
                                    <!--end::Floating label card-->

                                    <!--begin::New Campaign Button-->
                                    <a href="#" class="btn btn-icon   h-55px w-55px" data-bs-toggle="modal"
                                        data-bs-target="#dashmodal" title="New product" style="background-color: #F9A61A;">
                                        <i class="fas fa-plus fs-2 text-white"></i>
                                    </a>
                                    <!--end::New Campaign Button-->
                                </div>

                                <!--end::Actions-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content  flex-column-fluid ">


                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container  container-xxl ">


                                <!--begin::Row-->
                                <div class="row gx-5 gx-xl-10">
                                    <!--begin::Col-->
                                    <div class="col-xl-4 mb-10">

                                        <!--begin::Lists Widget 19-->
                                        <div class="card card-flush h-xl-100">
                                            <!--begin::Heading-->
                                            <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
                                                style="background: linear-gradient(135deg, #F9A61A 0%, #F9A61A 30%, #001538 100%);
           background-size: 300% 300%;
           animation: gradientShift 10s ease infinite;" data-bs-theme="light">




                                                <!--begin::Title-->
                                                <h3 class="card-title align-items-start flex-column text-white pt-15">
                                                    <span class="fw-bold fs-2x mb-3">Total Transactions</span>

                                                    <div class="fs-4 text-white">


                                                        <span class="position-relative d-inline-block">
                                                            <a href="../pages/user-profile/projects.html"
                                                                class="text-white fs-2x fw-bold d-block mb-1">Tsh.
                                                                100,000,000.00 </a>

                                                            <!--begin::Separator-->
                                                            <span
                                                                class="position-absolute opacity-50 bottom-0 start-0 border-2 border-body border-bottom w-100"></span>
                                                            <!--end::Separator-->
                                                        </span>


                                                    </div>
                                                </h3>
                                                <!--end::Title-->

                                                <!--begin::Toolbar-->
                                                <div class="card-toolbar pt-5">
                                                    <!--begin::Menu Trigger Button-->

                                                    <!--end::Menu Trigger Button-->

                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                        data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <div
                                                                class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">
                                                                Quick Actions</div>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu separator-->
                                                        <div class="separator mb-3 opacity-75"></div>
                                                        <!--end::Menu separator-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                New Ticket
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                New Customer
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item with Submenu-->
                                                        <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                            data-kt-menu-placement="right-start">
                                                            <a href="#" class="menu-link px-3">
                                                                <span class="menu-title">New Group</span>
                                                                <span class="menu-arrow"></span>
                                                            </a>

                                                            <!--begin::Menu sub-->
                                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3">
                                                                        Admin Group
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3">
                                                                        Staff Group
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3">
                                                                        Member Group
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!--end::Menu sub-->
                                                        </div>
                                                        <!--end::Menu item with Submenu-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                New Contact
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu separator-->
                                                        <div class="separator mt-3 opacity-75"></div>
                                                        <!--end::Menu separator-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <div class="menu-content px-3 py-3">
                                                                <a class="btn btn-primary btn-sm px-4" href="#">
                                                                    Generate Reports
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu-->
                                                </div>
                                                <!--end::Toolbar-->
                                            </div>
                                            <!--begin::Body-->
                                            <div class="card-body mt-n20">
                                                <!--begin::Stats-->
                                                <div class="mt-n20 position-relative">
                                                    <!--begin::Row-->
                                                    <div class="row g-3 mt-10 g-lg-6">
                                                        <!-- Example of one card -->
                                                        <div class="col-4 d-flex justify-content-center">
                                                            <a href="#" class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center">
                                                                        <span class="symbol-label bg-light-danger rounded-3">
                                                                            <i
                                                                                class="bi bi-house fs-1 fw-bold" style="color: #F9A61A !important; "></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <span
                                                                            class="text-gray-700 fw-bolder d-block fs-9 text-nowrap">Dashboard</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="col-4 d-flex justify-content-center ">
                                                            <a href="{{route('dash.Customers')}}"
                                                                class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center">
                                                                        <span class="symbol-label bg-light-danger rounded-3">
                                                                            <i
                                                                                class="bi bi-person-plus fs-1 fw-bold" style="color: #F9A61A !important; "></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <span
                                                                            class="text-gray-700 fw-bolder d-block fs-9 text-nowrap">Customers</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="col-4 d-flex justify-content-center">
                                                            <a href="{{ route('dash.tracker') }}"
                                                                class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center">
                                                                        <span class="symbol-label bg-light-danger rounded-3">
                                                                            <i
                                                                                class="bi bi-clipboard2-pulse fs-1 " style="color: #F9A61A !important; "></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <span
                                                                            class="text-gray-700 fw-bolder d-block fs-9 text-nowrap">Tracker</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="col-4 d-flex justify-content-center">
                                                            <a href="{{ route('dash.tarriff.index') }}"
                                                                class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center">
                                                                        <span class="symbol-label bg-light-danger rounded-3">
                                                                            <i class="bi bi-wallet2 fs-1" style="color: #F9A61A !important; "></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <span
                                                                            class="text-gray-700 fw-bolder d-block fs-9 text-nowrap">Tariff</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="col-4 d-flex justify-content-center">
                                                            <a href="{{route('dash.Transaction')}}"
                                                                class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center">
                                                                        <span class="symbol-label bg-light-danger rounded-3">
                                                                            <i class="bi bi-briefcase fs-1" style="color: #F9A61A !important; "></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <span
                                                                            class="text-gray-700 fw-bolder d-block fs-9 text-nowrap">Transaction</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="col-4 d-flex justify-content-center">
                                                            <a href="{{route('dash.Services')}}"
                                                                class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center">
                                                                        <span class="symbol-label bg-light-danger rounded-3">
                                                                            <i class="bi bi-gear fs-1" style="color: #F9A61A !important; "></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <span
                                                                            class="text-gray-700 fw-bolder d-block fs-9 text-nowrap">services</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="col-4 d-flex justify-content-center">
                                                            <a href="{{route('dash.Report')}}"
                                                                class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center">
                                                                        <span class="symbol-label bg-light-danger rounded-3">
                                                                            <i class="bi bi-file-earmark-medical fs-1" style="color: #F9A61A !important; "></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <span
                                                                            class="text-gray-700 fw-bolder d-block fs-9 text-nowrap">Report</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="col-4 d-flex justify-content-center">
                                                            <a href="{{route('dash.Setting')}}"
                                                                class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center">
                                                                        <span class="symbol-label bg-light-danger rounded-3">
                                                                            <i class="bi bi-gear-wide-connected fs-1" style="color: #F9A61A !important; "></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <span
                                                                            class="text-gray-700 fw-bolder d-block fs-9 text-nowrap text-center">Settings</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>


                                                        <div class="col-4 d-flex justify-content-center">
                                                            <a href="{{ route('dash.Messages.index') }}"
                                                                class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center">
                                                                        <span class="symbol-label bg-light-danger rounded-3">
                                                                            <i
                                                                                class="bi bi-chat-left-text fs-1 " style="color: #F9A61A !important; "></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <span
                                                                            class="text-gray-700 fw-bolder d-block fs-9 text-nowrap">Messages</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="col-4 d-flex justify-content-center">
                                                            <a href="{{route('dash.Notification')}}" class="d-block w-100 text-decoration-none">
                                                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100 position-relative">
                                                                <div class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center position-relative">
                                                                    <span class="symbol-label position-relative bg-light-danger rounded-3">
                                                                    <i class="bi bi-bell fs-1 " style="color: #F9A61A;"></i>
                                                                    <!-- Notification badge -->
                                                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-white">
                                                                        3
                                                                        <span class="visually-hidden">unread messages</span>
                                                                    </span>
                                                                    </span>
                                                                </div>
                                                                <div class="text-center">
                                                                    <span class="text-gray-700 fw-bolder d-block fs-9 text-nowrap">Notifications</span>
                                                                </div>
                                                                </div>
                                                            </a>
                                                            </div>

                                                        <div class="col-4 d-flex justify-content-center">
                                                            <a href="{{route('dash.User')}}"
                                                                class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center">
                                                                        <span class="symbol-label bg-light-danger rounded-3">
                                                                            <i
                                                                                class="bi bi-people  fs-1 " style="color: #F9A61A !important; "></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <span
                                                                            class="text-gray-700 fw-bolder d-block fs-9 text-nowrap">Users</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="col-4 d-flex justify-content-center">
                                                            <a href="{{ route('dash.Quotation') }}"
                                                                class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center">
                                                                        <span class="symbol-label bg-light-danger rounded-3">
                                                                            <i
                                                                                class="bi bi-archive fs-1" style="color: #F9A61A !important; "></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <span
                                                                            class="text-gray-700 fw-bolder d-block fs-9 text-nowrap">Quotation</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        
                                                    </div>

                                                    <!--end::Row-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Lists Widget 19-->
                                    </div>
                                    <!--end::Col-->

                                    <style>
                                        @keyframes gradientShift {
                                            0% {
                                                background-position: 0% 50%;
                                            }

                                            50% {
                                                background-position: 100% 50%;
                                            }

                                            100% {
                                                background-position: 0% 50%;
                                            }
                                        }
                                    </style>

                                    <!--begin::Col-->
                                    <div class="col-xl-8 mb-10">
                                        <!--begin::Row-->
                                        <div class="row g-5 g-xl-10">
                                            <!--begin::Col-->
                                            <div class="col-xl-6 mb-xl-10">


                                                <!--begin::Slider Widget 1-->
                                                <div id="kt_sliders_widget_campaigns"
                                                    class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100"
                                                    data-bs-ride="carousel" data-bs-interval="5500">
                                                    <!--begin::Header-->
                                                    <div class="card-header pt-5">
                                                        <h4 class="card-title d-flex align-items-start flex-column">
                                                            <span
                                                                class="card-label fw-bold text-light text-warning">Latest
                                                                Updates</span>
                                                        </h4>
                                                        <div class="card-toolbar">
                                                            <ol
                                                                class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-warning">
                                                                <li data-bs-target="#kt_sliders_widget_campaigns"
                                                                    data-bs-slide-to="0" class="active ms-1"></li>
                                                                <li data-bs-target="#kt_sliders_widget_campaigns"
                                                                    data-bs-slide-to="1" class="ms-1"></li>
                                                                <li data-bs-target="#kt_sliders_widget_campaigns"
                                                                    data-bs-slide-to="2" class="ms-1"></li>

                                                            </ol>
                                                        </div>
                                                    </div>
                                                    <!--end::Header-->

                                                    <!--begin::Body-->
                                                    <div class="card-body py-6">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active show">
                                                                <div class="d-flex align-items-center mb-9">
                                                                    <div
                                                                        class="symbol symbol-70px symbol-circle me-5 position-relative">
                                                                        <span
                                                                            class="symbol-label bg-light-warning shadow-sm">
                                                                            <i class="bi bi-gear fs-3x position-relative"
                                                                                style="z-index: 1; color: #2E3192;">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                            </i>
                                                                            <!-- Glow effect -->
                                                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-circle  animate-pulse" style="background-color: #F9A61A; opacity: 0.5;"></span>
                                                                                
                                                                        </span>
                                                                    </div>

                                                                    <div class="m-0">
                                                                        <h4
                                                                            class="fw-bold  mb-3 animate__animated animate__fadeInRight" style="color: #2E3192;">
                                                                            Total Services
                                                                        </h4>

                                                                        <div class="d-flex d-grid gap-5">
                                                                            <div
                                                                                class="d-flex flex-column flex-shrink-0 me-4">
                                                                                <div class="d-flex align-items-center fs-10 fw-bold text-gray-500 mb-2 animate__animated animate__fadeInUp"
                                                                                    style="animation-delay: 0.1s">
                                                                                    <i class=" fs-6  me-2" style="color: #2E3192;">
                                                                                        <span class="path1"></span>
                                                                                        <span class="path2"></span>
                                                                                        <span class="path3"></span>
                                                                                    </i>
                                                                                    <span
                                                                                        class="fs-1  ms-1" style="color: #2E3192;">{{ $totalService }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="m-0 animate__animated animate__fadeInUp"
                                                                    style="animation-delay: 0.4s;">
                                                                    <a href="{{ route('dash.Services') }}"
                                                                        class="btn btn-sm  mb-2 btn-hover-rise"
                                                                        style="background-color: #2E3192; color: white;">
                                                                        View Details
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="carousel-item ">
                                                                <div class="d-flex align-items-center mb-9">
                                                                    <div
                                                                        class="symbol symbol-70px symbol-circle me-5 position-relative">
                                                                        <span
                                                                            class="symbol-label bg-light-warning shadow-sm">
                                                                            <i class="bi bi-repeat fs-3x  position-relative"
                                                                                style="z-index: 1; color: #2E3192;">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                            </i>
                                                                            <!-- Glow effect -->
                                                                        
                                                                                <span class="position-absolute top-0 start-0 w-100 h-100 rounded-circle  animate-pulse" style="background-color: #F9A61A; opacity: 0.5;"></span>
                                                                        </span>
                                                                    </div>

                                                                    <div class="m-0">
                                                                        <h4
                                                                            class="fw-bold  mb-3 animate__animated animate__fadeInRight" style="color: #2E3192;">
                                                                            Total Renewals
                                                                        </h4>

                                                                        <div class="d-flex d-grid gap-5">
                                                                            <div
                                                                                class="d-flex flex-column flex-shrink-0 me-4">
                                                                                <div class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2 animate__animated animate__fadeInUp"
                                                                                    style="animation-delay: 0.1s">

                                                                                    <span
                                                                                        class="fs-2  ms-1" style="color: #2E3192;">101</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="m-0 animate__animated animate__fadeInUp"
                                                                    style="animation-delay: 0.4s">
                                                                    <a href="Agents.html"
                                                                        class="btn btn-sm  mb-2 btn-hover-rise"
                                                                        style="background-color: #2E3192; color: white;">

                                                                        View Details
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="carousel-item ">
                                                                <div class="d-flex align-items-center mb-9">
                                                                    <div
                                                                        class="symbol symbol-70px symbol-circle me-5 position-relative">
                                                                        <span
                                                                            class="symbol-label bg-light-warning shadow-sm">
                                                                            <i class="bi bi-person fs-3x position-relative"
                                                                                style="z-index: 1; color: #2E3192;">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                            </i>
                                                                            <!-- Glow effect -->
                                                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-circle  animate-pulse" style="background-color: #F9A61A; opacity: 0.5;"></span>
                                                                        </span>
                                                                    </div>

                                                                    <div class="m-0">
                                                                        <h4
                                                                            class="fw-bold mb-3 animate__animated animate__fadeInRight" style="color: #2E3192 ;">
                                                                            Total Customers
                                                                        </h4>

                                                                        <div class="d-flex d-grid gap-5">
                                                                            <div
                                                                                class="d-flex flex-column flex-shrink-0 me-4">
                                                                                <div class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2 animate__animated animate__fadeInUp"
                                                                                    style="animation-delay: 0.1s">

                                                                                    <span
                                                                                        class="fs-2 ms-1" style="color: #2E3192;">{{ $totalCustomer }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="m-0 animate__animated animate__fadeInUp text-warning"
                                                                    style="animation-delay: 0.4s">
                                                                    <a href="{{ route('dash.Customers') }}"
                                                                        class="btn btn-sm  mb-2 btn-hover-rise"
                                                                        style="background-color: #2E3192; color: white;">
                                                                        View Details
                                                                    </a>
                                                                </div>


                                                            </div>


                                                        </div>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>


                                                <!--end::Slider Widget 1-->


                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-xl-6 mb-5 mb-xl-10">


                                                <!--begin::Slider Widget 2-->
                                                <div id="kt_sliders_widget_2_slider"
                                                    class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100"
                                                    data-bs-ride="carousel" data-bs-interval="5500">
                                                    <!--begin::Header-->
                                                    <div class="card-header pt-5">
                                                        <!--begin::Title-->
                                                        <h4 class="card-title d-flex align-items-start flex-column">
                                                            <span
                                                                class="card-label fw-bold text-light text-warning">Latest
                                                                Updates</span>

                                                        </h4>
                                                        <!--end::Title-->

                                                        <!--begin::Toolbar-->
                                                        <div class="card-toolbar">
                                                            <!--begin::Carousel Indicators-->
                                                            <ol
                                                                class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-warning">
                                                                <li data-bs-target="#kt_sliders_widget_2_slider"
                                                                    data-bs-slide-to="0" class="active ms-1"></li>
                                                                <li data-bs-target="#kt_sliders_widget_2_slider"
                                                                    data-bs-slide-to="1" class="ms-1"></li>
                                                                <li data-bs-target="#kt_sliders_widget_2_slider"
                                                                    data-bs-slide-to="2" class="ms-1"></li>
                                                            </ol>
                                                            <!--end::Carousel Indicators-->
                                                        </div>
                                                        <!--end::Toolbar-->
                                                    </div>
                                                    <!--end::Header-->

                                                    <!--begin::Body-->
                                                    <div class="card-body py-6">
                                                        <!--begin::Carousel-->
                                                        <div class="carousel-inner">
                                                            <!--begin::Item-->
                                                            <div class="carousel-item active show">
                                                                <!--begin::Wrapper-->
                                                                <div class="d-flex align-items-center mb-9">
                                                                    <!--begin::Symbol-->
                                                                    <div
                                                                        class="symbol symbol-70px symbol-circle me-5 position-relative">
                                                                        <span
                                                                            class="symbol-label bg-light-warning shadow-sm">
                                                                            <i class="bi bi-briefcase fs-3x  position-relative"
                                                                                style="z-index: 1; color: #2E3192;">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                            </i>
                                                                            <!-- Glow effect -->
                                                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-circle  animate-pulse" style="background-color: #F9A61A; opacity: 0.5;"></span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="m-0">
                                                                        <!--begin::Subtitle-->
                                                                        <h4
                                                                            class="fw-bold mb-3 animate__animated animate__fadeInRight" style="color: #2E3192;">
                                                                            Total Transaction</h4> <!--end::Subtitle-->
                                                                        <!--begin::Items-->
                                                                        <div class="d-flex d-grid gap-5">
                                                                            <!--begin::Item-->
                                                                            <div
                                                                                class="d-flex flex-column flex-shrink-0 me-4">
                                                                                <!-- Status with animated checkmark -->
                                                                                <div class="d-flex align-items-center fs-7 fw-bold  mb-2 animate__animated animate__fadeInUp"
                                                                                    style="animation-delay: 0.1s">
                                                                                    <div class="status-indicator me-2">

                                                                                    </div>
                                                                                    <span
                                                                                        class="fs-2 ms-1" style="color: #2E3192;">10,000.00</span>
                                                                                </div>

                                                                                <!-- Request date with calendar icon -->

                                                                            </div>

                                                                        </div>
                                                                        <!--end::Items-->
                                                                    </div>
                                                                    <!--end::Info-->
                                                                </div>
                                                                <!--end::Wrapper-->

                                                                <!--begin::Action-->
                                                                <div class="m-0 animate__animated animate__fadeInUp"
                                                                    style="animation-delay: 0.4s">

                                                                    <a href="Transaction.html"
                                                                        class="btn btn-sm  mb-2 btn-hover-rise"
                                                                        style="background-color: #2E3192; color: white;">

                                                                        view Details
                                                                    </a>
                                                                </div>
                                                                <!--end::Action-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="carousel-item ">
                                                                <!--begin::Wrapper-->
                                                                <div class="d-flex align-items-center mb-9">
                                                                    <!--begin::Symbol-->
                                                                    <div
                                                                        class="symbol symbol-70px symbol-circle me-5 position-relative">
                                                                        <span
                                                                            class="symbol-label bg-light-warning shadow-sm">
                                                                            <i class="bi bi-check-all fs-3x  position-relative"
                                                                                style="z-index: 1; color: #2E3192;">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                            </i>
                                                                            <!-- Glow effect -->
                                                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-circle  animate-pulse" style="background-color: #F9A61A; opacity: 0.5;"></span>
                                                                        </span>
                                                                    </div>
                                                                    <!--end::Symbol-->

                                                                    <!--begin::Info-->
                                                                    <div class="m-0">
                                                                        <h4
                                                                            class="fw-bold  mb-3 animate__animated animate__fadeInRight" style="color: #2E3192;">
                                                                            Successfully Transaction</h4>
                                                                        <div class="d-flex d-grid gap-5">
                                                                            <!--begin::Item-->
                                                                            <div
                                                                                class="d-flex flex-column flex-shrink-0 me-4">
                                                                                <!-- Status with animated checkmark -->
                                                                                <div class="d-flex align-items-center fs-7 fw-bold  mb-2 animate__animated animate__fadeInUp"
                                                                                    style="animation-delay: 0.1s">
                                                                                    <div class="status-indicator me-2">

                                                                                    </div>
                                                                                    <span
                                                                                        class="fs-2  ms-1" style="color: #2E3192;">10,000.00</span>
                                                                                </div>

                                                                                <!-- Request date with calendar icon -->

                                                                            </div>

                                                                        </div>
                                                                        <!--end::Items-->
                                                                    </div>
                                                                    <!--end::Info-->
                                                                </div>
                                                                <!--end::Wrapper-->

                                                                <!--begin::Action-->
                                                                <div class="m-0 animate__animated animate__fadeInUp"
                                                                    style="animation-delay: 0.4s">

                                                                    <a href="Transaction.html"
                                                                        class="btn btn-sm mb-2 btn-hover-rise"
                                                                        style="background-color: #2E3192; color: white;">

                                                                        view Details
                                                                    </a>
                                                                </div>
                                                                <!--end::Action-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="carousel-item ">
                                                                <!--begin::Wrapper-->
                                                                <div class="d-flex align-items-center mb-9">
                                                                    <!--begin::Symbol-->
                                                                    <div
                                                                        class="symbol symbol-70px symbol-circle me-5 position-relative">
                                                                        <span
                                                                            class="symbol-label bg-light-warning shadow-sm">
                                                                            <i class="bi bi-award fs-3x position-relative"
                                                                                style="z-index: 1;color: #2E3192;">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                            </i>
                                                                            <!-- Glow effect -->
                                                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-circle  animate-pulse" style="background-color: #F9A61A; opacity: 0.5;"></span>
                                                                        </span>
                                                                    </div>
                                                                    <!--end::Symbol-->

                                                                    <!--begin::Info-->
                                                                    <div class="m-0">
                                                                        <!--begin::Subtitle-->
                                                                        <h4
                                                                            class="fw-bold mb-3 animate__animated animate__fadeInRight" style="color: #2E3192;">
                                                                            Commission</h4> <!--end::Subtitle-->

                                                                        <!--begin::Items-->
                                                                        <div class="d-flex d-grid gap-5">
                                                                            <!--begin::Item-->
                                                                            <div
                                                                                class="d-flex flex-column flex-shrink-0 me-4">
                                                                                <!-- Status with animated checkmark -->
                                                                                <div class="d-flex align-items-center fs-7 fw-bold mb-2 animate__animated animate__fadeInUp"
                                                                                    style="animation-delay: 0.1s">
                                                                                    <div class="status-indicator me-2">

                                                                                    </div>
                                                                                    <span
                                                                                        class="fs-2 ms-1" style="color: #2E3192;">100,000.00</span>
                                                                                </div>

                                                                                <!-- Request date with calendar icon -->

                                                                            </div>

                                                                        </div>
                                                                        <!--end::Items-->
                                                                    </div>
                                                                    <!--end::Info-->
                                                                </div>
                                                                <!--end::Wrapper-->

                                                                <!--begin::Action-->
                                                                <div class="m-0 animate__animated animate__fadeInUp"
                                                                    style="animation-delay: 0.4s">

                                                                    <a href="Commission.html"
                                                                        class="btn btn-sm mb-2 btn-hover-rise"
                                                                        style="background-color: #2E3192; color: white;">

                                                                        view Details
                                                                    </a>
                                                                </div>
                                                                <!--end::Action-->
                                                            </div>
                                                            <!--end::Item-->


                                                            <!--end::Item-->
                                                            <!--begin::Item-->

                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Carousel-->
                                                    </div>
                                                    <!--end::Body-->
                                                </div>

                                                <!-- Add animate.css for additional animations -->
                                                <link rel="stylesheet"
                                                    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
                                                <!--end::Slider Widget 2-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Engage widget 4-->
                                        <div class="card border-transparent " data-bs-theme="light"
                                            style="background-color: #ffffff;">
                                            <!--begin::Body-->
                                            <div class="card card-flush h-xl-100">
                                                <!--begin::Header-->
                                                <div class="card-header pt-7">
                                                    <!--begin::Title-->
                                                    <h3 class="card-title align-items-start flex-column">
                                                        <span
                                                            class="card-label fw-bold text-gray-800 d-flex align-items-center">
                                                            Transaction Trends
                                                            <span class="dropdown ms-2">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-icon btn-light-warning"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fas fa-chevron-down fs-8"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="#">Today's
                                                                            Transaction</a></li>
                                                                    <li><a class="dropdown-item" href="#">Last 7
                                                                            Days</a></li>
                                                                    <li><a class="dropdown-item" href="#">This Month</a>
                                                                    </li>

                                                                </ul>
                                                            </span>
                                                        </span>
                                                        <span class="text-gray-500 mt-1 fw-semibold fs-6">Real-time
                                                            Transaction analytics</span>
                                                    </h3>
                                                    <!--end::Title-->

                                                    <!--begin::Toolbar-->
                                                    <div class="card-toolbar">
                                                        <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                                                        <div data-kt-daterangepicker="true"
                                                            data-kt-daterangepicker-opens="left"
                                                            class="btn btn-sm btn-light d-flex align-items-center px-4">
                                                            <!--begin::Display range-->
                                                            <div class="text-gray-600 fw-bold">
                                                                Loading date range...
                                                            </div>
                                                            <!--end::Display range-->

                                                            <i class="bi bi-calendar text-gray-500 lh-0 fs-2 ms-2 me-0"><span
                                                                    class="path1"></span><span
                                                                    class="path2"></span><span
                                                                    class="path3"></span><span
                                                                    class="path4"></span><span
                                                                    class="path5"></span><span class="path6"></span></i>
                                                        </div>
                                                        <!--end::Daterangepicker-->
                                                    </div>
                                                    <!--end::Toolbar-->
                                                </div>
                                                <!--end::Header-->

                                                <!--begin::Body-->
                                                <div class="card">
                                                    <div class="card-body d-flex align-items-end px-0 pt-3 pb-5">
                                                        <!-- Chart Container -->
                                                        <div id="kt_charts_widget_18_chart"
                                                            class="w-100 min-h-auto ps-4 pe-6"
                                                            style="min-height: 1000px; color: #2E3192;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <div class="card mt-5">
                                            <div class="card-body text-center">
                                                <i class="fs-2">"Your Peace of Mind, Our Priority"</i>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->


                                <!--begin::Row-->
                                <div class="row g-5 g-xl-10">
                                    <!--begin::Col-->
                                    <div class="col-xl-4">

                                        <!--begin::List widget 21-->
                                        <div class="card card-flush h-xl-100">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold text-gray-900">Top Customers</span>

                                                    <span class="text-muted mt-1 fw-semibold fs-7">with Achieved high
                                                        Amount of Transaction</span>
                                                </h3>

                                                <!--begin::Toolbar-->
                                                <div class="card-toolbar">
                                                    <a href="#" class="btn btn-sm btn-light">All Customers</a>
                                                </div>
                                                <!--end::Toolbar-->
                                            </div>
                                            <!--end::Header-->

                                            <!--begin::Body-->
                                            <div class="card-body pt-5">

                                                <!--begin::Item-->
                                                @foreach ($customers as $customer )
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex align-items-center me-3">
                                                        <!--begin::Logo-->
                                                        <!-- <img src="../assets/media/svg/brand-logos/laravel-2.svg" class="me-4 w-30px" alt="" /> -->
                                                        <!--end::Logo-->

                                                        <!--begin::Section-->
                                                        <div class="flex-grow-1">
                                                            <!--begin::Text-->
                                                            <a href="#"
                                                                class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{ $customer->name }}</a>

                                                            <span
                                                                class="text-gray-500 fw-semibold d-block fs-6">1,030,000
                                                            </span>
                                                            <!--end::Description--->
                                                        </div>
                                                        <!--end::Section-->
                                                    </div>
                                                    <!--end::Wrapper-->

                                                    <!--begin::Statistics-->
                                                    <div class="d-flex align-items-center w-100 mw-125px">
                                                        <!--begin::Progress-->
                                                        <div class="progress h-6px w-100 me-2 bg-light-success">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                        <!--end::Progress-->

                                                        <!--begin::Value-->
                                                        <span class="text-gray-500 fw-semibold">
                                                            90%
                                                        </span>
                                                        <!--end::Value-->
                                                    </div>
                                                    <!--end::Statistics-->
                                                </div>
                                                <!--end::Item-->

                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed my-3"></div>
                                                 @endforeach
                                                
                                                



                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::List widget 21-->
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-xl-8">
                                        <!--begin::Chart widget 18-->
                                        <div class="card card-flush h-xl-100">
                                            <!--begin::Header-->

                                            <!--end::Header-->

                                            <!--begin::Body-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title justify-content-center">Clients Locations</h5>
                                                    <div class="ratio ratio-16x9">
                                                        <iframe
                                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12786523.282728717!2d28.0322658!3d-6.369028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x184b5109bcb3b3d5%3A0x2b1866d03d4a6474!2sTanzania!5e0!3m2!1sen!2stz!4v1621780079143!5m2!1sen!2stz"
                                                            width="100%" height="100%" style="border:0;"
                                                            allowfullscreen="" loading="lazy">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--end: Card Body-->
                                        </div>
                                        <!--end::Chart widget 18-->

                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <br><br>


                                <div class="col-xl-12">

                                    <!--begin::Table widget 14-->
                                    <div class="card card-flush h-md-100">
                                        <!--begin::Header-->
                                        <div class="card-header pt-7">
                                            <!--begin::Title-->
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold text-gray-800">Latest Transaction</span>

                                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Updated 37 minutes
                                                    ago</span>
                                            </h3>
                                        </div>
                                        <!--end::Header-->

                                        <!--begin::Body-->
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
                                        
                                    </tr>
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                                        </div>
                                        <!--end: Card Body-->
                                    </div>
                                    <!--end::Table widget 14-->
                                </div>



                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->

                        <script>
                            var myCarousel = document.querySelector('#kt_sliders_widget_campaigns');
                            var carousel = new bootstrap.Carousel(myCarousel);
                        </script>


                    </div>
                    <!--end::Content wrapper-->


                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer  py-2 py-lg-4 ">



                        <!--begin::Footer container-->
                        <div
                            class="app-container  container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack ">
                            <!--begin::Copyright-->
                            <div class="text-gray-900 order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2025&copy;</span>
                                <a href="https://SURETECH Systems.co.tz/" target="_blank"
                                    class="text-gray-800 text-hover-primary">Developed By PII .</a>
                            </div>
                            <!--end::Copyright-->

                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                <li class="menu-item"><a href="#" class="menu-link px-2">Support</a></li>

                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Footer container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->


            </div>
            <!--end::Wrapper-->


        </div>
        <!--end::Page-->
    </div>
    <!--modals start -->
    <!--modal 1-->
    <div class="modal fade" id="dashmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- Optional: modal-lg for larger width -->
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <div>
                        <h4 class="modal-title">New Customer</h4>
                        <div class="text-muted fs-6">23 June 2025</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <!-- Buttons -->
                    <div class="row g-4 fs-2">
                        <a href="{{ route('dash.Customers') }}" >
                        <div class="col-md-12 rounded-2">
                            <div class="card-box bg-light-warning text-center rounded-2 cursor-pointer" style="text-decoration: none;">Click to Add and manage all customers</div>
                        </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end of modal 1-->

    <!--modal2-->
    <div class=" modal fade" id="transmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">



                <!--begin::Table widget 14-->
                <div class="card card-flush h-md-100">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Transaction</span>

                            <span class="text-gray-500 mt-1 fw-semibold fs-6">The list of all transaction</span>
                        </h3>
                        <!--end::Title-->

                        <!--begin::Toolbar-->
                        <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                            <a href="#" class="btn btn-sm btn-danger">New</a>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!--end::Toolbar-->
                    </div>
                    <div class="card-body pt-6">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table align-items-center ">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-4 fw-bold text-dark border-bottom-2 ">
                                        <th class=" min-w-100px text-center">Type </th>
                                        <th class=" min-w-100px text-center">Created</th>
                                        <th class=" min-w-100px text-center">Start</th>
                                        <th class=" min-w-100px text-center ">Expired</th>
                                        <th class=" min-w-100px text-center ">Agent</th>
                                        <th class=" min-w-100px text-center ">Region</th>
                                        <th class=" min-w-100px text-center ">Payment</th>
                                        <th class=" min-w-100px text-center ">Vehicle</th>
                                        <th class=" min-w-100px text-center ">Premium</th>
                                        <th class=" min-w-100px text-center ">Status</th>
                                        <th class=" min-w-100px text-center "></th>
                                        <th class=" min-w-100px text-center "></th>

                                    </tr>
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody>

                                    <tr class="fs-4 fw-bold text-dark border-bottom-2 ">
                                        <td class="text-gray-600 fw-bold fs-6 text-center">Motor</td>
                                        <td class="text-gray-600 fw-bold fs-6">2021-06-08 | 13:44:39</td>
                                        <td class="text-gray-600 fw-bold fs-6">08 jun 2021</td>
                                        <td class="text-gray-600 fw-bold fs-6">07 jun 2022</td>
                                        <td class="text-gray-600 fw-bold fs-6">Sidra Insurance Agency</td>
                                        <td class="text-gray-600 fw-bold fs-6">Dar es Salaam</td>
                                        <td class="text-gray-600 fw-bold fs-6">mobile</td>
                                        <td class="text-gray-600 fw-bold fs-6">MC358CBA</td>
                                        <td class="text-gray-600 fw-bold fs-6">59,000.00</td>
                                        <td><button class="btn btn-success btn-sm disabled">Success</button></td>
                                        <td class="text-gray-600 fw-bold fs-6"><i
                                                class="fas fa-info fs-2 text-warning ms-8"></i></td>
                                        <td class="text-gray-600 fw-bold fs-3"><i
                                                class="bi bi-exclamation-triangle-fill fs-2 text-danger"></i></td>
                                    </tr>

                                </tbody>
                                <!--end::Table body-->
                            </table>

                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end::Table widget 14-->
            </div>
        </div>
    </div>
    <!--modal 02-->
    <div class="modal fade " id="more" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md-custom">
            <!-- Optional: modal-lg for larger width -->
            <div class="modal-content">

                <div class="card card-flush h-md-100">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="w-100 text-center mb-2 text-success">
                            <h2>Details</h2>
                        </div>
                    </div>
                    <div class="card-body pt-6">
                        <div class="row align-items-start ms-4">
                            <!-- Details Column -->
                            <div class="col-md-8">
                                <p><strong>Name:</strong> Mousa Doumba</p>
                                <p><strong>Expired Date:</strong> 10 July 2025</p>
                                <p><strong>Vehicle:</strong> Motor</p>
                                <p><strong>Agent:</strong> Sidra Insurance Agency</p>
                                <p><strong>Region:</strong> Dar es Salaam</p>
                                <p><strong>Payment:</strong> Mobile</p>
                                <p><strong>Premium:</strong> 59,000.00</p>
                                <p><strong>Start Date:</strong> 09 June 2025</p>
                                <p><strong>Created At:</strong> 2021-06-08 | 13:44:39</p>
                            </div>

                            <!-- QR and Button Column -->
                            <div class="col-md-4 d-flex flex-column align-items-end" style="margin-top: -3%;">
                                <img src="board_files/qr.png" alt="QRCode" class="img-fluid mb-3"
                                    style="max-width: 200px; height: auto;">

                                <div class="d-flex align-items-center gap-3">
                                    <img src="board_files/TIRAlogo.png" alt="TIRA Logo"
                                        style="width: 50px; height: auto;margin-left: -45%;">
                                    <button class="btn btn-warning btn-sm px-4 d-flex" style="color: white;">Check
                                        Status</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--modal 02 end-->
    <!--end of modal 2-->

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.table').DataTable({
                "pageLength": 3 // Show only 3 rows per page
            });
        });
        // Initialize popovers
        document.addEventListener('DOMContentLoaded', function () {
            const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            popoverTriggerList.map(function (el) {
                return new bootstrap.Popover(el, {
                    container: 'body',  // Ensures proper positioning
                    template: `
                <div class="popover" role="tooltip">
                    <div class="popover-arrow"></div>
                    <div class="popover-body p-3"></div>
                </div>
            `
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                series: [{
                    name: 'Amount Spent (Tzs)',
                    data: [54, 42, 75, 110, 23, 87, 50, 90, 40, 100, 110, 50]
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: false
                    },
                    background: 'transparent',
                    foreColor: '#333',
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 800
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 6,
                        horizontal: false,
                        columnWidth: '30%',
                        endingShape: 'rounded',
                        dataLabels: {
                            position: 'top'
                        }
                    }
                },
                colors: ['#2E3192'],
                
                dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return 'Tzs. ' + val;
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        fontWeight: 'bold',
                        colors: ['#333']
                    }
                },
                grid: {
                    borderColor: '#2E3192',
                    strokeDashArray: 4,
                    padding: {
                        top: 0,
                        right: 20,
                        bottom: 0,
                        left: 20
                    },
                    yaxis: {
                        lines: {
                            show: true
                        }
                    },
                    xaxis: {
                        lines: {
                            show: false
                        }
                    }
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    labels: {
                        style: {
                            colors: '#666',
                            fontSize: '12px',
                            fontWeight: 500,
                            fontFamily: 'Arial, sans-serif'
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#666',
                            fontSize: '12px',
                            fontWeight: 500,
                            fontFamily: 'Arial, sans-serif'
                        },
                        formatter: function (val) {
                            return 'Tzs.' + val;
                        }
                    },
                    tickAmount: 6,
                    title: {
                        text: 'Amount (Tzs. )',
                        style: {
                            color: '#666',
                            fontSize: '12px',
                            fontWeight: 600
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Arial, sans-serif'
                    },
                    theme: 'light',
                    y: {
                        formatter: function (val) {
                            return 'Tzs ' + val;
                        }
                    },
                    marker: {
                        show: true
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 300
                        },
                        dataLabels: {
                            enabled: false
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#kt_charts_widget_18_chart"), options);
            chart.render();

            // Make chart responsive
            window.addEventListener('resize', function () {
                chart.updateOptions({
                    chart: {
                        width: '100%'
                    }
                });
            });
        });
    </script>

</body>
<!--end::Body-->


</html>