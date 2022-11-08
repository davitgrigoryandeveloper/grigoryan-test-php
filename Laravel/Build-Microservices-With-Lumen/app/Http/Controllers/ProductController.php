<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(): JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function create(Request $request, Product $product): JsonResponse
    {
        $validated = $this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'price' => ['required', 'numeric', 'max:1000000'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->description = $validated['description'];

        $product->save();
        return response()->json($product);
    }

    public function show(int $id): JsonResponse
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'price' => ['required', 'numeric', 'max:1000000'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $product = Product::find($id);

        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->description = $validated['description'];
        $product->save();
        return response()->json($product);
    }

    public function destroy(int $id): JsonResponse
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('product removed successfully');
    }
}
