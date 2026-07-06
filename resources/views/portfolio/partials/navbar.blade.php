<nav class="fixed top-0 left-0 right-0 z-50 border-b border-white/5 bg-[#0d0d0d]/90 backdrop-blur-md transition-shadow"
     :class="{ 'shadow-lg shadow-black/20': scrolled }">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
        {{-- Logo / Name --}}
        <a href="#home" @click.prevent="scrollTo('home')"
           class="text-lg font-bold tracking-tight text-white transition hover:text-accent">
            {{ Str::before($profile->name, ' ') }}<span class="text-accent">.</span>
        </a>

        {{-- Desktop Nav --}}
        <div class="hidden items-center gap-8 md:flex">
            @foreach (['home' => 'Home', 'about' => 'About', 'skills' => 'Skills', 'projects' => 'Projects', 'contact' => 'Contact'] as $id => $label)
                <a href="#{{ $id }}" @click.prevent="scrollTo('{{ $id }}')"
                   class="nav-link text-sm font-medium transition"
                   :class="activeSection === '{{ $id }}' ? 'text-accent' : 'text-gray-400 hover:text-white'">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        {{-- Mobile menu button --}}
        <button @click="mobileOpen = !mobileOpen" class="md:hidden text-gray-400 hover:text-white" aria-label="Menu">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Mobile Nav --}}
    <div x-show="mobileOpen" x-transition class="border-t border-white/5 bg-[#0d0d0d] md:hidden">
        <div class="flex flex-col gap-1 px-6 py-4">
            @foreach (['home' => 'Home', 'about' => 'About', 'skills' => 'Skills', 'projects' => 'Projects', 'contact' => 'Contact'] as $id => $label)
                <a href="#{{ $id }}" @click.prevent="scrollTo('{{ $id }}'); mobileOpen = false"
                   class="rounded-lg px-3 py-2 text-sm font-medium transition"
                   :class="activeSection === '{{ $id }}' ? 'bg-accent/10 text-accent' : 'text-gray-400 hover:bg-white/5'">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
