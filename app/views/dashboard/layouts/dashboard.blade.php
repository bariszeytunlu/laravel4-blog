@include('dashboard.includes.header')

    @if (Auth::check())
        @include('dashboard.includes.nav')
    @endif

    @yield('content')


@include('dashboard.includes.footer')
