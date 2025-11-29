<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $cart = $user->cart;
        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id]);
        }
        
        $cart->load('products');
        
        $subtotal = 0;
        $totalItems = 0;
        
        foreach ($cart->products as $product) {
            $subtotal += $product->price * $product->pivot->quantity;
            $totalItems += $product->pivot->quantity;
        }
        
        $shipping = 5.99;
        $total = $subtotal + $shipping;
        
        return view('cart', [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'totalItems' => $totalItems,
            'shipping' => $shipping,
            'total' => $total,
        ]);
    }
    
    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity', 1);
        $user = Auth::user();
        
        $cart = $user->cart;
        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id]);
        }
        
        $productInCart = $cart->products()->where('product_id', $product->id)->first();
        
        if ($productInCart) {
            $currentQuantity = $productInCart->pivot->quantity;
            $newQuantity = $currentQuantity + $quantity;
            
            $cart->products()->updateExistingPivot($product->id, [
                'quantity' => $newQuantity
            ]);
        } else {
            $cart->products()->attach($product->id, ['quantity' => $quantity]);
        }
        
        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }

    public function destroy(Request $request, $id){
        $product = Product::findOrFail($id);
        $user = Auth::user();
        
        $cart = $user->cart;
        if (!$cart) {
            return redirect()->route('cart')->with('error', 'Cart not found!');
        }
        
        $productInCart = $cart->products()->where('product_id', $product->id)->first();
        if (!$productInCart) {
            return redirect()->route('cart')->with('error', 'Product not in cart!');
        }
        
        $cart->products()->detach($product->id);
        
        return redirect()->route('cart')->with('success', 'Product removed from cart!');
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:99', 'gte:1'],
        ], [
            'quantity.min' => 'Quantity must be at least 1.',
            'quantity.max' => 'Quantity cannot exceed 99.',
            'quantity.gte' => 'Quantity must be greater than or equal to 1.',
        ]);
        
        $product = Product::findOrFail($id);
        $user = Auth::user();
        
        $cart = $user->cart;
        if (!$cart) {
            return redirect()->route('cart')->with('error', 'Cart not found!');
        }
        
        $productInCart = $cart->products()->where('product_id', $product->id)->first();
        if (!$productInCart) {
            return redirect()->route('cart')->with('error', 'Product not in cart!');
        }
        
        $quantity = (int) $validated['quantity'];
        if ($quantity < 1 || $quantity > 99) {
            return redirect()->route('cart')->with('error', 'Invalid quantity! Quantity must be between 1 and 99.');
        }
        
        $cart->products()->updateExistingPivot($product->id, [
            'quantity' => $quantity
        ]);
        
        return redirect()->route('cart')->with('success', 'Quantity updated successfully!');
    }
}
