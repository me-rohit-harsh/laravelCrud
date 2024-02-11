<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // This is for welcome page 
    public function index()
    {
        return view("welcome");
    }
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view("editproduct", ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        // validate data 

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif||max:1000'
        ]);

        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        // To redirect after form submition 
        // return redirect('/list');

        // To flash a msg when success 
        return back()->withSuccess('Product updated  !!!');
    }
    // this is returing the view of product page 
    public function addProduct()
    {
        return view('addproduct');
    }

    public function allProducts()
    {
        $products = Product::get();
        return view('allproduct', ['products' => $products]);
    }

    public function store(Request $request)
    {
        // validate data 

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif||max:1000'
        ]);


        // to print the submited data 
        // dd($request->all());

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        // To redirect after form submition 
        // return redirect('/list');

        // To flash a msg when success 
        return back()->withSuccess('Product Listed  !!!');
    }
    public function delete($id)
    {
        $product = Product::where('id', $id);
        $product->delete();
        return back()->withSuccess("Product Deleted !!!");
    }
}
