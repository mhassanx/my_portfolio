<section id="projects" class="section-padding border-t border-white/5"
         x-data="{
            filter: 'all',
            projects: {{ Js::from($projects->map(fn ($p) => [
                'id' => $p->id,
                'title' => $p->title,
                'description' => $p->description,
                'image_url' => $p->image_url,
                'category' => $p->category->name,
                'category_slug' => $p->category->slug,
                'deployed_link' => $p->deployed_link,
                'github_link' => $p->github_link,
                'technologies' => $p->technologies_list,
            ])) }},
            get filtered() {
                if (this.filter === 'all') return this.projects;
                return this.projects.filter(p => p.category_slug === this.filter);
            }
         }">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="section-header fade-in-scroll">
            <span class="text-sm font-medium uppercase tracking-widest text-accent">Portfolio</span>
            <h2 class="mt-2 text-3xl font-bold text-white sm:text-4xl">Featured Projects</h2>
            <div class="mt-4 h-px w-16 bg-accent"></div>
        </div>

        {{-- Category Filter Tabs --}}
        <div class="mt-10 flex flex-wrap gap-3 fade-in-scroll">
            <button @click="filter = 'all'"
                    class="filter-tab"
                    :class="filter === 'all' ? 'filter-tab-active' : ''">
                All
            </button>
            @foreach ($categories as $category)
                <button @click="filter = '{{ $category->slug }}'"
                        class="filter-tab"
                        :class="filter === '{{ $category->slug }}' ? 'filter-tab-active' : ''">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        {{-- Project Grid --}}
        <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <template x-for="project in filtered" :key="project.id">
                <article class="project-card fade-in-scroll group">
                    <div class="relative overflow-hidden rounded-t-xl">
                        <template x-if="project.image_url">
                            <img :src="project.image_url" :alt="project.title"
                                 class="h-48 w-full object-cover transition duration-500 group-hover:scale-105">
                        </template>
                        <template x-if="!project.image_url">
                            <div class="flex h-48 items-center justify-center bg-[#1a1a1a]">
                                <span class="text-4xl font-bold text-accent/20" x-text="project.title.charAt(0)"></span>
                            </div>
                        </template>
                        <span class="absolute top-3 right-3 rounded-full bg-accent/90 px-3 py-1 text-xs font-semibold text-white"
                              x-text="project.category"></span>
                    </div>

                    <div class="p-6">
                        <h3 class="text-lg font-bold text-white" x-text="project.title"></h3>
                        <p class="mt-2 text-sm leading-relaxed text-gray-500 line-clamp-3" x-text="project.description"></p>

                        <template x-if="project.technologies.length">
                            <div class="mt-4 flex flex-wrap gap-2">
                                <template x-for="tech in project.technologies" :key="tech">
                                    <span class="rounded bg-white/5 px-2 py-0.5 text-xs text-gray-500" x-text="tech"></span>
                                </template>
                            </div>
                        </template>

                        <div class="mt-6 flex flex-wrap gap-3">
                            <template x-if="project.deployed_link">
                                <a :href="project.deployed_link" target="_blank" rel="noopener" class="btn-accent text-xs px-4 py-2">
                                    Live Demo
                                </a>
                            </template>
                            <template x-if="!project.deployed_link && project.github_link">
                                <a :href="project.github_link" target="_blank" rel="noopener"
                                   class="inline-flex items-center rounded-lg border border-white/10 px-4 py-2 text-xs font-semibold text-gray-300 transition hover:border-accent/50 hover:text-accent">
                                    View Code
                                </a>
                            </template>
                            <template x-if="project.deployed_link && project.github_link">
                                <a :href="project.github_link" target="_blank" rel="noopener"
                                   class="inline-flex items-center rounded-lg border border-white/10 px-4 py-2 text-xs font-semibold text-gray-300 transition hover:border-accent/50 hover:text-accent">
                                    GitHub Repo
                                </a>
                            </template>
                        </div>
                    </div>
                </article>
            </template>
        </div>

        <div x-show="filtered.length === 0" class="mt-12 text-center text-gray-500">
            No projects in this category yet.
        </div>
    </div>
</section>
