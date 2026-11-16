<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // Electronics
            [
                'name' => 'iPhone 15 Pro Max',
                'description' => 'The most advanced iPhone yet with titanium design, A17 Pro chip, and pro camera system. Experience the power of Apple intelligence.',
                'price' => 1199.00,
                'sale_price' => 1099.00,
                'category' => 'Electronics',
                'stock_quantity' => 50,
                'image' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'MacBook Air M3',
                'description' => 'Supercharged by the M3 chip, the redesigned MacBook Air is incredibly thin and light with all-day battery life.',
                'price' => 1299.00,
                'sale_price' => 1199.00,
                'category' => 'Electronics',
                'stock_quantity' => 30,
                'image' => 'https://images.unsplash.com/photo-1541807084-5c52b6b3adef?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Galaxy AI is here. The most advanced Galaxy S series smartphone with S Pen and titanium build.',
                'price' => 1299.99,
                'sale_price' => null,
                'category' => 'Electronics',
                'stock_quantity' => 25,
                'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'Sony WH-1000XM5 Headphones',
                'description' => 'Industry-leading noise canceling headphones with premium sound quality and 30-hour battery life.',
                'price' => 399.99,
                'sale_price' => 299.99,
                'category' => 'Electronics',
                'stock_quantity' => 100,
                'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'iPad Pro 12.9 inch',
                'description' => 'The ultimate iPad experience with M2 chip, stunning Liquid Retina XDR display, and Apple Pencil support.',
                'price' => 1099.00,
                'sale_price' => 999.00,
                'category' => 'Electronics',
                'stock_quantity' => 40,
                'image' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=500&h=500&fit=crop'
            ],

            // Fashion
            [
                'name' => 'Nike Air Force 1 \'07',
                'description' => 'The classic basketball shoe that never goes out of style. Premium leather upper with Air-Sole unit for cushioning.',
                'price' => 110.00,
                'sale_price' => 89.99,
                'category' => 'Fashion',
                'stock_quantity' => 200,
                'image' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'Levi\'s 501 Original Jeans',
                'description' => 'The original blue jean since 1873. Straight fit with button fly closure and classic 5-pocket styling.',
                'price' => 89.50,
                'sale_price' => null,
                'category' => 'Fashion',
                'stock_quantity' => 150,
                'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'Adidas Ultraboost 23',
                'description' => 'The most responsive Ultraboost yet. Energy-returning BOOST midsole and Primeknit upper for ultimate comfort.',
                'price' => 190.00,
                'sale_price' => 152.00,
                'category' => 'Fashion',
                'stock_quantity' => 80,
                'image' => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'Uniqlo Heattech Crew Neck T-Shirt',
                'description' => 'Revolutionary fabric technology that retains heat and provides incredible warmth and comfort.',
                'price' => 14.90,
                'sale_price' => 9.90,
                'category' => 'Fashion',
                'stock_quantity' => 300,
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=500&h=500&fit=crop'
            ],

            // Home & Garden
            [
                'name' => 'KitchenAid Stand Mixer',
                'description' => 'Professional 5-quart bowl-lift stand mixer with 10 speeds and multiple attachments included.',
                'price' => 449.99,
                'sale_price' => 379.99,
                'category' => 'Home & Garden',
                'stock_quantity' => 40,
                'image' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'Dyson V15 Detect Vacuum',
                'description' => 'The most powerful, intelligent cordless vacuum. Laser reveals microscopic dust and scientific proof of a deep clean.',
                'price' => 749.99,
                'sale_price' => 649.99,
                'category' => 'Home & Garden',
                'stock_quantity' => 35,
                'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'IKEA HEMNES Dresser',
                'description' => '8-drawer dresser in white stain. Solid wood construction with smooth-running drawers and classic design.',
                'price' => 279.00,
                'sale_price' => 229.00,
                'category' => 'Home & Garden',
                'stock_quantity' => 25,
                'image' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=500&h=500&fit=crop'
            ],

            // Sports
            [
                'name' => 'Hydro Flask Water Bottle 32oz',
                'description' => '32 oz stainless steel water bottle with TempShield insulation. Keeps drinks cold for 24 hours, hot for 12 hours.',
                'price' => 44.95,
                'sale_price' => null,
                'category' => 'Sports',
                'stock_quantity' => 300,
                'image' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'Lululemon Yoga Mat',
                'description' => 'The Reversible Mat 5mm. Natural rubber with superior grip and cushioning, perfect for all yoga styles.',
                'price' => 88.00,
                'sale_price' => 68.00,
                'category' => 'Sports',
                'stock_quantity' => 120,
                'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'Nike Dri-FIT Running Shorts',
                'description' => 'Lightweight running shorts with sweat-wicking technology and built-in brief for comfort and support.',
                'price' => 35.00,
                'sale_price' => 25.00,
                'category' => 'Sports',
                'stock_quantity' => 150,
                'image' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=500&h=500&fit=crop'
            ],

            // Books
            [
                'name' => 'Atomic Habits by James Clear',
                'description' => 'An Easy & Proven Way to Build Good Habits & Break Bad Ones. The #1 New York Times bestseller.',
                'price' => 18.00,
                'sale_price' => 13.99,
                'category' => 'Books',
                'stock_quantity' => 200,
                'image' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'The Psychology of Programming',
                'description' => 'A classic book on software development and the human factors in programming. Essential reading for developers.',
                'price' => 39.99,
                'sale_price' => null,
                'category' => 'Books',
                'stock_quantity' => 75,
                'image' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'Clean Code by Robert Martin',
                'description' => 'A Handbook of Agile Software Craftsmanship. Learn to write code that is clean, readable, and maintainable.',
                'price' => 42.99,
                'sale_price' => 32.99,
                'category' => 'Books',
                'stock_quantity' => 90,
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&h=500&fit=crop'
            ],

            // Beauty
            [
                'name' => 'Fenty Beauty Pro Filtr Foundation',
                'description' => 'Soft Matte Longwear Foundation with buildable coverage. Available in 50 diverse shades for all skin tones.',
                'price' => 40.00,
                'sale_price' => null,
                'category' => 'Beauty',
                'stock_quantity' => 180,
                'image' => 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'The Ordinary Niacinamide 10%',
                'description' => 'High-strength vitamin and zinc serum for reducing appearance of blemishes and congestion. Dermatologist-tested.',
                'price' => 6.90,
                'sale_price' => null,
                'category' => 'Beauty',
                'stock_quantity' => 500,
                'image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=500&h=500&fit=crop'
            ],
            [
                'name' => 'CeraVe Hydrating Facial Cleanser',
                'description' => 'Daily face wash for normal to dry skin with 3 essential ceramides, hyaluronic acid, and vitamin B5.',
                'price' => 15.99,
                'sale_price' => 12.99,
                'category' => 'Beauty',
                'stock_quantity' => 250,
                'image' => 'https://images.unsplash.com/photo-1571781926291-c477ebfd024b?w=500&h=500&fit=crop'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}