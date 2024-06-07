<!doctype html>
<html lang="sk">
<head>
    @include('layout.partials.head')
</head>

<body>
    @include('layout.partials.nav')

    <main role="main" class="container">

        <div class="">
            <div class="row">
                <div class="col-sm-12">
                    @yield('content')
                </div>
            </div>
        </div>

    </main>

    @include('layout.partials.footer-scripts')
</body>
</html>
