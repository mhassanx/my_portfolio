<section id="skills" class="section-padding border-t border-white/5 bg-[#0a0a0a]">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="section-header fade-in-scroll text-center">
            <span class="text-sm font-medium uppercase tracking-widest text-accent">Expertise</span>
            <h2 class="mt-2 text-3xl font-bold text-white sm:text-4xl">Skills & Tools</h2>
            <div class="mx-auto mt-4 h-px w-16 bg-accent"></div>
        </div>

        <div class="mt-16 flex flex-wrap justify-center gap-6">
            @foreach ($skills as $skill)
                <div class="fade-in-scroll group flex flex-col items-center gap-3" style="animation-delay: {{ $loop->index * 0.05 }}s">
                    <div class="hex-icon hex-icon-lg group-hover:scale-110">
                        @if ($skill->icon_url)
                            <img src="{{ $skill->icon_url }}" alt="{{ $skill->name }}" class="h-8 w-8 object-contain">
                        @else
                            <span class="text-sm font-bold uppercase text-gray-300 group-hover:text-accent transition">
                                {{ Str::substr($skill->name, 0, 2) }}
                            </span>
                        @endif
                    </div>
                    <span class="text-sm font-medium text-gray-500 group-hover:text-gray-300 transition">{{ $skill->name }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
