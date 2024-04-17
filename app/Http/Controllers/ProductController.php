<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    function __construct()
    {
        // $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $store = $product->save();
        if ($store){
            return redirect(route('products.index'))->with('success', 'New Product create successfully');
        }
        return back()->with('warning', 'Product could not be create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return void
     */
    public function update(Request $request, $product_id)
    {
        $request->validate([
            'name' => 'required|unique:products,name,'. $product_id,
        ]);
        $product = Product::find($product_id);
        $product->name = $request->name;
        $product->description = $request->description;
        $store = $product->update();
        if ($store){
            return redirect(route('products.index'))->with('success', 'Product update successfully');
        }
        return back()->with('warning', 'Product could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        if ($product->delete()){
            return back()->with('success', 'Product delete successfully');
        }
        return back()->with('warning', 'Product could not be delete');
    }
}
