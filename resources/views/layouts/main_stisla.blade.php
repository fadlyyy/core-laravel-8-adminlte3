<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('layouts.navbar')

            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    @include('layouts.sidebar')
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>{{ $title ?? '-' }}</h1>
                    </div>

                    <div class="section-body">
                        {{-- @yield('content') --}}
                        {{ $slot ?? '' }}
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a
                        href="https://nauval.in/">Muhamad Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    @include('layouts.scripts')
</body>

</html>
