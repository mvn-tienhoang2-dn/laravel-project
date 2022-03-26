<!DOCTYPE html>
<html lang="en">
<head>
    @extends('client.shares.top')
</head>
<body>
    <header>
        @extends('client.shares.head')
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
        @extends('client.shares.foot');
    </footer>
    @yield('js')
</body>
@extends('client.shares.bottom')
</html>
