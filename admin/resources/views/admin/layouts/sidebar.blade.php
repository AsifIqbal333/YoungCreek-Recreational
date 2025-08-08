<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{ route('admin.dashboard') }}">
            <img alt="Logo" src="{{ asset('favicon.png') }}" class="h-30px app-sidebar-logo-default" />
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-sm h-30px w-30px rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <!--begin::Scroll wrapper-->
            <div id="kt_app_sidebar_menu_scroll" class="hover-scroll-y my-5 mx-3" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">
                <!--begin::Menu-->
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">
                    <!--Dashboard-->
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <span class="menu-icon">
                                <i class="fas fa-fw fa-tachometer-alt">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </div>

                    <!--Products-->
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('admin.products*') ? 'active' : '' }}"
                            href="{{ route('admin.products.index') }}">
                            <span class="menu-icon">
                                <i class="fas fa-fw ki-duotone ki-abstract-41">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Products</span>
                        </a>
                    </div>

                    <!--Deals-->
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('admin.deals*') ? 'active' : '' }}"
                            href="{{ route('admin.deals.index') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-discount">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Deals</span>
                        </a>
                    </div>

                    <!--Order Management-->
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
                        class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-title">Order Management</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </span>

                        {{-- Orders --}}
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.orders*') ? 'active' : '' }}"
                                href="{{ route('admin.orders.index') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-fw fa-stroopwafel">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Orders</span>
                            </a>
                        </div>

                        {{-- Quote Requests --}}
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.quote-requests*') ? 'active' : '' }}"
                                href="{{ route('admin.quote-requests') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-fw fa-stroopwafel">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Quote Requests</span>
                            </a>
                        </div>

                    </div>

                    <!--Profile-->
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
                        class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-title">Admin Area</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </span>

                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.profile*') ? 'active' : '' }}"
                                href="{{ route('admin.profile.index') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-fw fa-user">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Profile</span>
                            </a>
                        </div>

                        <!--Sign Out-->
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="menu-icon">
                                    <i class="fas fa-fw fa-sign-out-alt">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Sign Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
                <!--end::Menu-->
            </div>
            <!--end::Scroll wrapper-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->

</div>
