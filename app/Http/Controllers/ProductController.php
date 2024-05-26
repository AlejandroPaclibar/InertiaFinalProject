<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\FunctionUnit;

class ProductController extends Controller
{
    public function index() {
        $products = Product::orderBy('name')->get();
        logger($products);  // Log the products to the Laravel log

        return inertia('Products/Index', [
            'products' => $products,
        ]);
    }

    public function show(Product $product){
        return inertia('Products/Edit',[
            'product' => $product
        ]);
    }

    public function create() {
        return inertia('Products/Create');
    }


    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required|numeric'
        ]);

        Product::create($request->all());
        return redirect('/products');
    }

    public function update(Request $request, Product $product){
        $fields= $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required|numeric'
        ]);

        $product->update($fields);
        return redirect('/products');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect('/products');
    }

    public function about() {
        return inertia('Products/About');
    } 
}
