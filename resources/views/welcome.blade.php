<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="https://cdn.crowdin.com/apps/dist/iframe.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Sorting Array</title>
</head>
<body>
<div>
    <header class="bd-header bg-dark px-5 py-4 d-flex align-items-stretch border-bottom">
        <div class="container-fluid d-flex align-items-center">
            <h1 class="d-flex align-items-center fs-4 text-white mb-0">
                Sorting Array
            </h1>
        </div>
    </header>
    <main class="container-fluid p-5 text-white" id="app">

    </main>
    <footer class="bd-footer px-5 py-4 bg-dark text-white border-top fixed-bottom">
        Copyright © 2022 Sorting Array. All Rights Reserved.
    </footer>
</div>
</body>
</html>
