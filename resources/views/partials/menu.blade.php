@php
    use Illuminate\Support\Facades\Request;
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo d-flex justify-content-center">
        <a href="{{ route('app.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('img/logo.png') }}" alt="foodgrubber logo" width="100px">
            </span>
            {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Foodgrubber</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('app.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- App -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">App</span>
        </li>

        <li class="menu-item {{ Request::is('settings') ? 'active' : '' }}">
            <a href="{{ route('app.settings') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Basic">Settings</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Basic">Reports</div>
            </a>
        </li>

        <!-- People -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">People</span>
        </li>

        <li class="menu-item {{ Request::is('admins') ? 'active' : '' }}">
            <a href="{{ route('admins.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div data-i18n="Basic">Admins</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('foodpartners') ? 'active' : '' }}">
            <a href="{{ route('foodpartners.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Basic">Food Partners</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link">
                <i class="menu-icon tf-icons bx bx-basket"></i>
                <div data-i18n="Basic">Customers</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link d-flex justify-content-between">
                <div class="d-flex">
                    <i class="menu-icon tf-icons bx bx-comment"></i>
                    <div data-i18n="Basic">Feedbacks / Complaints</div>
                </div>
                <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
            </a>
        </li>

        <!-- Products -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Products</span>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Basic">Orders</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link">
                <i class="menu-icon tf-icons bx bx-credit-card"></i>
                <div data-i18n="Basic">Payments</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-megaphone"></i>
                <div data-i18n="Basic">Marketing</div>
            </a>
        </li>
    </ul>
</aside>
