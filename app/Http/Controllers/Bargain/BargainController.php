<?php

namespace App\Http\Controllers\Bargain;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Bargain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BargainController extends Controller
{
    public function index()
    {
        $bargains = Bargain::orderBy('created_date', 'desc')->paginate(10); // Paginate with 10 items per page

        if (Auth::user()->profile && Auth::user()->profile->role && Auth::user()->profile->role->role_name === 'Buyer') {
            $bargains = Bargain::where('user_id', Auth::user()->id)->orderBy('created_date', 'desc')->paginate(10); // Paginate with 10 items per page
        }

        return view('bargain.index', compact('bargains'));
    }

    public function create(Request $request, $productId)
    {
        $product = Product::find($productId);

        $request->validate([
            'offer_price' => 'required|integer|min:0',
            'offer_stock' => 'required|integer|min:0',
        ]);

        $errorMessage = $this->validateBargain($request, $product);

        if ($errorMessage) {
            $this->storeBargain($request, $productId, 'FAILED', $errorMessage);
            return redirect()->route('product.detail', ['product' => $product])->with('error', $errorMessage);
        }
        else {
            $this->storeBargain($request, $productId, 'SUCCESS', $errorMessage);
            return redirect()->route('product.detail', ['product' => $product])->with('success', 'Penawaran berhasil dibuat');
        }
    }

    protected function validateBargain(Request $request, Product $product): ?string
    {
        return $this->checkCondition($product->stock_available < $request->offer_stock, 'Stok produk tidak mencukupi')
            ?? $this->checkCondition($request->offer_price < $product->net_price, 'Tidak memenuhi syarat harga batas bawah')
            ?? $this->checkCondition($product->min_stock > $request->offer_stock, 'Tidak memenuhi syarat stok minimum yang dipesan')
            ?? null;
    }

    protected function checkCondition(bool $condition, string $message): ?string
    {
        return $condition ? $message : null;
    }


    protected function storeBargain($request, $productId, $status, $errorMessage) : void {
        $bargain = new Bargain();
        $bargain->bargain_id = Str::uuid();
        $bargain->user_id = auth()->id();
        $bargain->product_id = $productId;
        $bargain->offer_quantity = $request->offer_stock;
        $bargain->offer_price = $request->offer_price;
        $bargain->status = $status;
        $bargain->error_message = $errorMessage;
        $bargain->created_by = auth()->user()->name;
        $bargain->created_date = now();
        $bargain->save();
    }
}
