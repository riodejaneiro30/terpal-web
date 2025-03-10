<?php

namespace App\Http\Controllers;

use App\Models\GeneralParameter;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $parameter = GeneralParameter::whereRaw('LOWER(general_parameter_key) = LOWER(?)', ['company_description'])->first();

        return view('landing', compact('products', 'parameter'));
    }
}
