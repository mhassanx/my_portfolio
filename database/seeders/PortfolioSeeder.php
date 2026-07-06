<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@portfolio.test'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // Profile
        Profile::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'Alex Morgan',
                'title' => 'Full Stack Developer',
                'tagline' => 'Crafting bold digital experiences with clean code and creative design.',
                'bio' => 'I am a passionate full-stack developer with 5+ years of experience building web applications. I specialize in Laravel, React, and modern JavaScript frameworks. I love turning complex problems into elegant, user-friendly solutions.',
                'resume_link' => '#',
            ]
        );

        // Categories
        $categories = collect([
            ['name' => 'JavaScript', 'slug' => 'javascript'],
            ['name' => 'Frontend', 'slug' => 'frontend'],
            ['name' => 'Frontend + Backend', 'slug' => 'frontend-backend'],
            ['name' => 'Laravel', 'slug' => 'laravel'],
        ])->mapWithKeys(fn ($cat) => [$cat['slug'] => Category::updateOrCreate(['slug' => $cat['slug']], $cat)]);

        // Ensure storage directories exist
        Storage::disk('public')->makeDirectory('projects');
        Storage::disk('public')->makeDirectory('profile');

        // Copy placeholder images to storage
        $this->copyPlaceholder('hero.svg', 'profile/hero.svg');
        $this->copyPlaceholder('profile.svg', 'profile/avatar.svg');
        Profile::first()->update([
            'hero_image' => 'profile/hero.svg',
            'profile_image' => 'profile/avatar.svg',
        ]);

        // Sample projects
        $projects = [
            [
                'title' => 'Neon Dashboard',
                'description' => 'A real-time analytics dashboard with dark theme UI, interactive charts, and WebSocket live updates.',
                'category' => 'javascript',
                'technologies' => 'React, Node.js, Socket.io, Chart.js',
                'deployed_link' => 'https://example.com',
                'github_link' => 'https://github.com',
                'image' => 'project-1.svg',
            ],
            [
                'title' => 'Pixel Portfolio',
                'description' => 'A creative portfolio site with smooth scroll animations, project filtering, and responsive design.',
                'category' => 'frontend',
                'technologies' => 'Vue.js, Tailwind CSS, GSAP',
                'deployed_link' => 'https://example.com',
                'github_link' => null,
                'image' => 'project-2.svg',
            ],
            [
                'title' => 'TaskFlow API',
                'description' => 'RESTful task management API with authentication, role-based access, and comprehensive test coverage.',
                'category' => 'frontend-backend',
                'technologies' => 'Laravel, Vue.js, MySQL, Redis',
                'deployed_link' => null,
                'github_link' => 'https://github.com',
                'image' => 'project-3.svg',
            ],
            [
                'title' => 'ShopWave E-Commerce',
                'description' => 'Full-featured e-commerce platform with cart, checkout, payment integration, and admin panel.',
                'category' => 'laravel',
                'technologies' => 'Laravel, Livewire, Stripe, MySQL',
                'deployed_link' => 'https://example.com',
                'github_link' => 'https://github.com',
                'image' => 'project-4.svg',
            ],
        ];

        foreach ($projects as $data) {
            $imagePath = 'projects/'.$data['image'];
            $this->copyPlaceholder($data['image'], $imagePath);

            Project::updateOrCreate(
                ['title' => $data['title']],
                [
                    'description' => $data['description'],
                    'category_id' => $categories[$data['category']]->id,
                    'technologies' => $data['technologies'],
                    'deployed_link' => $data['deployed_link'],
                    'github_link' => $data['github_link'],
                    'image_path' => $imagePath,
                ]
            );
        }

        // Skills
        $skills = [
            ['name' => 'Laravel', 'icon_class' => 'laravel', 'sort_order' => 1],
            ['name' => 'React', 'icon_class' => 'react', 'sort_order' => 2],
            ['name' => 'JavaScript', 'icon_class' => 'javascript', 'sort_order' => 3],
            ['name' => 'PHP', 'icon_class' => 'php', 'sort_order' => 4],
            ['name' => 'MySQL', 'icon_class' => 'mysql', 'sort_order' => 5],
            ['name' => 'Tailwind', 'icon_class' => 'tailwind', 'sort_order' => 6],
            ['name' => 'Git', 'icon_class' => 'git', 'sort_order' => 7],
            ['name' => 'Docker', 'icon_class' => 'docker', 'sort_order' => 8],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill);
        }

        // Social links
        $socials = [
            ['platform_name' => 'GitHub', 'url' => 'https://github.com', 'icon' => 'github', 'sort_order' => 1],
            ['platform_name' => 'LinkedIn', 'url' => 'https://linkedin.com', 'icon' => 'linkedin', 'sort_order' => 2],
            ['platform_name' => 'Twitter', 'url' => 'https://twitter.com', 'icon' => 'twitter', 'sort_order' => 3],
        ];

        foreach ($socials as $social) {
            SocialLink::updateOrCreate(['platform_name' => $social['platform_name']], $social);
        }
    }

    private function copyPlaceholder(string $filename, string $destination): void
    {
        $source = public_path('images/portfolio/'.$filename);

        if (File::exists($source)) {
            Storage::disk('public')->put($destination, File::get($source));
        }
    }
}
