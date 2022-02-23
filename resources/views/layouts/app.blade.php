@include('layouts.header')

<main id="main">
    @yield('content')
</main>

@hasSection('sidebar')
    <aside class="sidebar">
        @yield('sidebar')
    </aside>
@endif

@include('layouts.footer')

