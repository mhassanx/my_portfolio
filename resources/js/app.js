import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.portfolioApp = () => ({
    activeSection: 'home',
    scrolled: false,
    mobileOpen: false,

    init() {
        this.setupScrollSpy();
        this.setupFadeInObserver();
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 20;
        }, { passive: true });
    },

    scrollTo(id) {
        const el = document.getElementById(id);
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            this.activeSection = id;
        }
    },

    setupScrollSpy() {
        const sections = ['home', 'about', 'skills', 'projects', 'contact'];
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        this.activeSection = entry.target.id;
                    }
                });
            },
            { rootMargin: '-40% 0px -40% 0px', threshold: 0 }
        );

        sections.forEach((id) => {
            const el = document.getElementById(id);
            if (el) observer.observe(el);
        });
    },

    setupFadeInObserver() {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
        );

        document.querySelectorAll('.fade-in-scroll').forEach((el) => observer.observe(el));
    },
});

Alpine.start();
