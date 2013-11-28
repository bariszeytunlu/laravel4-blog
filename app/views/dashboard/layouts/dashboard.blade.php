@include('dashboard.includes.header')

    @if (Auth::check())
        @include('dashboard.includes.nav')
    @endif


<div class="container">
    @yield('content')
</div>

@include('dashboard.includes.footer')
