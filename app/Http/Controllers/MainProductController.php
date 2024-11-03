<?php

namespace App\Http\Controllers;

use App\Models\MainProduct;
use App\Models\NewProduct;
use Illuminate\Http\Request;

class MainProductController extends Controller
{
    // Backend: List all main products
    public function index()
    {
        $main_products = MainProduct::all();
        return view('backend.main_products.index', compact('main_products'));
    }

    // Backend: Show form to create a new main product
    public function create()
    {
        return view('backend.main_products.create');
    }

    // Backend: Store a new main product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:main_products|max:255'
        ]);

        MainProduct::create(['name' => $request->name]);

        return redirect()->route('backend.main_products.index')->with('success', 'Main Product created successfully.');
    }

    // Frontend: Display all main products
    public function showMainProducts()
    {
        $mainProducts = MainProduct::all();
        return view('frontend.main_products.index', compact('mainProducts'));
    }

    // Frontend: Display sub-products for a specific main product
    public function showSubProducts(MainProduct $main_product)
    {
        $subProducts = $main_product->subProducts; // Ensure subProducts relationship is defined in MainProduct model
        return view('frontend.main_products.show_sub_products', [
            'mainProduct' => $main_product,
            'subProducts' => $subProducts,
        ]);
    }
    

    // Frontend: Show details of a specific sub-product
    public function show(MainProduct $main_product, NewProduct $sub_product)
    {
        return view('frontend.sub_products.details', compact('sub_product'));
    }
}
