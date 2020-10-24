<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->paginate(5);

        return view('admin.products.index', compact('products'));

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all(['id', 'name']);
        return view('admin.products.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$store = Store::find($request->store_id)){

            return redirect()->back()->with('error', 'Loja não encontrada');
        }

        $store->products()->create($request->all());

        return redirect()
        ->route('products.index')
        ->with('success', 'Produto criado com sucesso!');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idProduct)
    {
        $product = $this->product->find($idProduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idProduct)
    {
        $product = $this->product->find($idProduct);

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idProduct)
    {

        
       if(!$product = $this->product->find($idProduct)){

            return redirect()->back()->with('error', 'Produto não encontrado!');

       }

       $product->update($request->all());

       return redirect()->route('products.index')->with('success', 'Produto editado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idProduct)
    {
            
       
        if(!$product = $this->product->find($idProduct)){

             return redirect()->back()->with('error', 'Produto não encontrado!');

        }

        $product->delete();
        

        return redirect()->route('products.index')->with('warning', 'Produto deletado com sucesso!');


   

    }
}
