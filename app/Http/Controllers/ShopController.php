<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * All banana products data.
     */
    private function getProducts(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Cavendish Banana',
                'category' => 'Cavendish',
                'price' => 2.49,
                'old_price' => 3.99,
                'rating' => 5,
                'reviews' => 248,
                'badge' => 'Best Seller',
                'description' => 'The world\'s most popular banana. Creamy, sweet, and perfectly yellow. Our Cavendish bananas are harvested at peak ripeness and shipped fresh to your door. Ideal for smoothies, baking, or eating fresh.',
                'image' => 'https://images.unsplash.com/photo-1528825871115-3581a5387919?w=600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1528825871115-3581a5387919?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1481349518771-20055b2a7b24?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1587132137056-bfbf0166836e?w=600&auto=format&fit=crop&q=80',
                ],
                'nutrition' => [
                    ['label' => 'Calories', 'value' => '89 kcal'],
                    ['label' => 'Carbs', 'value' => '23g'],
                    ['label' => 'Protein', 'value' => '1.1g'],
                    ['label' => 'Fiber', 'value' => '2.6g'],
                ],
                'tags' => ['🌿 Organic', '🚫 Pesticide-Free', '💛 Ripe Ready', '🌍 Ecuador'],
            ],
            [
                'id' => 2,
                'name' => 'Red Banana',
                'category' => 'Red Banana',
                'price' => 4.99,
                'rating' => 5,
                'reviews' => 134,
                'badge' => 'Exotic',
                'description' => 'A rare tropical treat! Red bananas have a distinctive reddish-purple peel and a sweet, creamy flavor with hints of raspberry. They\'re softer and denser than Cavendish, packed with extra potassium and beta-carotene.',
                'image' => 'https://images.unsplash.com/photo-1547514701-42782101795e?w=600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1547514701-42782101795e?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1528825871115-3581a5387919?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1481349518771-20055b2a7b24?w=600&auto=format&fit=crop&q=80',
                ],
                'nutrition' => [
                    ['label' => 'Calories', 'value' => '95 kcal'],
                    ['label' => 'Carbs', 'value' => '25g'],
                    ['label' => 'Protein', 'value' => '1.3g'],
                    ['label' => 'Fiber', 'value' => '3.1g'],
                ],
                'tags' => ['🌺 Exotic', '🫐 Antioxidants', '💪 High Potassium', '🇵🇭 Philippines'],
            ],
            [
                'id' => 3,
                'name' => 'Baby Banana (Ladyfinger)',
                'category' => 'Baby Banana',
                'price' => 3.79,
                'rating' => 5,
                'reviews' => 89,
                'badge' => 'Kids Favorite',
                'description' => 'Small, sweet, and absolutely delightful — baby bananas (also called Ladyfinger or Sugar Banana) are the sweetest of all banana varieties. Perfect for kids\' snacks, desserts, and breakfast bowls.',
                'image' => 'https://images.unsplash.com/photo-1587132137056-bfbf0166836e?w=600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1587132137056-bfbf0166836e?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1528825871115-3581a5387919?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1547514701-42782101795e?w=600&auto=format&fit=crop&q=80',
                ],
                'nutrition' => [
                    ['label' => 'Calories', 'value' => '72 kcal'],
                    ['label' => 'Carbs', 'value' => '19g'],
                    ['label' => 'Protein', 'value' => '0.9g'],
                    ['label' => 'Fiber', 'value' => '2.0g'],
                ],
                'tags' => ['🧒 Kids Friendly', '🍰 Dessert Use', '🍯 Extra Sweet', '🌴 Thailand'],
            ],
            [
                'id' => 4,
                'name' => 'Green Plantain',
                'category' => 'Plantain',
                'price' => 1.99,
                'rating' => 4,
                'reviews' => 67,
                'description' => 'The cooking banana used across Latin America, Africa, and the Caribbean. Green plantains are starchy, firm, and perfect for frying (tostones), boiling, or baking. A versatile kitchen staple.',
                'image' => 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1481349518771-20055b2a7b24?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1528825871115-3581a5387919?w=600&auto=format&fit=crop&q=80',
                ],
                'nutrition' => [
                    ['label' => 'Calories', 'value' => '122 kcal'],
                    ['label' => 'Carbs', 'value' => '32g'],
                    ['label' => 'Protein', 'value' => '1.3g'],
                    ['label' => 'Fiber', 'value' => '2.3g'],
                ],
                'tags' => ['🍳 Cooking Banana', '🥘 Savory Use', '💪 High Starch', '🌍 Colombia'],
            ],
            [
                'id' => 5,
                'name' => 'Organic Cavendish Bundle (5 kg)',
                'category' => 'Cavendish',
                'price' => 9.99,
                'old_price' => 14.99,
                'rating' => 5,
                'reviews' => 312,
                'badge' => 'Bundle Deal',
                'description' => 'Stock up and save! Our 5 kg premium Cavendish bundle is perfect for families, smoothie lovers, and meal preppers. Sourced from certified organic farms, delivered to perfection.',
                'image' => 'https://images.unsplash.com/photo-1481349518771-20055b2a7b24?w=600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1481349518771-20055b2a7b24?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1528825871115-3581a5387919?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1587132137056-bfbf0166836e?w=600&auto=format&fit=crop&q=80',
                ],
                'nutrition' => [
                    ['label' => 'Calories', 'value' => '89 kcal'],
                    ['label' => 'Carbs', 'value' => '23g'],
                    ['label' => 'Protein', 'value' => '1.1g'],
                    ['label' => 'Fiber', 'value' => '2.6g'],
                ],
                'tags' => ['📦 5 kg Bundle', '💰 Best Value', '🌿 Certified Organic', '🌍 Ecuador'],
            ],
            [
                'id' => 6,
                'name' => 'Dried Banana Chips',
                'category' => 'Cavendish',
                'price' => 5.49,
                'rating' => 4,
                'reviews' => 176,
                'description' => 'Crispy, golden banana chips made from 100% natural Cavendish bananas. No added sugar, no artificial flavors — just pure banana goodness in every bite. Perfect as a healthy snack or trail mix ingredient.',
                'image' => 'https://images.unsplash.com/photo-1522184961-0e2da175fe5e?w=600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1522184961-0e2da175fe5e?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1528825871115-3581a5387919?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1481349518771-20055b2a7b24?w=600&auto=format&fit=crop&q=80',
                ],
                'nutrition' => [
                    ['label' => 'Calories', 'value' => '519 kcal'],
                    ['label' => 'Carbs', 'value' => '58g'],
                    ['label' => 'Protein', 'value' => '2.3g'],
                    ['label' => 'Fiber', 'value' => '7.7g'],
                ],
                'tags' => ['🥐 Snack Ready', '🚫 No Sugar Added', '🌾 Gluten Free', '✈️ Travel Friendly'],
            ],
            [
                'id' => 7,
                'name' => 'Ripe Plantain (Maduros)',
                'category' => 'Plantain',
                'price' => 2.49,
                'rating' => 4,
                'reviews' => 54,
                'description' => 'Perfectly ripe yellow-black plantains ready for sweet frying (maduros). Naturally caramelized sugars give them an irresistible sweetness. Popular across Caribbean and Latin American cuisine.',
                'image' => 'https://images.unsplash.com/photo-1604665515146-13129defef05?w=600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1604665515146-13129defef05?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1528825871115-3581a5387919?w=600&auto=format&fit=crop&q=80',
                ],
                'nutrition' => [
                    ['label' => 'Calories', 'value' => '139 kcal'],
                    ['label' => 'Carbs', 'value' => '36g'],
                    ['label' => 'Protein', 'value' => '1.2g'],
                    ['label' => 'Fiber', 'value' => '2.3g'],
                ],
                'tags' => ['🍬 Sweet', '🍳 Fry Ready', '🌊 Caribbean', '🌡️ Ripe'],
            ],
            [
                'id' => 8,
                'name' => 'Variety Pack (4 Types)',
                'category' => 'Baby Banana',
                'price' => 12.99,
                'old_price' => 16.99,
                'rating' => 5,
                'reviews' => 203,
                'badge' => 'New',
                'description' => 'Can\'t decide? Get them all! Our Variety Pack includes Cavendish, Red Banana, Baby Banana, and Plantain — a complete banana experience. Perfect for discovering your new favorite or gifting to a banana lover.',
                'image' => 'https://images.unsplash.com/photo-1566393028355-1b5c24a81db4?w=600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1566393028355-1b5c24a81db4?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1528825871115-3581a5387919?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1547514701-42782101795e?w=600&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1587132137056-bfbf0166836e?w=600&auto=format&fit=crop&q=80',
                ],
                'nutrition' => [
                    ['label' => 'Calories', 'value' => '~90 kcal'],
                    ['label' => 'Carbs', 'value' => '~24g'],
                    ['label' => 'Protein', 'value' => '~1.2g'],
                    ['label' => 'Fiber', 'value' => '~2.5g'],
                ],
                'tags' => ['🎁 Gift Idea', '🌈 4 Varieties', '💫 Fan Favorite', '🌍 Multiple Origins'],
            ],
        ];
    }

    /**
     * Home page.
     */
    public function home()
    {
        $products = $this->getProducts();
        $featuredProducts = array_slice($products, 0, 4);

        return view('home', compact('featuredProducts'));
    }

    /**
     * Shop page.
     */
    public function shop(Request $request)
    {
        $products = $this->getProducts();

        // Category counts
        $categoryCounts = [];
        foreach ($products as $product) {
            $cat = $product['category'];
            $categoryCounts[$cat] = ($categoryCounts[$cat] ?? 0) + 1;
        }

        $categories = [];
        foreach ($categoryCounts as $name => $count) {
            $categories[] = ['name' => $name, 'count' => $count];
        }

        return view('shop', compact('products', 'categories'));
    }

    /**
     * Product detail page.
     */
    public function product(int $id)
    {
        $products = $this->getProducts();
        $product = collect($products)->firstWhere('id', $id);

        if (!$product) {
            abort(404);
        }

        // Related products (same category, excluding current)
        $relatedProducts = collect($products)
            ->where('category', $product['category'])
            ->where('id', '!=', $id)
            ->take(4)
            ->values()
            ->toArray();

        // Fill with other products if not enough
        if (count($relatedProducts) < 4) {
            $others = collect($products)
                ->where('id', '!=', $id)
                ->whereNotIn('id', collect($relatedProducts)->pluck('id')->toArray())
                ->take(4 - count($relatedProducts))
                ->values()
                ->toArray();
            $relatedProducts = array_merge($relatedProducts, $others);
        }

        return view('product', compact('product', 'relatedProducts'));
    }

    /**
     * Cart page.
     */
    public function cart()
    {
        return view('cart');
    }
}
