<!DOCTYPE html>
<html lang="en" class="h-full bg-surface-dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login — Portfolio CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-full items-center justify-center font-sans text-gray-200 antialiased">
    <div class="w-full max-w-md rounded-2xl border border-white/10 bg-[#111111] p-8 shadow-2xl">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-white">Portfolio <span class="text-accent">CMS</span></h1>
            <p class="mt-2 text-sm text-gray-500">Sign in to manage your portfolio</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-400">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="mb-1 block text-sm text-gray-400">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                       class="w-full rounded-lg border border-white/10 bg-[#0d0d0d] px-4 py-2.5 text-white placeholder-gray-600 focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent">
            </div>
            <div>
                <label for="password" class="mb-1 block text-sm text-gray-400">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full rounded-lg border border-white/10 bg-[#0d0d0d] px-4 py-2.5 text-white placeholder-gray-600 focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent">
            </div>
            <label class="flex items-center gap-2 text-sm text-gray-400">
                <input type="checkbox" name="remember" class="rounded border-white/20 bg-[#0d0d0d] text-accent focus:ring-accent">
                Remember me
            </label>
            <button type="submit" class="btn-accent w-full">Sign In</button>
        </form>
    </div>
</body>
</html>
