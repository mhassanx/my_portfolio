<section id="about" class="section-padding border-t border-white/5">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="section-header fade-in-scroll">
            <span class="text-sm font-medium uppercase tracking-widest text-accent">About Me</span>
            <h2 class="mt-2 text-3xl font-bold text-white sm:text-4xl">Who I Am</h2>
            <div class="mt-4 h-px w-16 bg-accent"></div>
        </div>

        <div class="mt-16 grid gap-12 lg:grid-cols-5 lg:items-center">
            {{-- Profile Image --}}
            <div class="fade-in-scroll lg:col-span-2 flex justify-center">
                <div class="relative">
                    <div class="absolute -inset-2 rounded-full bg-gradient-to-br from-accent/30 to-transparent blur-lg"></div>
                    <div class="relative h-64 w-64 overflow-hidden rounded-full border-2 border-white/10 sm:h-80 sm:w-80">
                        @if ($profile->profile_image_url)
                            <img src="{{ $profile->profile_image_url }}" alt="{{ $profile->name }}" class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-[#1a1a1a] text-6xl font-bold text-accent/40">
                                {{ Str::substr($profile->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Bio --}}
            <div class="fade-in-scroll lg:col-span-3" style="animation-delay: 0.15s">
                <div class="portfolio-card">
                    <p class="text-lg leading-relaxed text-gray-400 whitespace-pre-line">{{ $profile->bio }}</p>

                    <div class="mt-8 grid gap-6 sm:grid-cols-3">
                        <div class="border-l-2 border-accent/50 pl-4">
                            <p class="text-2xl font-bold text-white">5+</p>
                            <p class="text-sm text-gray-500">Years Experience</p>
                        </div>
                        <div class="border-l-2 border-accent/50 pl-4">
                            <p class="text-2xl font-bold text-white">{{ $projects->count() }}+</p>
                            <p class="text-sm text-gray-500">Projects Done</p>
                        </div>
                        <div class="border-l-2 border-accent/50 pl-4">
                            <p class="text-2xl font-bold text-white">{{ $skills->count() }}+</p>
                            <p class="text-sm text-gray-500">Technologies</p>
                        </div>
                    </div>

                    @if ($profile->resume_link)
                        <a href="{{ $profile->resume_link }}" target="_blank" rel="noopener"
                           class="btn-accent mt-8 inline-flex">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Download Resume
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
