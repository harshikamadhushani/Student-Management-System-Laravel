<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @include('Libraries\styles')
</head>
<body>
    @include('Components\nav')
    @yield('content')

    @include('Libraries\scripts')

</body>
</html>
