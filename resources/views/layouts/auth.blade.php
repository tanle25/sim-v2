<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('build/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('build/assets/img/logo-ct.png')}}">
    <title>
        Đăng Nhập
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-Pro-6.2.0-web/css/all.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles()
</head>

<body class="m-0 font-sans antialiased font-normal bg-white text-start text-size-base leading-default text-slate-500">
    <!-- Navbar -->


    <main class="mt-0 transition-all duration-200 ease-in-out bg-gray-200">
        {{-- <div class="bg-gradient-to-tr from-green-300 to-green-600 h-screen w-full flex justify-center items-center"> --}}
            @yield('content')
        {{-- </div> --}}
    </main>
@livewireScripts()
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>

</html>
