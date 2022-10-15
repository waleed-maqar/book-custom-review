<nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
    <a class="navbar-brand custom-navbar-brand" href="{{ route('home_page') }}">
        <img src="/assets/img/public/site-icon.jpg" class="custom-navbar-brand-icon">
    </a>
    <button class="navbar-toggler custom-navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav mr-auto custom-navbar-change-lang">
        <li class="btn custom-navbar-current-lang element-toggle-btn" data-element=".custom-navbar-lang-container">
            {{ app()->getLocale() }}
        </li>
        <div class="custom-navbar-lang-container">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a rel="alternate" hreflang="{{ $localeCode }}"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            @endforeach
        </div>
    </ul>

    <div class="collapse navbar-collapse custom-navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('book.index') }}">{{ __('Main/navbar.books') }}</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('category.index') }}">{{ __('Main/navbar.categories') }}</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('author.index') }}">{{ __('Main/navbar.authors') }}</a>
            </li>
        </ul>
        <form action="{{ route('book.search') }}" class="custom-navbar-search-form mt-1">
            <div class="form-group d-inline-block">
                <input class="form-control mr-sm-2 d-inline" type="search"
                    placeholder="{{ __('Main/navbar.search') }}" value="{{ request()->key ?? '' }}"
                    aria-label="Search" name="key">
            </div>
            <div class="form-group d-inline-block">
                <input type="submit" value="{{ __('Main/navbar.search') }}"
                    class="btn btn-outline-success my-2 my-sm-0 d-inline custom-nav-search-btn">
            </div>
        </form>
    </div>
    <div class="custom-navbar-auth-links-container">

        <ul class="navbar-nav mr-auto">
            @auth
                <li class="nav-item dropdown custom-dropdown">
                    <span class="nav-link dropdown-toggle custom-dropdown-toggle" id="navbarDropdown custom-navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->user_name }}
                    </span>
                    <div class="text-center custom-dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item custom-dropdown-item" href="{{ route('user.show', Auth::id()) }}">
                            {{ __('Main/navbar.profile') }}</a>
                        @isAdmin
                            @auth('admin')
                            @else
                                <a class="dropdown-item custom-dropdown-item"
                                    href="{{ route('admin.login') }}">{{ __('Main/navbar.admin login') }}</a>
                            @endauth
                        @endisAdmin
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item custom-dropdown-item"
                            href="{{ route('user.logout') }}">{{ __('Main/navbar.logout') }}</a>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('User.login') }}">{{ __('Main/navbar.login') }}</a>
                </li>
                <li class="custom-nav-clone disabled">|</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.Create') }}">{{ __('Main/navbar.register') }}</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
