<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch 8 products from the Fake Store API
        $response = Http::withoutVerifying()->get('https://fakestoreapi.com/products?limit=8');
        $products = $response->json();

        return view('shop', compact('products'));
    }
}