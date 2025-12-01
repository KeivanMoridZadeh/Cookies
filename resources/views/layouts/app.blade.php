<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Sweet Cookie Co.</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header>@include('layouts.nav')</header>
<main>@yield('content')</main>

<footer>@include('layouts.footer')</footer>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
