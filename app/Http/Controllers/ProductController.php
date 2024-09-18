<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate(Product::$rules);
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        request()->validate(Product::$rulesUpdate);  
        
        $product->update([
            'name' => $request->name,
        ]);

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Product::find($id)->delete();
        return response()->json('eliminado');
    }

    public function addStock(Request $request, $id)
    {

        $product = Product::find($id);
        request()->validate(Product::$rulesCantidad);  
        $product->cantidad += $request->cantidad;
        
        $product->update([
            'cantidad' => $product->cantidad,
        ]);

        return response()->json($product);
    }

    public function removeStock(Request $request, $id)
    {
        $product = Product::find($id);
        request()->validate(Product::$rulesCantidad);  

        if ($product->cantidad < $request->cantidad) {
            return response()->json(['message' => 'Insufficient stock'], 400);
        }
        
        $product->cantidad -= $request->cantidad;
        
        $product->update([
            'cantidad' => $product->cantidad,
        ]);

        return response()->json($product);
    }
}
