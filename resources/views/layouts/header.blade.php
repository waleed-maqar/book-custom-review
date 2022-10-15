<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/main.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/dashboard.css">
    @hasSection('style-file')
        @yield('style-file')
    @endif
    <title>
        Custom Review
        @hasSection('page-title')
            | @yield('page-title')
        @endif
    </title>
</head>

<body>
