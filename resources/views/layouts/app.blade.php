<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        html {
            scroll-behavior: smooth;
        }

        #main-content {
            /* background: #FDFDFD; */
            /* background: radial-gradient(at center, #FDFDFD, #C5C5C5); */
            background-color: #00000012;
            min-height: 100vh;
        }

        .scrollbar1::-webkit-scrollbar {
            width: 10px;
        }

        .scrollbar1::-webkit-scrollbar-track {
            background-color: white;
        }

        .scrollbar1::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: #5d87ff;
        }

        .logout-div {
            position: fixed;
            bottom: 22px;
        }

        .logout-link {
            padding: 10px 60px;
        }

        .srollable-div {
            max-height: 58vh;
            overflow-x: hidden;
            overflow-y: scroll;
        }
    </style>
    <main>
        <div id="overlay"
            style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.5); z-index: 998;">
        </div>
        <div id="spinner"
            style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 999;">
            <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <!-- Sidebar Start -->
            @include('dashboard.navbar')
            <!--  Sidebar End -->
            <!--  Main wrapper -->
            <div class="body-wrapper">
                <!--  Header Start -->
                @include('dashboard.header')
                <!--  Header End -->
                <div class="container-fluid" id="main-content">

                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Main content -->

    </main>


    @include('script')
</body>

</html>
