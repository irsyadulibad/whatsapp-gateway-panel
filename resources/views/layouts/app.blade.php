<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Whatsapp Gateway</title>

    <link rel="stylesheet" href="https://zuramai.github.io/mazer/demo/assets/compiled/css/app.css">
    <link rel="stylesheet" href="https://zuramai.github.io/mazer/demo/assets/compiled/css/iconly.css">
</head>
<body>

    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.sidebar')
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>{{ $title ?? '' }}</h3>
                            <p class="text-subtitle text-muted">{{ $subt ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <div class="container">
                    @yield('content')
                </div>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 - WAG</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://zuramai.github.io/mazer/demo/assets/compiled/js/app.js"></script>
    @stack('script')
    {{-- <script src="https://zuramai.github.io/mazer/demo/assets/js/app.js"></script> --}}
</body>
</html>
