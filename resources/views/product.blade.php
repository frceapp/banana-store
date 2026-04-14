@extends('layouts.app')

@section('title', $product['name'] . ' — b-store')
@section('meta_description', $product['description'])

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-neutral-500 mb-8">
            <a href="{{ route('home') }}" class="hover:text-yellow-400 transition-colors">Home</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
            <a href="{{ route('shop') }}" class="hover:text-yellow-400 transition-colors">Shop</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
            <span class="text-neutral-300">{{ $product['name'] }}</span>
        </nav>

        <!-- Product Detail -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">

            {{-- ======== IMAGE GALLERY ======== --}}
            <div class="space-y-4">
                <!-- Main Image -->
                <div class="relative overflow-hidden rounded-3xl aspect-square bg-neutral-900 glow-yellow">
                    <img id="main-product-img" src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                        class="w-full h-full object-cover" loading="eager">
                    @if(isset($product['badge']))
                        <span
                            class="absolute top-5 left-5 badge bg-yellow-400 text-neutral-900 text-sm px-4 py-1.5">{{ $product['badge'] }}</span>
                    @endif
                </div>

                <!-- Thumbnails -->
                <div class="flex gap-3 overflow-x-auto scrollbar-hide pb-1">
                    @foreach($product['gallery'] as $idx => $img)
                        <button onclick="switchImage('{{ $img }}')"
                            class="shrink-0 w-20 h-20 rounded-xl overflow-hidden border-2 {{ $idx === 0 ? 'border-yellow-400' : 'border-transparent' }} hover:border-yellow-400/60 transition-all duration-200 thumb-btn">
                            <img src="{{ $img }}" alt="Product view {{ $idx + 1 }}" class="w-full h-full object-cover">
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- ======== PRODUCT INFO ======== --}}
            <div class="space-y-6">

                <!-- Category & Name -->
                <div>
                    <span
                        class="badge bg-yellow-400/10 text-yellow-400 border border-yellow-400/20 mb-3">{{ $product['category'] }}</span>
                    <h1 class="text-3xl md:text-4xl font-black leading-tight">{{ $product['name'] }}</h1>
                </div>

                <!-- Rating -->
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 {{ $i < $product['rating'] ? 'text-yellow-400' : 'text-neutral-700' }}"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <span class="text-yellow-400 font-bold">{{ $product['rating'] }}.0</span>
                    <span class="text-neutral-500 text-sm">({{ $product['reviews'] }} reviews)</span>
                    <span class="text-green-400 text-sm font-semibold">✓ In Stock</span>
                </div>

                <!-- Price -->
                <div class="flex items-baseline gap-3">
                    <span class="text-4xl font-black text-yellow-400">${{ number_format($product['price'], 2) }}</span>
                    @if(isset($product['old_price']))
                        <span
                            class="text-neutral-500 text-xl line-through">${{ number_format($product['old_price'], 2) }}</span>
                        <span class="badge bg-red-500/20 border border-red-500/30 text-red-400">Save
                            {{ round((($product['old_price'] - $product['price']) / $product['old_price']) * 100) }}%</span>
                    @endif
                    <span class="text-neutral-500 text-sm">per kg</span>
                </div>

                <!-- Description -->
                <p class="text-neutral-400 leading-relaxed">{{ $product['description'] }}</p>

                <!-- Quantity Selector + Add to Cart -->
                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-semibold text-neutral-300 mb-2 block">Quantity (kg)</label>
                        <div class="flex items-center gap-3">
                            <button id="qty-minus" onclick="changeQty(-1)"
                                class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:border-yellow-400/40 hover:bg-yellow-400/10 transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                                </svg>
                            </button>
                            <span id="qty-display" class="w-12 text-center font-bold text-white text-lg">1</span>
                            <button id="qty-plus" onclick="changeQty(1)"
                                class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:border-yellow-400/40 hover:bg-yellow-400/10 transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                            </button>
                            <span class="text-neutral-500 text-sm">kg</span>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <button id="add-to-cart-btn" onclick="addToCartWithQty()" class="btn-primary flex-1 py-4 text-base">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Add to Cart
                        </button>
                        <a href="{{ route('cart') }}" id="buy-now-btn" onclick="addToCartWithQty()"
                            class="btn-outline py-4 px-6 text-base">
                            Buy Now
                        </a>
                    </div>
                </div>

                <!-- Nutrition -->
                <div class="card-glass rounded-2xl p-5">
                    <h3 class="font-bold text-white text-sm mb-4">🥗 Nutrition per 100g</h3>
                    <div class="grid grid-cols-4 gap-3">
                        @foreach($product['nutrition'] as $nut)
                            <div class="text-center p-3 bg-white/5 rounded-xl">
                                <div class="text-yellow-400 font-black text-sm">{{ $nut['value'] }}</div>
                                <div class="text-neutral-500 text-xs mt-0.5">{{ $nut['label'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2">
                    @foreach($product['tags'] as $tag)
                        <span
                            class="badge bg-white/5 border border-white/10 text-neutral-400 text-xs px-3 py-1.5">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ======== RELATED PRODUCTS ======== --}}
        @if(count($relatedProducts) > 0)
            <div class="border-t border-white/10 pt-16">
                <div class="mb-8">
                    <span class="text-yellow-400 text-xs font-bold uppercase tracking-widest mb-2 block">You Might Also
                        Like</span>
                    <h2 class="text-2xl font-black">Related <span class="text-gradient">Products</span></h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $related)
                        <div class="product-card">
                            <div class="relative overflow-hidden aspect-square bg-neutral-900">
                                <img src="{{ $related['image'] }}" alt="{{ $related['name'] }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy">
                                <div
                                    class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <button
                                        onclick="addToCart({{ $related['id'] }}, '{{ addslashes($related['name']) }}', {{ $related['price'] }}, '{{ $related['image'] }}')"
                                        class="btn-primary text-sm py-2">Add to Cart</button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="text-xs text-neutral-500 mb-1">{{ $related['category'] }}</div>
                                <h3 class="font-bold text-white text-sm mb-2">{{ $related['name'] }}</h3>
                                <div class="flex justify-between items-center">
                                    <span class="text-yellow-400 font-black">${{ number_format($related['price'], 2) }} <span
                                            class="text-neutral-500 text-xs font-normal">/kg</span></span>
                                    <a href="{{ route('product', $related['id']) }}"
                                        class="text-xs text-neutral-400 hover:text-yellow-400 transition-colors">Details →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

@endsection

@push('scripts')
    <script>
        let qty = 1;
        const productId = {{ $product['id'] }};
        const productName = '{{ addslashes($product['name']) }}';
        const productPrice = {{ $product['price'] }};
        const productImage = '{{ $product['image'] }}';

        function changeQty(delta) {
            qty = Math.max(1, Math.min(99, qty + delta));
            document.getElementById('qty-display').textContent = qty;
        }

        function addToCartWithQty() {
            let cart = JSON.parse(localStorage.getItem('bstore_cart') || '[]');
            const existing = cart.find(i => i.id === productId);
            if (existing) {
                existing.qty += qty;
            } else {
                cart.push({ id: productId, name: productName, price: productPrice, image: productImage, qty: qty });
            }
            localStorage.setItem('bstore_cart', JSON.stringify(cart));
            updateCartCount();
            showToast(productName + ' added to cart!');
        }

        function switchImage(src) {
            document.getElementById('main-product-img').src = src;
            document.querySelectorAll('.thumb-btn').forEach(btn => {
                btn.classList.toggle('border-yellow-400', btn.querySelector('img').src === src);
                btn.classList.toggle('border-transparent', btn.querySelector('img').src !== src);
            });
        }
    </script>
@endpush