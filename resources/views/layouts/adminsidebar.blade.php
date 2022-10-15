@if (Auth::guard('admin')->check())
    <div class="sidebar-toggle-btn ">
        <div class="btn element-show-btn sidebar-show-btn" data-element=".admin-sidebar-container">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="btn element-hide-btn sidebar-hide-btn" data-element=".admin-sidebar-container">
            <i class="fa-solid fa-circle-minus fa-xl"></i>
        </div>
    </div>
    <div class="admin-sidebar-container">
        <div class="mt-1 admin-sidebar-link">
            <a href="{{ route('dashboard') }}">{{ __('Main/sidebar.dashboard') }}}</a>
        </div>
        @admin_with_role('admin')
            <div class="mt-1 admin-sidebar-link">
                <a href="{{ route('dashboard.admin.index') }}">{{ __('Main/sidebar.admins') }}</a>
            </div>
        @endadmin_with_role
        <div class="mt-1 admin-sidebar-link">
            <a href="{{ route('dashboard.user.index') }}">{{ __('Main/sidebar.users') }}</a>
        </div>
        <div class="mt-1 admin-sidebar-link">
            <a href="{{ route('dashboard.book.index') }}">{{ __('Main/sidebar.books') }}</a>
        </div>
        <div class="mt-1 admin-sidebar-link">
            <a href="{{ route('dashboard.review.index') }}">{{ __('Main/sidebar.reviews') }}</a>
        </div>
        <div class="mt-1 admin-sidebar-link">
            <a href="{{ route('dashboard.category.index') }}">{{ __('Main/sidebar.categories') }}</a>
        </div>
        <div class="mt-1 admin-sidebar-link">
            <a href="{{ route('dashboard.category.create') }}"><b>+</b>{{ __('Main/sidebar.new category') }}</a>
        </div>
        <div class="mt-1 admin-sidebar-link">
            <a href="{{ route('dashboard.report.index') }}">{{ __('Main/sidebar.reports') }}</a>
        </div>
        <div class="mt-1 admin-sidebar-link">
            <a href="{{ route('dashboard.report.create') }}"><b>+</b> {{ __('Main/sidebar.new report') }}</a>
        </div>
        <div class="mt-1 admin-sidebar-link">
            <a href="{{ route('admin.logout') }}">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                {{ __('Main/sidebar.admin logout') }}
            </a>
        </div>
    </div>
@endif
