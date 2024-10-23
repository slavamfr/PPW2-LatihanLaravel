<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>

    <!-- Fixed quotes in asset references -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    @include('layouts.header')
    @yield('content')

    <script type="text/javascript">
        // Fixed quotes in datepicker initialization
        $('.date').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true
        });
    </script>

    <!-- Fixed quotes in the script tag -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
