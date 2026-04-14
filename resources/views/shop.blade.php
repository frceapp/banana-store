@extends('layouts.app')

@section('title', 'Shop All Bananas — b-store')
@section('meta_description', 'Browse all our premium banana varieties. Cavendish, Red Banana, Baby Banana, Plantain and more. Filter by type and price.')

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- Page Header -->
        <div class="mb-10">
            <span class="text-yellow-400 text-xs font-bold uppercase tracking-widest mb-2 block">Our Selection</span>
            <h1 class="text-4xl md:text-5xl font-black tracking-tight">
                Fresh <span class="text-gradient">Bananas</span>
            </h1>
            <p class="text-neutral-400 mt-2">{{ count($products) }} products available</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">

            {{-- ======= SIDEBAR FILTERS ======= --}}
            <aside class="w-full lg:w-64 shrink-0">
                <div class="sticky top-24 space-y-6">

                    <!-- Mobile filter toggle -->
                    <button id="filter-toggle"
                        class="lg:hidden w-full flex items-center justify-between px-4 py-3 card-glass rounded-xl text-sm font-semibold">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z" />
                            </svg>
                            Filters
                        </span>
                        <svg id="filter-arrow" class="w-4 h-4 transition-transform duration-200" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="filter-panel" class="hidden lg:block space-y-6">

                        <!-- Category Filter -->
                        <div class="card-glass p-5 rounded-2xl">
                            <h3 class="font-bold text-white text-sm mb-4">Category</h3>
                            <div class="space-y-2" id="category-filters">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="category" value="all" class="accent-yellow-400" checked
                                        onchange="filterProducts()">
                                    <span class="text-sm text-neutral-300 group-hover:text-white transition-colors">All
                                        Bananas</span>
                                    <span class="ml-auto text-xs text-neutral-500">{{ count($products) }}</span>
                                </label>
                                @foreach($categories as $cat)
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="radio" name="category" value="{{ $cat['name'] }}" class="accent-yellow-400"
                                            {{ request('category') == $cat['name'] ? 'checked' : '' }}
                                            onchange="filterProducts()">
                                        <span
                                            class="text-sm text-neutral-300 group-hover:text-white transition-colors">{{ $cat['name'] }}</span>
                                        <span class="ml-auto text-xs text-neutral-500">{{ $cat['count'] }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="card-glass p-5 rounded-2xl">
                            <h3 class="font-bold text-white text-sm mb-4">Price Range</h3>
                            <div class="space-y-3">
                                <input type="range" id="price-range" min="0" max="20" value="20" step="0.5"
                                    class="w-full accent-yellow-400 cursor-pointer" oninput="updatePriceRange(this.value)">
                                <div class="flex justify-between text-xs text-neutral-400">
                                    <span>$0</span>
                                    <span id="price-label" class="text-yellow-400 font-bold">Up to $20.00</span>
                                    <span>$20</span>
                                </div>
                            </div>
                        </div>

                        <!-- Sort -->
                        <div class="card-glass p-5 rounded-2xl">
                            <h3 class="font-bold text-white text-sm mb-4">Sort By</h3>
                            <select id="sort-select" onchange="filterProducts()" class="input-field text-sm">
                                <option value="default">Default</option>
                                <option value="price-asc">Price: Low to High</option>
                                <option value="price-desc">Price: High to Low</option>
                                <option value="rating">Top Rated</option>
                                <option value="name">Name A-Z</option>
                            </select>
                        </div>

                        <!-- Reset -->
                        <button onclick="resetFilters()"
                            class="w-full py-2.5 text-sm text-neutral-400 hover:text-yellow-400 border border-white/10 rounded-xl hover:border-yellow-400/30 transition-all duration-200">
                            Reset Filters
                        </button>
                    </div>
                </div>
            </aside>

            {{-- ======= PRODUCTS GRID ======= --}}
            <div class="flex-1">
                <!-- Sort bar (mobile) -->
                <div class="flex items-center justify-between mb-6">
                    <p id="results-count" class="text-sm text-neutral-400">Showing <span
                            class="text-white font-semibold">{{ count($products) }}</span> products</p>
                    <div class="flex items-center gap-2">
                        <button onclick="setGridView('grid')" id="btn-grid"
                            class="p-2 rounded-lg bg-white/5 hover:bg-white/10 text-yellow-400 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 8a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zm6-8a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2h-2zm0 8a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2h-2z" />
                            </svg>
                        </button>
                        <button onclick="setGridView('list')" id="btn-list"
                            class="p-2 rounded-lg bg-white/5 hover:bg-white/10 text-neutral-400 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Products Container -->
                <div id="products-grid" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="product-card" data-category="{{ $product['category'] }}"
                            data-price="{{ $product['price'] }}" data-rating="{{ $product['rating'] }}"
                            data-name="{{ $product['name'] }}">
                            <!-- Image -->
                            <div class="relative overflow-hidden aspect-square bg-neutral-900">
                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy">
                                @if(isset($product['badge']))
                                    <span
                                        class="absolute top-3 left-3 badge bg-yellow-400 text-neutral-900">{{ $product['badge'] }}</span>
                                @endif
                                @if(isset($product['old_price']))
                                    <span class="absolute top-3 right-3 badge bg-red-500 text-white">
                                        -{{ round((($product['old_price'] - $product['price']) / $product['old_price']) * 100) }}%
                                    </span>
                                @endif
                                <div
                                    class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <button
                                        onclick="addToCart({{ $product['id'] }}, '{{ addslashes($product['name']) }}', {{ $product['price'] }}, '{{ $product['image'] }}')"
                                        class="btn-primary text-sm py-2.5 px-5 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                            <!-- Info -->
                            <div class="p-4">
                                <div class="text-xs text-neutral-500 mb-1">{{ $product['category'] }}</div>
                                <h2 class="font-bold text-white text-sm mb-1">{{ $product['name'] }}</h2>
                                <p class="text-neutral-500 text-xs mb-3 line-clamp-2">{{ $product['description'] }}</p>
                                <div class="flex items-center gap-1 mb-3">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-3 h-3 {{ $i < $product['rating'] ? 'text-yellow-400' : 'text-neutral-700' }}"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                    <span class="text-neutral-500 text-xs ml-1">({{ $product['reviews'] }})</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-baseline gap-2">
                                        <span
                                            class="text-yellow-400 font-black text-lg">${{ number_format($product['price'], 2) }}</span>
                                        @if(isset($product['old_price']))
                                            <span
                                                class="text-neutral-600 text-xs line-through">${{ number_format($product['old_price'], 2) }}</span>
                                        @endif
                                        <span class="text-neutral-500 text-xs">/kg</span>
                                    </div>
                                    <a href="{{ route('product', $product['id']) }}"
                                        class="text-xs text-neutral-400 hover:text-yellow-400 transition-colors font-medium">Details
                                        →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- No results -->
                <div id="no-results" class="hidden text-center py-20">
                    <div class="text-5xl mb-4">🍌</div>
                    <h3 class="text-xl font-bold text-white mb-2">No bananas found</h3>
                    <p class="text-neutral-400 text-sm mb-6">Try adjusting your filters</p>
                    <button onclick="resetFilters()" class="btn-outline text-sm">Clear Filters</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        let currentGridView = 'grid';
        let maxPrice = 20;

        function updatePriceRange(val) {
            document.getElementById('price-label').textContent = 'Up to $' + parseFloat(val).toFixed(2);
            maxPrice = parseFloat(val);
            filterProducts();
        }

        function filterProducts() {
            const category = document.querySelector('input[name="category"]:checked')?.value || 'all';
            const sort = document.getElementById('sort-select').value;
            const cards = Array.from(document.querySelectorAll('#products-grid .product-card'));

            let visible = 0;
            cards.forEach(card => {
                const cat = card.dataset.category;
                const price = parseFloat(card.dataset.price);
                const categoryMatch = category === 'all' || cat === category;
                const priceMatch = price <= maxPrice;
                const show = categoryMatch && priceMatch;
                card.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            // Sort visible cards
            const grid = document.getElementById('products-grid');
            const visibleCards = cards.filter(c => c.style.display !== 'none');
            visibleCards.sort((a, b) => {
                if (sort === 'price-asc') return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                if (sort === 'price-desc') return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                if (sort === 'rating') return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
                if (sort === 'name') return a.dataset.name.localeCompare(b.dataset.name);
                return 0;
            });
            visibleCards.forEach(c => grid.appendChild(c));

            document.getElementById('results-count').innerHTML = 'Showing <span class="text-white font-semibold">' + visible + '</span> products';
            document.getElementById('no-results').classList.toggle('hidden', visible > 0);
        }

        function resetFilters() {
            document.querySelector('input[name="category"][value="all"]').checked = true;
            document.getElementById('price-range').value = 20;
            document.getElementById('sort-select').value = 'default';
            maxPrice = 20;
            document.getElementById('price-label').textContent = 'Up to $20.00';
            filterProducts();
        }

        function setGridView(view) {
            currentGridView = view;
            const grid = document.getElementById('products-grid');
            const btnGrid = document.getElementById('btn-grid');
            const btnList = document.getElementById('btn-list');
            if (view === 'grid') {
                grid.className = 'grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6';
                btnGrid.classList.add('text-yellow-400');
                btnGrid.classList.remove('text-neutral-400');
                btnList.classList.add('text-neutral-400');
                btnList.classList.remove('text-yellow-400');
            } else {
                grid.className = 'grid grid-cols-1 gap-4';
                btnList.classList.add('text-yellow-400');
                btnList.classList.remove('text-neutral-400');
                btnGrid.classList.add('text-neutral-400');
                btnGrid.classList.remove('text-yellow-400');
            }
        }

        // Mobile filter toggle
        const filterToggle = document.getElementById('filter-toggle');
        const filterPanel = document.getElementById('filter-panel');
        const filterArrow = document.getElementById('filter-arrow');
        filterToggle?.addEventListener('click', () => {
            filterPanel.classList.toggle('hidden');
            filterArrow.style.transform = filterPanel.classList.contains('hidden') ? '' : 'rotate(180deg)';
        });
    </script>
@endpush