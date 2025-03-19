<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $productGroupByCategory = ProductCategory::withCount('products')->get();
        $totalProducts = Product::count();
        $salesData = [
            'labels' => ['2025-03-01', '2025-03-02', '2025-03-03', '2025-03-04', '2025-03-05', '2025-03-06', '2025-03-07'],
            'data' => [1500000, 2000000, 1750000, 2200000, 1900000, 2030000, 2300000],
        ];
        $userCount = User::count();

        return view('dashboard.index', compact('productGroupByCategory', 'totalProducts', 'salesData', 'userCount'));
    }
}
