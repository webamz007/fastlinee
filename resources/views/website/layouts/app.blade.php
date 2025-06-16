<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="google-site-verification" content="QelWhpBXUyrY2PI9KWvmK75PbIHzQJ-HYLyQ_j8idrw" />
    @yield('meta')
    <title>FastLinee | @yield('title')</title>

    <!-- Fav Icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('web-assets/img/fav-icon.png') }}">
    <!-- Toaster -->
    <link rel="stylesheet" href="{{ asset('assets/bundles/izitoast/css/iziToast.min.css') }}">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- JQuery datatable CDN link -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    <link href="{{ asset('web-assets/css/style.css?v=1.0') }}" rel="stylesheet">

    {{-- CSS --}}
    @yield('css')

</head>

<body>
    {{-- Show Alert Messages --}}
    @if (session('status'))
        <input type="hidden" id="status_span" data-status="{{ session('status.success') }}"
            data-msg="{{ session('status.msg') }}">
    @endif

    {{-- WhatsApp Chat Icon --}}
    <div class="whatsapp-button">
        <a aria-label="Chat on WhatsApp" href="https://wa.me/447481691058" target="_blank">
            <img alt="Chat on WhatsApp" src="{{ asset('web-assets/img/whatsapp.png') }}" width="70" />
        </a>
    </div>

    {{-- Navbar --}}
    @include('website.includes.navbar')

    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('website.includes.footer')

    {{-- Toaster --}}
    <script src="{{ asset('assets/bundles/izitoast/js/iziToast.min.js') }}"></script>

    {{-- Jquery CDN --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    {{-- Jquery Datatable CDN --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    {{-- JS --}}
    @yield('js')

    <script>
        $(document).ready(function() {
            if ($('#status_span').length) {
                var status = $('#status_span').attr('data-status');
                if (status === '1') {
                    iziToast.success({
                        title: 'Success',
                        message: $('#status_span').attr('data-msg'),
                        position: 'topRight'
                    });
                } else if (status == '' || status === '0') {
                    iziToast.error({
                        title: 'Error',
                        message: $('#status_span').attr('data-msg'),
                        position: 'topRight'
                    });
                }
            }
        });
    </script>
</body>

</html>
