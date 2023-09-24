<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;





class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index', ['products' => $products]);
        
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validation logic here
        $validator = Validator::make($request->all(), [
            'name' => 'required', // Ensure 'name' is required
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->route('product.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Create the product
        $product = new Product();
        $product->name = $request->input('name');
        $product->qty = $request->input('qty');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();

        // Flash a success message to the session
        session()->flash('success', 'Product created successfully.');

        return redirect()->route('product.create');
    }


    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product Updated Succesffully');

    }

    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted Succesffully');
    }


    public function back()
    {
        return redirect()->back();
    }
    

        
}
