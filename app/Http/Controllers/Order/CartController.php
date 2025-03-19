<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CartController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $cart = Cart::where('user_id', $user->id)->get();
        $cartItems = collect();

        foreach ($cart as $c) {
            $cartItems->push($c->items);
        }

        return view('cart.index', compact('cartItems'));
    }

    public function create(Request $request, $productId)
    {
        $product = Product::find($productId);

        $request->validate([
            'cart_stock' => 'required|integer|min:0',
        ]);

        $errorMessage = $this->validateCart($request, $product);

        if ($errorMessage) {
            return redirect()->route('product.detail', ['product' => $product])->with('error', $errorMessage);
        }
        else {
            $this->storeCart($request, $productId);
            return redirect()->route('product.detail', ['product' => $product])->with('success', 'Berhasil menambahkan barang ke keranjang.');
        }
    }

    public function update(Request $request, $cartItemId)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $cartItem = CartItem::findOrFail($cartItemId);

        $cartItem->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.index')->with('success', 'Jumlah barang berhasil diupdate.');
    }

    protected function validateCart(Request $request, Product $product): ?string
    {
        return $this->checkCondition($product->stock_available < $request->cart_stock, 'Stok produk tidak mencukupi') ?? null;
    }

    protected function checkCondition(bool $condition, string $message): ?string
    {
        return $condition ? $message : null;
    }

    protected function storeCart($request, $productId) : void {
        $cart = Cart::where('user_id', auth()->id())->first();
        if ($cart) {
            $cartItem = CartItem::where('cart_id', $cart->cart_id)->where('product_id', $productId)->first();
            if ($cartItem) {
                $cartItem->quantity += $request->cart_stock;
                $cartItem->save();
            }
            else {
                $cartItem = new CartItem();
                $cartItem->cart_item_id = Str::uuid();
                $cartItem->cart_id = $cart->cart_id;
                $cartItem->product_id = $productId;
                $cartItem->quantity = $request->cart_stock;
                $cartItem->created_by = auth()->user()->name;
                $cartItem->created_date = now();
                $cartItem->save();
            }
        }
        else {
            $cart = new Cart();
            $cart->cart_id = Str::uuid();
            $cart->user_id = auth()->id();
            $cart->created_by = auth()->user()->name;
            $cart->created_date = now();
            $cart->save();

            $cartItem = new CartItem();
            $cartItem->cart_item_id = Str::uuid();
            $cartItem->cart_id = $cart->cart_id;
            $cartItem->product_id = $productId;
            $cartItem->quantity = $request->cart_stock;
            $cartItem->created_by = auth()->user()->name;
            $cartItem->created_date = now();
            $cartItem->save();
        }
    }
}
