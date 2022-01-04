<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <side-bar :user="{{ Auth::user() }}"></side-bar>
                <v-main>
                    <router-view user_id="{{ Auth::id() }}"></router-view>
                </v-main>
            @endauth
        </v-app>
    </div>
    <!-- script -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
