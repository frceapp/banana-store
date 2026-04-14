<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="@yield('meta_description', 'b-store — Premium fresh bananas delivered to your door. Shop organic, cavendish, red and more.')">
    <title>@yield('title', 'b-store | Premium Banana Shop')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="min-h-screen flex flex-col antialiased">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 border-b border-white/10 bg-neutral-950/80 backdrop-blur-xl" id="navbar">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-18">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div
                        class="w-9 h-9 bg-yellow-400 rounded-xl flex items-center justify-center shadow-lg shadow-yellow-400/30 group-hover:scale-110 transition-transform duration-200">
                        <span class="text-xl">🍌</span>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight">
                        <span class="text-white">B-</span><span class="text-gradient">Store</span>
                    </span>
                </a>

                <!-- Desktop Nav -->
                <ul class="hidden md:flex items-center gap-1">
                    <li><a href="{{ route('home') }}"
                            class="nav-link px-4 py-2 rounded-xl text-sm font-semibold text-neutral-300 hover:text-white hover:bg-white/5 transition-all duration-200 {{ request()->routeIs('home') ? 'text-yellow-400 bg-yellow-400/10' : '' }}">Home</a>
                    </li>
                    <li><a href="{{ route('shop') }}"
                            class="nav-link px-4 py-2 rounded-xl text-sm font-semibold text-neutral-300 hover:text-white hover:bg-white/5 transition-all duration-200 {{ request()->routeIs('shop') ? 'text-yellow-400 bg-yellow-400/10' : '' }}">Shop</a>
                    </li>
                    <li><a href="{{ route('home') }}#about"
                            class="nav-link px-4 py-2 rounded-xl text-sm font-semibold text-neutral-300 hover:text-white hover:bg-white/5 transition-all duration-200">About</a>
                    </li>
                    <li><a href="{{ route('home') }}#contact"
                            class="nav-link px-4 py-2 rounded-xl text-sm font-semibold text-neutral-300 hover:text-white hover:bg-white/5 transition-all duration-200">Contact</a>
                    </li>
                </ul>

                <!-- Actions -->
                <div class="flex items-center gap-3">
                    <!-- Cart -->
                    <a href="{{ route('cart') }}" id="cart-icon-btn"
                        class="relative p-2.5 rounded-xl text-neutral-300 hover:text-white hover:bg-white/5 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span id="cart-count"
                            class="absolute -top-1 -right-1 w-5 h-5 bg-yellow-400 text-neutral-900 text-xs font-bold rounded-full flex items-center justify-center opacity-0 scale-0 transition-all duration-200">0</span>
                    </a>

                    <!-- CTA Button desktop -->
                    <a href="{{ route('shop') }}" class="hidden md:inline-flex btn-primary text-sm py-2.5 px-5">
                        Shop Now
                    </a>

                    <!-- Mobile menu toggle -->
                    <button id="mobile-menu-btn"
                        class="md:hidden p-2.5 rounded-xl text-neutral-300 hover:text-white hover:bg-white/5 transition-all duration-200"
                        aria-label="Toggle menu">
                        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden overflow-hidden max-h-0 transition-all duration-300 ease-in-out">
                <div class="py-4 space-y-1 border-t border-white/10">
                    <a href="{{ route('home') }}"
                        class="block px-4 py-3 rounded-xl text-sm font-semibold text-neutral-300 hover:text-white hover:bg-white/5 {{ request()->routeIs('home') ? 'text-yellow-400 bg-yellow-400/10' : '' }}">Home</a>
                    <a href="{{ route('shop') }}"
                        class="block px-4 py-3 rounded-xl text-sm font-semibold text-neutral-300 hover:text-white hover:bg-white/5 {{ request()->routeIs('shop') ? 'text-yellow-400 bg-yellow-400/10' : '' }}">Shop</a>
                    <a href="{{ route('home') }}#about"
                        class="block px-4 py-3 rounded-xl text-sm font-semibold text-neutral-300 hover:text-white hover:bg-white/5">About</a>
                    <a href="{{ route('home') }}#contact"
                        class="block px-4 py-3 rounded-xl text-sm font-semibold text-neutral-300 hover:text-white hover:bg-white/5">Contact</a>
                    <div class="pt-2">
                        <a href="{{ route('shop') }}" class="btn-primary w-full text-sm">Shop Now</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-neutral-900 border-t border-white/10 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

                <!-- Brand -->
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-9 h-9 bg-yellow-400 rounded-xl flex items-center justify-center">
                            <span class="text-xl">🍌</span>
                        </div>
                        <span class="text-xl font-extrabold"><span class="text-white">B-</span><span
                                class="text-gradient">Store</span></span>
                    </div>
                    <p class="text-neutral-400 text-sm leading-relaxed max-w-sm">
                        Premium organic bananas sourced directly from tropical farms. Fresh, healthy, and delivered
                        straight to your door.
                    </p>
                    <div class="flex gap-3 mt-5">
                        <a href="#"
                            class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-neutral-400 hover:text-yellow-400 hover:border-yellow-400/40 transition-all duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-neutral-400 hover:text-yellow-400 hover:border-yellow-400/40 transition-all duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-neutral-400 hover:text-yellow-400 hover:border-yellow-400/40 transition-all duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.27 8.27 0 004.84 1.55V6.8a4.85 4.85 0 01-1.07-.11z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-sm font-bold text-white uppercase tracking-widest mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}"
                                class="text-neutral-400 text-sm hover:text-yellow-400 transition-colors duration-200">Home</a>
                        </li>
                        <li><a href="{{ route('shop') }}"
                                class="text-neutral-400 text-sm hover:text-yellow-400 transition-colors duration-200">Shop</a>
                        </li>
                        <li><a href="{{ route('cart') }}"
                                class="text-neutral-400 text-sm hover:text-yellow-400 transition-colors duration-200">Cart</a>
                        </li>
                        <li><a href="{{ route('home') }}#about"
                                class="text-neutral-400 text-sm hover:text-yellow-400 transition-colors duration-200">About
                                Us</a></li>
                        <li><a href="{{ route('home') }}#contact"
                                class="text-neutral-400 text-sm hover:text-yellow-400 transition-colors duration-200">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-sm font-bold text-white uppercase tracking-widest mb-4">Contact</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-2 text-neutral-400 text-sm">
                            <svg class="w-4 h-4 mt-0.5 shrink-0 text-yellow-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            123 Banana Lane, Tropical City, TC 12345
                        </li>
                        <li class="flex items-center gap-2 text-neutral-400 text-sm">
                            <svg class="w-4 h-4 shrink-0 text-yellow-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            hello@bstore.com
                        </li>
                        <li class="flex items-center gap-2 text-neutral-400 text-sm">
                            <svg class="w-4 h-4 shrink-0 text-yellow-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            +1 (800) BAN-ANAS
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="mt-12 pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-neutral-500 text-sm">&copy; {{ date('Y') }} b-store. All rights reserved.</p>
                <p class="text-neutral-500 text-sm">Made with 🍌 &amp; ❤️</p>
            </div>
        </div>
    </footer>

    <!-- Toast Notification -->
    <div id="toast"
        class="fixed bottom-6 right-6 z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none">
        <div
            class="flex items-center gap-3 bg-neutral-800 border border-yellow-400/30 text-white px-5 py-3.5 rounded-2xl shadow-xl shadow-black/40">
            <span class="text-yellow-400 text-lg">🍌</span>
            <span id="toast-message" class="text-sm font-medium"></span>
        </div>
    </div>

    @stack('scripts')

    <script>
        // Mobile menu
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        let menuOpen = false;

        mobileMenuBtn.addEventListener('click', () => {
            menuOpen = !menuOpen;
            mobileMenu.style.maxHeight = menuOpen ? mobileMenu.scrollHeight + 'px' : '0';
            menuIcon.classList.toggle('hidden', menuOpen);
            closeIcon.classList.toggle('hidden', !menuOpen);
        });

        // Cart count from localStorage
        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('bstore_cart') || '[]');
            const total = cart.reduce((sum, item) => sum + item.qty, 0);
            const badge = document.getElementById('cart-count');
            if (total > 0) {
                badge.textContent = total > 99 ? '99+' : total;
                badge.classList.remove('opacity-0', 'scale-0');
            } else {
                badge.classList.add('opacity-0', 'scale-0');
            }
        }
        updateCartCount();

        // Toast notification
        function showToast(message) {
            const toast = document.getElementById('toast');
            document.getElementById('toast-message').textContent = message;
            toast.classList.remove('translate-y-20', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
                toast.classList.remove('translate-y-0', 'opacity-100');
            }, 3000);
        }

        // Add to cart function (global)
        function addToCart(id, name, price, image) {
            let cart = JSON.parse(localStorage.getItem('bstore_cart') || '[]');
            const existing = cart.find(i => i.id === id);
            if (existing) {
                existing.qty += 1;
            } else {
                cart.push({ id, name, price, image, qty: 1 });
            }
            localStorage.setItem('bstore_cart', JSON.stringify(cart));
            updateCartCount();
            showToast(name + ' added to cart!');
        }
    </script>
</body>

</html>