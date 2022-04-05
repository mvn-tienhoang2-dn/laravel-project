<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.shares.top')
</head>

<body>
    <header>
        @include('client.shares.head')
    </header>
    <div class="container">
        <h1 class="mt-4">
            @yield('title')
        </h1>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        @include('client.shares.foot')
    </footer>
    @include('client.shares.modals')
    @yield('js')
</body>
@include('client.shares.bottom')

</html>
