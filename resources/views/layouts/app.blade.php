<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Blog')</title>
    @include('layouts.style')
</head>

<body>
    @yield('header')

    <section>
        @yield('content')
    </section>
    @include('layouts.footer')

    @include('layouts.script')
</body>

</html>
