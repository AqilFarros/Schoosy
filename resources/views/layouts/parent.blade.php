<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schoosy</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Titan+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Titan+One&display=swap');
    </style>
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'main-color': "#159947",
                        'secondary-color': "#272727",
                        'grey-color': '#B5B5B5'
                    }
                },
                fontFamily: {
                    TitanOne: ['Titan One', 'sans-serif'],
                    Nunito: ['Nunito', 'sans-serif']
                },
                container: {
                    center: true,
                    padding: {
                        DEFAULT: "12",
                        md: "32px"
                    }
                },
            },
        }
    </script>

    <!---------- Favicon ---------->
    <link rel="shortcut icon" href="{{ asset('assets/Logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('layouts.include.navbar')
    @include('layouts.include.session.error')
    @include('layouts.include.session.success')
    @include('layouts.include.session.error-alert')

    <div class="my-4 py-4 bg-slate-100 shadow">
        @yield('content')
    </div>

    @include('layouts.include.footer')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
