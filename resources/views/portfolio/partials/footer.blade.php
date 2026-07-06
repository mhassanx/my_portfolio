<footer class="border-t border-white/5 bg-[#0d0d0d] py-12">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="flex flex-col items-center justify-between gap-6 sm:flex-row">
            {{-- Social Links --}}
            <div class="flex items-center gap-4">
                @foreach ($socialLinks as $link)
                    <a href="{{ $link->url }}" target="_blank" rel="noopener"
                       class="flex h-10 w-10 items-center justify-center rounded-lg border border-white/10 text-gray-400 transition hover:border-accent/50 hover:text-accent hover:shadow-glow"
                       title="{{ $link->platform_name }}">
                        @include('portfolio.partials.social-icon', ['icon' => $link->icon ?? 'link'])
                    </a>
                @endforeach
            </div>

            <p class="text-sm text-gray-600">
                &copy; {{ date('Y') }} {{ $profile->name }}. All rights reserved.
            </p>
        </div>
    </div>
</footer>
