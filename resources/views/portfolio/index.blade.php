<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $profile->name }} — {{ $profile->title }}</title>
    <meta name="description" content="{{ Str::limit($profile->tagline ?? $profile->bio, 160) }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface-dark font-sans text-gray-300 antialiased" x-data="portfolioApp()" x-init="init()">

    @include('portfolio.partials.navbar')

    <main>
        @include('portfolio.partials.hero')
        @include('portfolio.partials.about')
        @include('portfolio.partials.skills')
        @include('portfolio.partials.projects')
        @include('portfolio.partials.contact')
    </main>

    @include('portfolio.partials.footer')

</body>
</html>
