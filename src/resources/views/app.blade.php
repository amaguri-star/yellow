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
            <side-bar :is-logged-in="{{ Auth::check() ? 'true' : 'false' }}"
                username="{{ Auth::check() ? Auth::user()->name : 'unauthenticate user' }}"></side-bar>
            <v-main>
                <router-view user-id="{{ Auth::id() }}"></router-view>
            </v-main>
        </v-app>
    </div>
    <!-- script -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
