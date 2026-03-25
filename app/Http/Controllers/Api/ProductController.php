<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    /**
     * @param ProductService $service
     */
    public function __construct(ProductService $service)
    {
        $this->productService = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->productService->list());
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
        return response()->json(
            $this->productService->store($request->all())
        );
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
        return response()->json(
            $this->productService->update($id, $request->all())
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->productService->delete($id);
        
        return response()->json([
            'message' => 'Produto deletado com sucesso'
        ]);
    }
}
