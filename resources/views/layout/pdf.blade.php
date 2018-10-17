<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <!-- Fonts -->

    <!-- CSS -->
    <link href="{{ '/css/pdf.css' }}" rel="stylesheet">


</head>
<body class="with-navbar">
<div>

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

</div>
</body>
</html>
