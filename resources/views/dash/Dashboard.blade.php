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
                                        <a href="#" style="text-decoration: none; color: #F9A61A;"><span>Welcome Back |
                                                {{ Auth::user()->name }}</span></a>
                                    </div>
                                    
                                </div>
                                <div class="cursor-pointer symbol symbol-35px symbol-md-40px"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">

                                    <!-- Begin: User Initials as Avatar -->
                                    <!-- Your initials div with popover attributes -->
                                    <div class="symbol-label  text-white fw-bold fs-4 d-flex align-items-center justify-content-center rounded-circle"
                                        style="width: 50px; height: 50px; cursor: pointer; background-color: #F9A61A;"
                                        data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="right"
                                        data-bs-html="true" data-bs-content='
                                        <div class="popover-profile">
                                            <div class="d-flex align-items-center mb-2">

                                                <div>
                                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                                    <small class="text-muted">{{ Auth::user()->role }}</small>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">

                                                <div>
                                                    <h6 class="mb-0">{{ Auth::user()->email }}</h6>
                                                    <small class="text-muted">{{ Auth::user()->created_at }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    '>
                                        <i class="bi bi-person fs-1 text-white"></i>
                                    </div>

                                    <!-- Optional: Status dot -->
                                    <div class="position-absolute translate-middle bottom-0 start-100 ms-n1 mb-7 rounded-circle h-10px w-10px"
                                        style="background-color: #F9A61A;">
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
                                        data-bs-target="#dashmodal" title="New product"
                                        style="background-color: #F9A61A;">
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
                                                <h1 class="card-title align-items-center flex-column text-white pt-15" style="font-size: 5rem; color: rgb(12, 12, 138);!important ">PII AGENT</h1>
                                                <div class="card-toolbar pt-5">

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
                                                                        <span
                                                                            class="symbol-label bg-light-danger rounded-3">
                                                                            <i class="bi bi-house fs-1 fw-bold"
                                                                                style="color: #F9A61A !important; "></i>
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
                                                                        <span
                                                                            class="symbol-label bg-light-danger rounded-3">
                                                                            <i class="bi bi-person-plus fs-1 fw-bold"
                                                                                style="color: #F9A61A !important; "></i>
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
                                                                        <span
                                                                            class="symbol-label bg-light-danger rounded-3">
                                                                            <i class="bi bi-clipboard2-pulse fs-1 "
                                                                                style="color: #F9A61A !important; "></i>
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
                                                            <a href="{{route('dash.Report')}}"
                                                                class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center">
                                                                        <span
                                                                            class="symbol-label bg-light-danger rounded-3">
                                                                            <i class="bi bi-file-earmark-medical fs-1"
                                                                                style="color: #F9A61A !important; "></i>
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
                                                            <a href="{{route('dash.Notification')}}"
                                                                class="d-block w-100 text-decoration-none">
                                                                <div
                                                                    class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-lg mt-3 w-100 h-100 position-relative">
                                                                    <div
                                                                        class="symbol symbol-30px mb-4 d-flex justify-content-center align-items-center position-relative">
                                                                        <span
                                                                            class="symbol-label position-relative bg-light-danger rounded-3">
                                                                            <i class="bi bi-bell fs-1 "
                                                                                style="color: #F9A61A;"></i>
                                                                            <!-- Notification badge -->
                                                                            <span
                                                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-white">
                                                                                3
                                                                                <span class="visually-hidden">unread
                                                                                    messages</span>
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <span
                                                                            class="text-gray-700 fw-bolder d-block fs-9 text-nowrap">Notifications</span>
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
                                                                        <span
                                                                            class="symbol-label bg-light-danger rounded-3">
                                                                            <i class="bi bi-archive fs-1"
                                                                                style="color: #F9A61A !important; "></i>
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
                                                                            <span
                                                                                class="position-absolute top-0 start-0 w-100 h-100 rounded-circle  animate-pulse"
                                                                                style="background-color: #F9A61A; opacity: 0.5;"></span>

                                                                        </span>
                                                                    </div>

                                                                    <div class="m-0">
                                                                        <h4 class="fw-bold  mb-3 animate__animated animate__fadeInRight"
                                                                            style="color: #2E3192;">
                                                                            Total Services
                                                                        </h4>

                                                                        <div class="d-flex d-grid gap-5">
                                                                            <div
                                                                                class="d-flex flex-column flex-shrink-0 me-4">
                                                                                <div class="d-flex align-items-center fs-10 fw-bold text-gray-500 mb-2 animate__animated animate__fadeInUp"
                                                                                    style="animation-delay: 0.1s">
                                                                                    <i class=" fs-6  me-2"
                                                                                        style="color: #2E3192;">
                                                                                        <span class="path1"></span>
                                                                                        <span class="path2"></span>
                                                                                        <span class="path3"></span>
                                                                                    </i>
                                                                                    <span class="fs-1  ms-1"
                                                                                        style="color: #2E3192;">12</span>
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

                                                                            <span
                                                                                class="position-absolute top-0 start-0 w-100 h-100 rounded-circle  animate-pulse"
                                                                                style="background-color: #F9A61A; opacity: 0.5;"></span>
                                                                        </span>
                                                                    </div>

                                                                    <div class="m-0">
                                                                        <h4 class="fw-bold  mb-3 animate__animated animate__fadeInRight"
                                                                            style="color: #2E3192;">
                                                                            Total Renewals
                                                                        </h4>

                                                                        <div class="d-flex d-grid gap-5">
                                                                            <div
                                                                                class="d-flex flex-column flex-shrink-0 me-4">
                                                                                <div class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2 animate__animated animate__fadeInUp"
                                                                                    style="animation-delay: 0.1s">

                                                                                    <span class="fs-2  ms-1"
                                                                                        style="color: #2E3192;">101</span>
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
                                                                            <span
                                                                                class="position-absolute top-0 start-0 w-100 h-100 rounded-circle  animate-pulse"
                                                                                style="background-color: #F9A61A; opacity: 0.5;"></span>
                                                                        </span>
                                                                    </div>

                                                                    <div class="m-0">
                                                                        <h4 class="fw-bold mb-3 animate__animated animate__fadeInRight"
                                                                            style="color: #2E3192 ;">
                                                                            Total Customers
                                                                        </h4>

                                                                        <div class="d-flex d-grid gap-5">
                                                                            <div
                                                                                class="d-flex flex-column flex-shrink-0 me-4">
                                                                                <div class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2 animate__animated animate__fadeInUp"
                                                                                    style="animation-delay: 0.1s">

                                                                                    <span class="fs-2 ms-1"
                                                                                        style="color: #2E3192;">100</span>
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
                                                                            <span
                                                                                class="position-absolute top-0 start-0 w-100 h-100 rounded-circle  animate-pulse"
                                                                                style="background-color: #F9A61A; opacity: 0.5;"></span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="m-0">
                                                                        <!--begin::Subtitle-->
                                                                        <h4 class="fw-bold mb-3 animate__animated animate__fadeInRight"
                                                                            style="color: #2E3192;">
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
                                                                                    <span class="fs-2 ms-1"
                                                                                        style="color: #2E3192;">10,000.00</span>
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
                                                                            <span
                                                                                class="position-absolute top-0 start-0 w-100 h-100 rounded-circle  animate-pulse"
                                                                                style="background-color: #F9A61A; opacity: 0.5;"></span>
                                                                        </span>
                                                                    </div>
                                                                    <!--end::Symbol-->

                                                                    <!--begin::Info-->
                                                                    <div class="m-0">
                                                                        <h4 class="fw-bold  mb-3 animate__animated animate__fadeInRight"
                                                                            style="color: #2E3192;">
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
                                                                                    <span class="fs-2  ms-1"
                                                                                        style="color: #2E3192;">10,000.00</span>
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
                                                                            <span
                                                                                class="position-absolute top-0 start-0 w-100 h-100 rounded-circle  animate-pulse"
                                                                                style="background-color: #F9A61A; opacity: 0.5;"></span>
                                                                        </span>
                                                                    </div>
                                                                    <!--end::Symbol-->

                                                                    <!--begin::Info-->
                                                                    <div class="m-0">
                                                                        <!--begin::Subtitle-->
                                                                        <h4 class="fw-bold mb-3 animate__animated animate__fadeInRight"
                                                                            style="color: #2E3192;">
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
                                                                                    <span class="fs-2 ms-1"
                                                                                        style="color: #2E3192;">100,000.00</span>
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

                                <!--end::Row-->
                                <br><br>



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
                class="app-container  container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack align-items-center ">
                <!--begin::Copyright-->
                <div class="text-gray-900 order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2025&copy;</span>
                    <a href="https://SURETECH Systems.co.tz/" target="_blank"
                        class="text-gray-800 text-hover-primary">Developed By SURETECH Systems .</a>
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
                        <a href="{{ route('dash.Customers') }}">
                            <div class="col-md-12 rounded-2">
                                <div class="card-box bg-light-warning text-center rounded-2 cursor-pointer"
                                    style="text-decoration: none;">Click to Add and manage all customers</div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end of modal 1-->

    <!--modal2-->
    
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