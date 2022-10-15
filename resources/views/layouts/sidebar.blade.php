<div class="">
    <a href="{{ route('home_page') }}">Home</a>
</div>
<div class="">
    <a href="{{ route('user.index') }}">users</a>
</div>
<div class="">
    <a href="{{ route('book.index') }}">Books</a>
</div>
<div class="">
    <a href="{{ route('category.index') }}">Categories</a>
</div>
<div class="">
    <a href="{{ route('author.index') }}">Authors</a>
</div>
@auth
    <div class="">
        <a href="{{ route('user.show', Auth::id()) }}">profile</a>
    </div>
    <div class="">
        <a href="{{ route('book.create') }}"><b>+</b> New Book</a>
    </div>
    <div class="">
        <a href="{{ route('user.logout') }}">logout</a>
    </div>
@else
    <div class="">
        <a href="{{ route('user.Create') }}">Register</a>|
        <a href="{{ route('web.login.form') }}">login</a>
    </div>
@endauth
