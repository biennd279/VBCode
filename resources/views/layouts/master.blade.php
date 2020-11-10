<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="../../css/app.css">
    @yield("header")
</head>
<body>
<div id="app">
    @yield("body")
</div>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
