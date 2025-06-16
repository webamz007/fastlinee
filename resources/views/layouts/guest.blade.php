<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('web-assets/img/fav-icon.png') }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 mb-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var toggleButton = document.getElementById('toggleRegistrationType');
            var registerTypeInput = document.getElementById('register-type');
            var agencyFields = document.getElementById('agencyFields');
            var licenceNumberInput = document.getElementById('licence_number');

            toggleButton.addEventListener('click', function() {
                if (agencyFields.style.display === 'none') {
                    // Switching to agency registration
                    toggleButton.innerHTML = 'Register as User';
                    registerTypeInput.value = 'agency';
                    agencyFields.style.display = 'block';
                    licenceNumberInput.setAttribute('required', 'required');
                } else {
                    // Switching to user registration
                    toggleButton.innerHTML = 'Register as Agency';
                    registerTypeInput.value = 'user';
                    agencyFields.style.display = 'none';
                    licenceNumberInput.removeAttribute('required');
                }
            });
        });
    </script>

</body>

</html>
