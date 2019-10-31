<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of all products.
     * 
     * @return array
     */
    public function index()
    {
        return response()->json(Product::all());
    }

    /**
     * Display the product of its id.
     * 
     * @return object
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        
        return response()->json($product);
    }

    /**
     * Adds a new product.
     * 
     * @return object
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'featured_image' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);

        try {
            $product = Product::create([
                'featured_image' => $request->featured_image,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);
    
            return response()->json([
                'product' => $product,
                'message' => 'A product was added successfully.'
            ]);
        } catch (Exception $error) {
            return response()->json([
                'error_message' => $error,
                'message' => 'The attempt of adding a new product failed.',
            ]);
        }
    }

    /**
     * Updates an existing product.
     * 
     * @return object
     * @param $id the product's id
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ]);

        $product = Product::findOrFail($id);
        
        if($request->hasFeaturedImage()) {
            $product->featured_image = $request->featured_image;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if($product->save()) {
            return response()->json([
                'product' => $product,
                'message' => 'A product has been updated successfully!',
            ]);
        } else {
            return response()->json([
                'message' => 'A product was not updated.',
            ]);
        }
    }

    /**
     * Delete a product.
     * 
     * @return JSONMessage
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if($product->delete()) {
            return response()->json([
                'message' => 'A product has been deleted successfully!',
            ]);
        } else {
            return response()->json([
                'message' => 'A product was not deleted.',
            ]);
        }
    }
}
