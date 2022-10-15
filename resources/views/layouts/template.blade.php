@include('layouts.header')
@include('layouts.navbar')
<div class="site-body">
    @if (Route::currentRouteName() != 'book.create')
        @auth
            <a href="{{ route('book.create') }}" class="add-new-book-link" custom-title="Add New Book">
                +
            </a>
        @else
            <a href="{{ route('User.login') }}" class="add-new-book-link-disactive" custom-title="Log in To Add Book">
                +
            </a>
        @endauth
    @endif
    <div class="admin-sidebar">
        @isAdmin
            @include('layouts.adminsidebar')
        @endisAdmin
    </div>
    <div class="site-content">
        @include('Errors.requesterrors')
        <div class="text-center page-header">
            @yield('page-header')
        </div>
        <div class="page-content mt-5">
            @yield('page-content')
        </div>
    </div>
</div>
<span class="go-to-top">
    <i class="fas fa-arrow-up"></i>
</span>
@include('layouts.footer')
