<!DOCTYPE html>
<html lang="en" class="h-full bg-surface-dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Portfolio CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans text-gray-200 antialiased">
    <div class="flex min-h-full">
        {{-- Sidebar --}}
        <aside class="fixed inset-y-0 left-0 z-30 w-64 border-r border-white/5 bg-[#111111]">
            <div class="flex h-16 items-center border-b border-white/5 px-6">
                <a href="{{ route('admin.dashboard') }}" class="text-lg font-semibold text-white">
                    Portfolio <span class="text-accent">CMS</span>
                </a>
            </div>
            <nav class="space-y-1 p-4">
                @php
                    $links = [
                        ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                        ['route' => 'admin.projects.index', 'label' => 'Projects', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
                        ['route' => 'admin.categories.index', 'label' => 'Categories', 'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z'],
                        ['route' => 'admin.skills.index', 'label' => 'Skills', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'],
                        ['route' => 'admin.profile.edit', 'label' => 'Profile / About', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                        ['route' => 'admin.social-links.index', 'label' => 'Social Links', 'icon' => 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1'],
                        ['route' => 'admin.messages.index', 'label' => 'Messages', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ];
                @endphp
                @foreach ($links as $link)
                    @php
                        $isActive = request()->routeIs($link['route']) || request()->routeIs(str_replace('.index', '.*', $link['route']));
                    @endphp
                    <a href="{{ route($link['route']) }}"
                       class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition {{ $isActive ? 'bg-accent/10 text-accent' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $link['icon'] }}"/>
                        </svg>
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>
            <div class="absolute bottom-0 left-0 right-0 border-t border-white/5 p-4">
                <a href="{{ route('home') }}" target="_blank" class="mb-2 flex items-center gap-2 text-sm text-gray-400 hover:text-accent">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    View Site
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-2 rounded-lg px-3 py-2 text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main content --}}
        <div class="ml-64 flex flex-1 flex-col">
            <header class="sticky top-0 z-20 flex h-16 items-center justify-between border-b border-white/5 bg-[#0d0d0d]/80 px-8 backdrop-blur">
                <h1 class="text-lg font-semibold text-white">@yield('heading', 'Dashboard')</h1>
                <span class="text-sm text-gray-500">{{ auth()->user()->name }}</span>
            </header>

            <main class="flex-1 p-8">
                @if (session('success'))
                    <div class="mb-6 rounded-lg border border-green-500/30 bg-green-500/10 px-4 py-3 text-sm text-green-400">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="mb-6 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-400">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
