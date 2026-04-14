@extends('layouts.app')

@section('title', 'b-store | Premium Banana Shop — Fresh Bananas Delivered')
@section('meta_description', 'Buy fresh organic bananas online. Premium Cavendish, Red Banana, Baby Banana & more. Fast delivery, best quality guaranteed.')

@section('content')

    {{-- ===================== HERO ===================== --}}
    <section class="relative overflow-hidden min-h-screen flex items-center">

        <!-- Background Glow -->
        <div class="absolute inset-0 pointer-events-none">
            <div
                class="absolute top-[-20%] left-[50%] -translate-x-1/2 w-[800px] h-[800px] bg-yellow-500/10 rounded-full blur-[120px]">
            </div>
            <div class="absolute bottom-[-10%] left-[-10%] w-[400px] h-[400px] bg-amber-500/8 rounded-full blur-[80px]">
            </div>
            <div class="absolute top-[20%] right-[-5%] w-[300px] h-[300px] bg-yellow-400/6 rounded-full blur-[60px]"></div>
        </div>

        <!-- Grid Pattern -->
        <div
            class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.02)_1px,transparent_1px)] bg-[size:60px_60px] pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <!-- Text Content -->
                <div class="space-y-8 animate-fade-in-up">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-400/10 border border-yellow-400/20 rounded-full">
                        <span class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></span>
                        <span class="text-yellow-400 text-xs font-bold tracking-widest uppercase">100% Organic &amp;
                            Fresh</span>
                    </div>

                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-black leading-[1.05] tracking-tight">
                        The World's<br>
                        <span class="text-gradient">Finest</span><br>
                        Bananas. 🍌
                    </h1>

                    <p class="text-neutral-400 text-lg leading-relaxed max-w-xl">
                        From tropical farms to your table — shop our premium selection of fresh bananas. Packed with
                        nutrients, bursting with flavor.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('shop') }}" id="hero-shop-btn" class="btn-primary text-base px-8 py-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Shop Now
                        </a>
                        <a href="#featured" id="hero-featured-btn" class="btn-outline text-base px-8 py-4">
                            View Products
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="flex gap-8 pt-4">
                        <div>
                            <div class="text-2xl font-black text-yellow-400">50+</div>
                            <div class="text-xs text-neutral-500 font-medium mt-0.5">Varieties</div>
                        </div>
                        <div class="w-px bg-white/10"></div>
                        <div>
                            <div class="text-2xl font-black text-yellow-400">10K+</div>
                            <div class="text-xs text-neutral-500 font-medium mt-0.5">Happy Customers</div>
                        </div>
                        <div class="w-px bg-white/10"></div>
                        <div>
                            <div class="text-2xl font-black text-yellow-400">24h</div>
                            <div class="text-xs text-neutral-500 font-medium mt-0.5">Fast Delivery</div>
                        </div>
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="relative flex items-center justify-center animate-fade-in-up animate-delay-200">
                    <div class="relative">
                        <!-- Glow ring -->
                        <div class="absolute inset-0 bg-yellow-400/20 rounded-full blur-3xl scale-110"></div>
                        <!-- Main Image -->
                        <img src="https://images.unsplash.com/photo-1528825871115-3581a5387919?w=600&auto=format&fit=crop&q=80"
                            alt="Fresh premium bananas bunch"
                            class="relative z-10 w-full max-w-md mx-auto rounded-3xl object-cover aspect-square shadow-2xl animate-float"
                            loading="eager">
                        <!-- Floating badge -->
                        <div
                            class="absolute top-6 -right-4 z-20 bg-yellow-400 text-neutral-900 px-4 py-2 rounded-2xl shadow-lg font-bold text-sm rotate-3">
                            🌿 Organic
                        </div>
                        <div class="absolute bottom-6 -left-4 z-20 card-glass px-4 py-3 rounded-2xl shadow-lg">
                            <div class="text-xs text-neutral-400">Starting from</div>
                            <div class="text-lg font-black text-yellow-400">$1.99 <span
                                    class="text-xs text-neutral-400 font-normal">/kg</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce opacity-50">
            <span class="text-xs text-neutral-500 font-medium tracking-widest uppercase">Scroll</span>
            <svg class="w-4 h-4 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </section>

    {{-- ===================== TRUST BADGES ===================== --}}
    <section class="border-y border-white/10 bg-white/[0.02] py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php
                    $badges = [
                        ['🚚', 'Free Delivery', 'On orders over $25'],
                        ['🌿', '100% Organic', 'Certified & verified'],
                        ['❄️', 'Fresh Guarantee', 'Or your money back'],
                        ['⭐', '4.9/5 Rating', 'From 10k+ customers'],
                    ];
                @endphp
                @foreach($badges as $badge)
                    <div class="flex items-center gap-3 p-4 rounded-xl hover:bg-white/5 transition-colors duration-200">
                        <span class="text-2xl">{{ $badge[0] }}</span>
                        <div>
                            <div class="text-sm font-bold text-white">{{ $badge[1] }}</div>
                            <div class="text-xs text-neutral-500">{{ $badge[2] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== FEATURED PRODUCTS ===================== --}}
    <section id="featured" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Heading -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-12">
                <div>
                    <span class="text-yellow-400 text-xs font-bold uppercase tracking-widest mb-2 block">Most Loved</span>
                    <h2 class="section-heading">Featured <span class="text-gradient">Products</span></h2>
                </div>
                <a href="{{ route('shop') }}"
                    class="text-yellow-400 text-sm font-semibold hover:underline flex items-center gap-1">
                    View All
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                    <div class="product-card">
                        <!-- Image -->
                        <div class="relative overflow-hidden aspect-square bg-neutral-900">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                loading="lazy">
                            @if(isset($product['badge']))
                                <span
                                    class="absolute top-3 left-3 badge bg-yellow-400 text-neutral-900">{{ $product['badge'] }}</span>
                            @endif
                            <!-- Quick add overlay -->
                            <div
                                class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <button
                                    onclick="addToCart({{ $product['id'] }}, '{{ $product['name'] }}', {{ $product['price'] }}, '{{ $product['image'] }}')"
                                    class="btn-primary text-sm py-2.5 px-5 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                        <!-- Info -->
                        <div class="p-4">
                            <div class="text-xs text-neutral-500 mb-1 font-medium">{{ $product['category'] }}</div>
                            <h3 class="font-bold text-white text-sm leading-tight mb-2">{{ $product['name'] }}</h3>
                            <div class="flex items-center gap-1 mb-3">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-3.5 h-3.5 {{ $i < $product['rating'] ? 'text-yellow-400' : 'text-neutral-700' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                                <span class="text-neutral-500 text-xs ml-1">({{ $product['reviews'] }})</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span
                                        class="text-yellow-400 font-black text-lg">${{ number_format($product['price'], 2) }}</span>
                                    <span class="text-neutral-500 text-xs ml-1">/kg</span>
                                </div>
                                <a href="{{ route('product', $product['id']) }}"
                                    class="text-xs text-neutral-400 hover:text-yellow-400 transition-colors font-medium">Details
                                    →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== CATEGORIES BANNER ===================== --}}
    <section class="py-16 bg-white/[0.02]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-yellow-400 text-xs font-bold uppercase tracking-widest mb-2 block">Browse by Type</span>
                <h2 class="section-heading">Shop by <span class="text-gradient">Category</span></h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @php
                    $categories = [
                        ['name' => 'Cavendish', 'emoji' => '🍌', 'desc' => 'Most popular variety', 'color' => 'from-yellow-500/20 to-yellow-600/5', 'border' => 'hover:border-yellow-400/40'],
                        ['name' => 'Red Banana', 'emoji' => '🫚', 'desc' => 'Sweet & creamy', 'color' => 'from-red-500/20 to-red-600/5', 'border' => 'hover:border-red-400/40'],
                        ['name' => 'Baby Banana', 'emoji' => '🟡', 'desc' => 'Small & extra sweet', 'color' => 'from-amber-500/20 to-amber-600/5', 'border' => 'hover:border-amber-400/40'],
                        ['name' => 'Plantain', 'emoji' => '🌿', 'desc' => 'Perfect for cooking', 'color' => 'from-green-500/20 to-green-600/5', 'border' => 'hover:border-green-400/40'],
                    ];
                @endphp
                @foreach($categories as $cat)
                    <a href="{{ route('shop', ['category' => $cat['name']]) }}"
                        class="card-glass {{ $cat['border'] }} group p-6 flex flex-col items-center text-center gap-3 transition-all duration-300 hover:-translate-y-1">
                        <div
                            class="w-16 h-16 rounded-2xl bg-gradient-to-br {{ $cat['color'] }} flex items-center justify-center text-3xl group-hover:scale-110 transition-transform duration-300">
                            {{ $cat['emoji'] }}
                        </div>
                        <div>
                            <div class="font-bold text-white text-sm">{{ $cat['name'] }}</div>
                            <div class="text-xs text-neutral-500 mt-0.5">{{ $cat['desc'] }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== PROMO BANNER ===================== --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-yellow-400 via-amber-400 to-orange-400 p-8 md:p-12 glow-yellow">
                <!-- Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-4 right-8 text-8xl rotate-12">🍌</div>
                    <div class="absolute bottom-4 right-24 text-6xl -rotate-6">🍌</div>
                    <div class="absolute top-1/2 right-48 text-5xl rotate-45 opacity-50">🍌</div>
                </div>

                <div class="relative flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                    <div>
                        <span
                            class="inline-block bg-black/10 text-neutral-900 text-xs font-black uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">🔥
                            Limited Time Offer</span>
                        <h2 class="text-3xl md:text-4xl font-black text-neutral-900 leading-tight mb-2">
                            Get 20% Off Your<br>First Order!
                        </h2>
                        <p class="text-neutral-800 text-sm font-medium">Use code <strong
                                class="bg-black/10 px-2 py-0.5 rounded-lg font-black">BANANA20</strong> at checkout</p>
                    </div>
                    <a href="{{ route('shop') }}" id="promo-shop-btn"
                        class="shrink-0 inline-flex items-center gap-2 bg-neutral-900 text-white font-bold px-8 py-4 rounded-2xl hover:bg-neutral-800 active:scale-95 transition-all duration-200 shadow-lg">
                        Claim Offer
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== WHY CHOOSE US / ABOUT ===================== --}}
    <section id="about" class="py-20 bg-white/[0.02]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <!-- Image -->
                <div class="relative">
                    <div class="absolute inset-0 bg-yellow-500/10 rounded-3xl blur-3xl"></div>
                    <div class="relative grid grid-cols-2 gap-4">
                        <img src="https://images.unsplash.com/photo-1481349518771-20055b2a7b24?w=400&auto=format&fit=crop&q=80"
                            alt="Banana plantation farm" class="rounded-2xl object-cover aspect-square w-full shadow-xl"
                            loading="lazy">
                        <img src="https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=400&auto=format&fit=crop&q=80"
                            alt="Fresh bananas closeup" class="rounded-2xl object-cover aspect-square w-full shadow-xl mt-8"
                            loading="lazy">
                    </div>
                </div>

                <!-- Content -->
                <div class="space-y-6">
                    <span class="text-yellow-400 text-xs font-bold uppercase tracking-widest">Who We Are</span>
                    <h2 class="section-heading">Why Choose <span class="text-gradient">b-store?</span></h2>
                    <p class="text-neutral-400 leading-relaxed">
                        We partner directly with tropical farms in Ecuador, Philippines, and Colombia to bring you the
                        freshest bananas imaginable. No middlemen, no compromises — just pure, natural goodness.
                    </p>

                    <div class="space-y-4">
                        @php
                            $features = [
                                ['🌱', 'Farm to Table Freshness', 'Sourced directly from certified organic farms within 48 hours of harvest.'],
                                ['🔬', 'Quality Tested', 'Every batch is tested for pesticides and quality before packaging.'],
                                ['📦', 'Eco-Friendly Packaging', 'We use 100% biodegradable packaging to protect the planet.'],
                                ['💚', 'Farmer Fair Trade', 'We ensure fair wages for all our farming partners worldwide.'],
                            ];
                        @endphp
                        @foreach($features as $feat)
                            <div class="flex gap-4 p-4 rounded-xl hover:bg-white/5 transition-colors duration-200">
                                <div
                                    class="w-10 h-10 rounded-xl bg-yellow-400/10 flex items-center justify-center text-xl shrink-0">
                                    {{ $feat[0] }}</div>
                                <div>
                                    <div class="font-bold text-white text-sm mb-0.5">{{ $feat[1] }}</div>
                                    <div class="text-neutral-400 text-xs leading-relaxed">{{ $feat[2] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== TESTIMONIALS ===================== --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-yellow-400 text-xs font-bold uppercase tracking-widest mb-2 block">What People Say</span>
                <h2 class="section-heading">Customer <span class="text-gradient">Reviews</span></h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $reviews = [
                        ['name' => 'Sarah M.', 'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80', 'stars' => 5, 'text' => 'Absolutely the best bananas I\'ve ever had! They arrived perfectly ripe and so sweet. Will order again for sure!', 'date' => '2 days ago'],
                        ['name' => 'James K.', 'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80', 'stars' => 5, 'text' => 'Love the variety! Got the red bananas for the first time — incredibly creamy and different from regular ones. The packaging was also eco-friendly!', 'date' => '1 week ago'],
                        ['name' => 'Priya L.', 'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&auto=format&fit=crop&q=80', 'stars' => 5, 'text' => 'Fast delivery and impeccable freshness. I\'ve tried 3 other stores and none compare to b-store\'s quality. This is my go-to now!', 'date' => '3 weeks ago'],
                    ];
                @endphp
                @foreach($reviews as $review)
                    <div class="card-glass p-6 hover:border-yellow-400/20 transition-all duration-300">
                        <div class="flex items-center gap-1 mb-4">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 {{ $i < $review['stars'] ? 'text-yellow-400' : 'text-neutral-700' }}"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>
                        <p class="text-neutral-300 text-sm leading-relaxed mb-6">"{{ $review['text'] }}"</p>
                        <div class="flex items-center gap-3">
                            <img src="{{ $review['avatar'] }}" alt="{{ $review['name'] }}"
                                class="w-9 h-9 rounded-full object-cover">
                            <div>
                                <div class="text-sm font-bold text-white">{{ $review['name'] }}</div>
                                <div class="text-xs text-neutral-500">{{ $review['date'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== NEWSLETTER / CONTACT ===================== --}}
    <section id="contact" class="py-20 bg-white/[0.02] border-t border-white/10">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-yellow-400 text-xs font-bold uppercase tracking-widest mb-2 block">Stay Updated</span>
            <h2 class="section-heading mb-4">Get Exclusive <span class="text-gradient">Deals</span></h2>
            <p class="text-neutral-400 mb-8 leading-relaxed">Subscribe to our newsletter and be the first to know about new
                products, seasonal offers, and banana tips!</p>

            <form id="newsletter-form" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto"
                onsubmit="handleNewsletter(event)">
                <input type="email" id="newsletter-email" placeholder="yourname@email.com" required
                    class="input-field flex-1">
                <button type="submit" id="newsletter-submit" class="btn-primary shrink-0 whitespace-nowrap">
                    Subscribe 🍌
                </button>
            </form>
            <p class="text-neutral-600 text-xs mt-4">No spam, ever. Unsubscribe anytime.</p>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        function handleNewsletter(e) {
            e.preventDefault();
            const email = document.getElementById('newsletter-email').value;
            const btn = document.getElementById('newsletter-submit');
            btn.textContent = '✓ Subscribed!';
            btn.classList.add('pointer-events-none', 'opacity-75');
            showToast('Welcome aboard! Check your inbox 🍌');
            document.getElementById('newsletter-email').value = '';
            setTimeout(() => {
                btn.textContent = 'Subscribe 🍌';
                btn.classList.remove('pointer-events-none', 'opacity-75');
            }, 3000);
        }
    </script>
@endpush