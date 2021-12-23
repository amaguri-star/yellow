<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <!-- icon -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        <v-app>
            @auth
                <side-nav user-name="{{ Auth::user()->name }}"></side-nav>
            @endauth
            <v-main>
                @yield('content')
                <v-main>
        </v-app>
    </div>

    <!-- public/js -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
