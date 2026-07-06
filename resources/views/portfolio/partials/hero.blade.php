<section id="home" class="relative min-h-screen flex items-center pt-20 overflow-hidden">
    {{-- Background accents --}}
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute top-1/4 -left-32 h-96 w-96 rounded-full bg-accent/5 blur-3xl"></div>
        <div class="absolute bottom-1/4 -right-32 h-96 w-96 rounded-full bg-accent/5 blur-3xl"></div>
    </div>

    <div class="relative mx-auto grid max-w-7xl gap-12 px-6 py-20 lg:grid-cols-2 lg:items-center lg:px-8 lg:py-32">
        {{-- Left: Text --}}
        <div class="fade-in-up">
            <p class="mb-4 text-sm font-medium uppercase tracking-widest text-accent">Hello, I'm</p>
            <h1 class="text-5xl font-bold leading-tight text-white sm:text-6xl lg:text-7xl">
                {{ $profile->name }}
            </h1>
            <p class="mt-4 text-xl text-gray-400 sm:text-2xl">{{ $profile->title }}</p>
            <p class="mt-6 max-w-lg text-lg leading-relaxed text-gray-500">
                {{ $profile->tagline }}
            </p>
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="#projects" @click.prevent="scrollTo('projects')" class="btn-accent">
                    View Work
                </a>
                <a href="#contact" @click.prevent="scrollTo('contact')"
                   class="inline-flex items-center rounded-lg border border-white/10 px-6 py-3 text-sm font-semibold text-gray-300 transition hover:border-accent/50 hover:text-white">
                    Hire Me
                </a>
            </div>
        </div>

        {{-- Right: Hero Image --}}
        <div class="fade-in-up relative flex justify-center lg:justify-end" style="animation-delay: 0.2s">
            <div class="relative">
                <div class="absolute -inset-4 rounded-2xl bg-gradient-to-br from-accent/20 to-transparent blur-2xl"></div>
                <div class="relative overflow-hidden rounded-2xl border border-white/10 bg-[#1a1a1a] shadow-2xl">
                    @if ($profile->hero_image_url)
                        <img src="{{ $profile->hero_image_url }}" alt="{{ $profile->name }}" class="h-auto w-full max-w-lg object-cover">
                    @else
                        <div class="flex h-80 w-full max-w-lg items-center justify-center bg-[#1a1a1a]">
                            <svg class="h-48 w-48 text-accent/30" viewBox="0 0 200 200" fill="currentColor">
                                <polygon points="100,10 190,55 190,145 100,190 10,145 10,55"/>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Quick link hexagons --}}
    <div class="relative mx-auto max-w-7xl px-6 pb-16 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            @foreach ($skills->take(6) as $skill)
                <a href="#skills" @click.prevent="scrollTo('skills')"
                   class="hex-icon group" title="{{ $skill->name }}">
                    @if ($skill->icon_url)
                        <img src="{{ $skill->icon_url }}" alt="{{ $skill->name }}" class="h-6 w-6 object-contain">
                    @else
                        <span class="text-xs font-bold uppercase text-gray-400 group-hover:text-accent transition">
                            {{ Str::substr($skill->name, 0, 2) }}
                        </span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>
