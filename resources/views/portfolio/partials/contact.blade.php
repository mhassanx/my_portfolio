<section id="contact" class="section-padding border-t border-white/5 bg-[#0a0a0a]">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="section-header fade-in-scroll text-center">
            <span class="text-sm font-medium uppercase tracking-widest text-accent">Get In Touch</span>
            <h2 class="mt-2 text-3xl font-bold text-white sm:text-4xl">Contact Me</h2>
            <div class="mx-auto mt-4 h-px w-16 bg-accent"></div>
            <p class="mx-auto mt-4 max-w-lg text-gray-500">Have a project in mind or want to collaborate? Send me a message.</p>
        </div>

        <div class="mx-auto mt-12 max-w-xl fade-in-scroll">
            @if (session('success'))
                <div class="mb-6 rounded-lg border border-green-500/30 bg-green-500/10 px-4 py-3 text-sm text-green-400">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}" class="portfolio-card space-y-5">
                @csrf
                <div>
                    <label for="name" class="mb-1 block text-sm text-gray-400">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                           class="portfolio-input">
                    @error('name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="email" class="mb-1 block text-sm text-gray-400">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           class="portfolio-input">
                    @error('email') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="message" class="mb-1 block text-sm text-gray-400">Message</label>
                    <textarea name="message" id="message" rows="5" required class="portfolio-input">{{ old('message') }}</textarea>
                    @error('message') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="btn-accent w-full">Send Message</button>
            </form>
        </div>
    </div>
</section>
