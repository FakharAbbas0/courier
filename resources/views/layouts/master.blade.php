@include('layouts.top-includes')

<body>


    <!-- ======= Header ======= -->
    @include('layouts.header')
    <!-- ======= Sidebar ======= -->
    @include('layouts.side-bar')
    <main id="main" class="main">
        @if (session('success'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif

        @yield('content')

    </main><!-- End #main -->
    @include('layouts.footer')
