<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFromRequest;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFromRequest $request)
    {
        $image = null;
        if($request->hasFile('image')) {
            $image = $request->file('image')->store('products');
        }

        $categories = Category::find($request->categories);

        $data = array_merge(
                    $request->except('_token', 'categories', 'image'),
                    compact('image')
                );

        $product = Product::create($data);

        // $product = Product::create([
        //     'name' => $request->name,
        //     'slug' => Str::slug($request->name),
        //     'description' => $request->description,
        //     'image' => $image,
        //     'price' => $request->price,
        //     'qty' => $request->qty
        // ]);

        $product->categories()->attach($categories);

        session()->flash('message', 'Data successfully added');

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => Category::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFromRequest $request, Product $product)
    {
        $image = $product->image ?? null;

        if($request->hasFile('image')) {
            if($product->image) {
                Storage::delete($product->image);
            }

            $image = $request->file('image')->store('products');
        }

        $categories = Category::find($request->categories);

        $data = array_merge(
                    $request->except('_method', '_token', 'categories', 'image'),
                    compact('image')
                );

        $product->update($data);
        // $product->update([
        //     'name' => $request->name,
        //     'slug' => Str::slug($request->name),
        //     'description' => $request->description,
        //     'image' => $image,
        //     'price' => $request->price,
        //     'qty' => $request->qty
        // ]);

        $product->categories()->sync($categories);

        session()->flash('message', 'Data successfully updated');

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }

        $product->delete();

        return response()->json(['success' => true]);
    }
}
