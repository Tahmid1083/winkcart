<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Show cart page
    public function index()
    {
        $cartItems = $this->getCartItems();
        $total = 0;
        
        // Calculate total price
        foreach ($cartItems as $item) {
            $total += $item->product->getFinalPrice() * $item->quantity;
        }
        
        return view('cart.index', compact('cartItems', 'total'));
    }

    // Add product to cart
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity ?? 1;

        // Check if product is in stock
        if ($product->stock_quantity < $quantity) {
            return back()->with('error', 'Not enough stock available.');
        }

        // Check if item already exists in cart
        $existingItem = null;
        
        if (Auth::check()) {
            $existingItem = Cart::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->first();
        } else {
            $existingItem = Cart::where('session_id', Session::getId())
                ->where('product_id', $product->id)
                ->first();
        }

        if ($existingItem) {
            // Update quantity if item exists
            $existingItem->quantity += $quantity;
            $existingItem->save();
        } else {
            // Create new cart item
            Cart::create([
                'user_id' => Auth::check() ? Auth::id() : null,
                'session_id' => Auth::check() ? null : Session::getId(),
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        return back()->with('success', 'Product added to cart!');
    }

    // Update cart item quantity
    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return back()->with('success', 'Cart updated!');
    }

    // Remove item from cart
    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return back()->with('success', 'Item removed from cart!');
    }

    // Show checkout page
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to checkout.');
        }

        $cartItems = $this->getCartItems();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->product->getFinalPrice() * $item->quantity;
        }
        
        return view('cart.checkout', compact('cartItems', 'total'));
    }

    // Place order
    public function placeOrder(Request $request)
    {
        $cartItems = $this->getCartItems();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->product->getFinalPrice() * $item->quantity;
        }
        
        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'address' => $request->address,
            'status' => 'pending',
        ]);

        // Clear cart
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('order.success')->with('success', 'Order placed successfully!');
    }

    // Show order success page
    public function orderSuccess()
    {
        return view('cart.success');
    }

    // Helper function to get cart items
    private function getCartItems()
    {
        if (Auth::check()) {
            return Cart::with('product')->where('user_id', Auth::id())->get();
        } else {
            return Cart::with('product')->where('session_id', Session::getId())->get();
        }
    }
}