<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ config('app.name') }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS CDN (Optional, for any dynamic functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-7z7rslF0bNzhbpTXNBr2M1nsdP7c/W5VJAL7d2hKksvZjXsK7C2zG4pMiHZKm8fE" crossorigin="anonymous"></script>
   
</body>
</html>
