<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" crossorigin="anonymous"/>
        <link rel="icon" href="/images/favicon.ico">
        <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">

        <link href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
        @livewireStyles
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- include libraries(jQuery, bootstrap) -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
        <style>
            .footer{
                background-color: #585856;
            }
            .linea{
                border-color: #E9531E;
            }
            .hero-image {
                background-color: rgb(234 88 12); /* Used if the image is unavailable */
                height: 100%; /* You must set a specified height */
                width: 25%; /* You must set a specified height */
                background-position: center; /* Center the image */
                background-repeat: no-repeat; /* Do not repeat the image */
                background-size: cover; /* Resize the background image to cover the entire container */
            }

            .hero-image2 {
                background-image: url("images/aside.jpeg"); /* The image used */
                background-color: rgb(234 88 12); /* Used if the image is unavailable */
                height: 100%; /* You must set a specified height */
                width: 25%; /* You must set a specified height */
                background-position: center; /* Center the image */
                background-repeat: no-repeat; /* Do not repeat the image */
                background-size: cover; /* Resize the background image to cover the entire container */
            }
            .fondo{
                background-color:rgb(212 212 216);
            }
            .status{
                background-color: rgb(249 115 22);
            }
            .btn-ticket{
                background-color: rgb(161 161 170);
            }
        </style>
    </head>
    <body class="font-sans antialiased min-h-screen flex flex-col bg-gray-100">
        <x-jet-banner />

        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>


        @stack('modals')

        @livewireScripts
        <script src="https://kit.fontawesome.com/d373567f6b.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
        <script>
            function mostrarPassword(){
                var cambio = document.getElementById("password");
                if(cambio.type == "password"){
                    cambio.type = "text";
                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                }else{
                    cambio.type = "password";
                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }
            }
            function mostrarPasswordConfirm() {
                var cambio = document.getElementById("password-confirm");
                if(cambio.type == "password"){
                    cambio.type = "text";
                    $('.icon2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                }else{
                    cambio.type = "password";
                    $('.icon2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }
            }
        </script>
    </body>
</html>