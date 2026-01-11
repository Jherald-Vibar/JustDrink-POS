<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{


    // Retrieve all products, ordered by 'id'
    $products = Product::orderBy('id', 'asc');

    // Get distinct categories from products
    $categories = Product::select('category')->distinct()->pluck('category');
    if ($request->category) {
        $products = $products->where('category', $request->category);
    }

    // If there is a search term, filter products by name
    if ($request->search) {
        $products = $products->where('name', 'LIKE', "%{$request->search}%");
    }

    // Paginate the results
    $products = $products->paginate(25);

    // If the request wants a JSON response, return a resource collection
    if ($request->wantsJson()) {
        return ProductResource::collection($products);
    }

    // Pass the products and categories to the view
    return view('products.index', compact('products', 'categories'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
{
    // Create the product without the image initially
    $product = Product::create([
        'name' => $request->name,
        'barcode' => $request->barcode,
        'category' => $request->category,
        'price' => $request->price,
        'image' => $request->image,
        'quantity' => $request->quantity,
        'status' => $request->status,
    ]);

    // Check if the request has a file (image)
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();


        $file->move(public_path('uploads'), $fileName);

        $product->update(['image' => $fileName]);
    }

    if (!$product) {
        return redirect()->back()->with('error', 'Sorry, Something went wrong while creating product.');
    }

    return redirect()->route('products.index')->with('success', 'Success, New product has been added successfully!');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->barcode = $request->barcode;
        $category->category = $request->category;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->status = $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();


            $file->move(public_path('uploads'), $fileName);

            $product->update(['image' => $fileName]);
        }

        if (!$product->save()) {
            return redirect()->back()->with('error', 'Sorry, Something went wrong while updating product.');
        }
        return redirect()->route('products.index')->with('success', 'Success, Product has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
