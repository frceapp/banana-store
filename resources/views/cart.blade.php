@extends('layouts.app')

@section('title', 'Your Cart — b-store')
@section('meta_description', 'Review your cart and checkout for fresh bananas delivered to your door.')

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- Heading -->
        <div class="mb-10">
            <span class="text-yellow-400 text-xs font-bold uppercase tracking-widest mb-2 block">Your Selection</span>
            <h1 class="text-4xl md:text-5xl font-black tracking-tight">Shopping <span class="text-gradient">Cart</span></h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- ======== CART ITEMS ======== --}}
            <div class="lg:col-span-2 space-y-4" id="cart-items-container">

                <!-- Empty State -->
                <div id="empty-cart" class="hidden text-center py-24 card-glass rounded-3xl">
                    <div class="text-7xl mb-4 animate-float inline-block">🍌</div>
                    <h2 class="text-2xl font-black text-white mb-2">Your Cart is Empty</h2>
                    <p class="text-neutral-400 mb-8">Looks like you haven't added any bananas yet!</p>
                    <a href="{{ route('shop') }}" class="btn-primary">Browse Products</a>
                </div>

                <!-- Cart Items (rendered by JS) -->
                <div id="cart-items-list" class="space-y-4"></div>

                <!-- Continue shopping -->
                <a href="{{ route('shop') }}"
                    class="inline-flex items-center gap-2 text-sm text-neutral-400 hover:text-yellow-400 transition-colors mt-4">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Continue Shopping
                </a>
            </div>

            {{-- ======== ORDER SUMMARY ======== --}}
            <div id="order-summary" class="space-y-4">

                <!-- Promo Code -->
                <div class="card-glass rounded-2xl p-5">
                    <h3 class="font-bold text-white text-sm mb-3">Promo Code</h3>
                    <div class="flex gap-2">
                        <input type="text" id="promo-input" placeholder="BANANA20"
                            class="input-field flex-1 text-sm py-2.5">
                        <button onclick="applyPromo()"
                            class="px-4 py-2.5 bg-yellow-400/10 border border-yellow-400/20 text-yellow-400 text-sm font-bold rounded-xl hover:bg-yellow-400/20 transition-all duration-200">Apply</button>
                    </div>
                    <p id="promo-msg" class="text-xs mt-2 text-neutral-500"></p>
                </div>

                <!-- Summary Card -->
                <div class="card-glass rounded-2xl p-5 space-y-4">
                    <h3 class="font-bold text-white">Order Summary</h3>

                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between text-neutral-400">
                            <span>Subtotal</span>
                            <span id="subtotal-display" class="text-white font-semibold">$0.00</span>
                        </div>
                        <div class="flex justify-between text-neutral-400">
                            <span>Discount</span>
                            <span id="discount-display" class="text-green-400 font-semibold">-$0.00</span>
                        </div>
                        <div class="flex justify-between text-neutral-400">
                            <span>Shipping</span>
                            <span id="shipping-display" class="text-white font-semibold">$3.99</span>
                        </div>
                        <div class="border-t border-white/10 pt-3 flex justify-between">
                            <span class="font-bold text-white">Total</span>
                            <span id="total-display" class="text-yellow-400 font-black text-xl">$0.00</span>
                        </div>
                    </div>

                    <button onclick="handleCheckout()" class="btn-primary w-full py-4 text-base" id="checkout-btn">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Proceed to Checkout
                    </button>

                    <div class="flex items-center justify-center gap-2 text-xs text-neutral-500">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Secure SSL Checkout
                    </div>
                </div>

                <!-- Payment Icons -->
                <div class="card-glass rounded-2xl p-5">
                    <p class="text-xs text-neutral-500 text-center mb-3">We accept</p>
                    <div class="flex items-center justify-center gap-3">
                        @php
                            $paymentMethods = [
                                ['label' => 'Visa', 'bg' => 'from-blue-600 to-blue-800', 'text' => 'VISA'],
                                ['label' => 'Mastercard', 'bg' => 'from-orange-500 to-red-600', 'text' => 'MC'],
                                ['label' => 'PayPal', 'bg' => 'from-blue-400 to-blue-600', 'text' => 'PP'],
                                ['label' => 'Apple Pay', 'bg' => 'from-neutral-600 to-neutral-800', 'text' => ''],
                                ['label' => 'Google Pay', 'bg' => 'from-neutral-600 to-neutral-800', 'text' => 'G'],
                            ];
                        @endphp
                        @foreach($paymentMethods as $method)
                            <div class="w-12 h-7 bg-gradient-to-br {{ $method['bg'] }} rounded-md flex items-center justify-center"
                                title="{{ $method['label'] }}">
                                @if($method['label'] === 'Apple Pay')
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z" />
                                    </svg>
                                @else
                                    <span class="text-white text-xs font-black">{{ $method['text'] }}</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Delivery info -->
                <div class="card-glass rounded-2xl p-5 space-y-3">
                    <div class="flex items-center gap-3 text-sm text-neutral-300">
                        <svg class="w-5 h-5 text-yellow-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>100% Freshness Guarantee</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm text-neutral-300">
                        <svg class="w-5 h-5 text-yellow-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                        <span>Free returns within 24h</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm text-neutral-300">
                        <svg class="w-5 h-5 text-yellow-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Delivered within 24–48 hours</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout Success Modal -->
    <div id="checkout-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
        <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" onclick="closeModal()"></div>
        <div class="relative card-glass rounded-3xl p-8 max-w-md w-full text-center">
            <div class="text-6xl mb-4 animate-float inline-block">🎉</div>
            <h2 class="text-2xl font-black text-white mb-2">Order Placed!</h2>
            <p class="text-neutral-400 mb-6">Your bananas are on their way! You'll receive a confirmation email shortly.</p>
            <div class="bg-yellow-400/10 border border-yellow-400/20 rounded-2xl px-5 py-4 mb-6">
                <div class="text-xs text-neutral-400 mb-1">Order Total</div>
                <div id="modal-total" class="text-2xl font-black text-yellow-400">$0.00</div>
            </div>
            <a href="{{ route('shop') }}" onclick="closeModal()" class="btn-primary w-full py-3.5">
                Continue Shopping
            </a>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        let discount = 0;

        function renderCart() {
            const cart = JSON.parse(localStorage.getItem('bstore_cart') || '[]');
            const container = document.getElementById('cart-items-list');
            const empty = document.getElementById('empty-cart');
            const summary = document.getElementById('order-summary');

            if (cart.length === 0) {
                empty.classList.remove('hidden');
                container.innerHTML = '';
                summary.classList.add('opacity-50', 'pointer-events-none');
                updateSummary(cart);
                return;
            }

            empty.classList.add('hidden');
            summary.classList.remove('opacity-50', 'pointer-events-none');

            container.innerHTML = cart.map(item => `
                <div class="card-glass rounded-2xl p-4 flex gap-4 hover:border-yellow-400/20 transition-all duration-200" data-id="${item.id}">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-xl overflow-hidden shrink-0">
                        <img src="${item.image}" alt="${item.name}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-2">
                            <div>
                                <h3 class="font-bold text-white text-sm truncate">${item.name}</h3>
                                <p class="text-neutral-500 text-xs mt-0.5">$${parseFloat(item.price).toFixed(2)} / kg</p>
                            </div>
                            <button onclick="removeFromCart(${item.id})" class="text-neutral-600 hover:text-red-400 transition-colors shrink-0">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="flex items-center justify-between mt-3">
                            <div class="flex items-center gap-2 bg-white/5 border border-white/10 rounded-xl px-1">
                                <button onclick="updateQty(${item.id}, -1)" class="w-7 h-7 flex items-center justify-center text-neutral-400 hover:text-yellow-400 transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/></svg>
                                </button>
                                <span class="w-6 text-center text-sm font-bold text-white">${item.qty}</span>
                                <button onclick="updateQty(${item.id}, 1)" class="w-7 h-7 flex items-center justify-center text-neutral-400 hover:text-yellow-400 transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                </button>
                            </div>
                            <span class="text-yellow-400 font-black">\$${(item.price * item.qty).toFixed(2)}</span>
                        </div>
                    </div>
                </div>
            `).join('');

            updateSummary(cart);
        }

        function updateSummary(cart) {
            const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
            const FREE_SHIPPING_THRESHOLD = 25;
            const shipping = subtotal > FREE_SHIPPING_THRESHOLD ? 0 : 3.99;
            const discountAmt = subtotal * discount;
            const total = subtotal - discountAmt + shipping;

            document.getElementById('subtotal-display').textContent = '$' + subtotal.toFixed(2);
            document.getElementById('discount-display').textContent = '-$' + discountAmt.toFixed(2);
            document.getElementById('shipping-display').textContent = shipping === 0 ? 'FREE 🎉' : '$' + shipping.toFixed(2);
            document.getElementById('total-display').textContent = '$' + total.toFixed(2);
        }

        function updateQty(id, delta) {
            let cart = JSON.parse(localStorage.getItem('bstore_cart') || '[]');
            const item = cart.find(i => i.id === id);
            if (item) {
                item.qty = Math.max(1, item.qty + delta);
            }
            localStorage.setItem('bstore_cart', JSON.stringify(cart));
            updateCartCount();
            renderCart();
        }

        function removeFromCart(id) {
            let cart = JSON.parse(localStorage.getItem('bstore_cart') || '[]');
            cart = cart.filter(i => i.id !== id);
            localStorage.setItem('bstore_cart', JSON.stringify(cart));
            updateCartCount();
            renderCart();
            showToast('Item removed from cart');
        }

        function applyPromo() {
            const code = document.getElementById('promo-input').value.trim().toUpperCase();
            const msg = document.getElementById('promo-msg');
            if (code === 'BANANA20') {
                discount = 0.20;
                msg.textContent = '✓ 20% discount applied!';
                msg.className = 'text-xs mt-2 text-green-400 font-semibold';
                showToast('Promo code applied! 20% off 🎉');
            } else if (code === 'FRESH10') {
                discount = 0.10;
                msg.textContent = '✓ 10% discount applied!';
                msg.className = 'text-xs mt-2 text-green-400 font-semibold';
                showToast('Promo code applied! 10% off 🎉');
            } else {
                discount = 0;
                msg.textContent = '✗ Invalid promo code';
                msg.className = 'text-xs mt-2 text-red-400';
            }
            const cart = JSON.parse(localStorage.getItem('bstore_cart') || '[]');
            updateSummary(cart);
        }

        function handleCheckout() {
            const cart = JSON.parse(localStorage.getItem('bstore_cart') || '[]');
            if (cart.length === 0) {
                showToast('Your cart is empty!');
                return;
            }
            const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
            const shipping = subtotal > 25 ? 0 : 3.99;
            const discountAmt = subtotal * discount;
            const total = subtotal - discountAmt + shipping;

            document.getElementById('modal-total').textContent = '$' + total.toFixed(2);
            document.getElementById('checkout-modal').classList.remove('hidden');

            // Clear cart
            localStorage.removeItem('bstore_cart');
            updateCartCount();
        }

        function closeModal() {
            document.getElementById('checkout-modal').classList.add('hidden');
            renderCart();
        }

        // Init
        renderCart();
    </script>
@endpush