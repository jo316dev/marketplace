<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
        $userStore = auth()->user()->store; //puxa a loja do usuario
       
        $products = $userStore->products()->paginate(100);
        // $products = auth()->user

        return view('admin.products.index', compact('products'));

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['id', 'name']);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->file('photos'));

        $store = auth()->user()->store;

        $product = $store->products()->create($request->all());

        $product->categories()->sync($request['categories']);

        if($request->hasFile('photos')){

            $images = $this->imageUpload($request, 'image');
            $product->photos()->createMany($images);
        }

        return redirect()
        ->route('admin.products.index')
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
        $categories = Category::all(['id', 'name']);

        // dd($product->all());

        return view('admin.products.edit', compact('product', 'categories'));
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

       if($request->hasFile('photos')){

        $images = $this->imageUpload($request, 'image');
        $product->photos()->createMany($images);
    }



       $product->categories()->sync($request['categories']);


   

       return redirect()->route('admin.products.index')->with('success', 'Produto editado com sucesso!');

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


    private function imageUpload(Request $request, $imageCollumn)
    {
        $images = $request->photos;

        // dd($images);

        $uploadedImages = [];

        foreach ($images as $image) {
            
            $uploadedImages[] = [$imageCollumn => $image->store('products', 'public')];

            return $uploadedImages;
        }
    }
}
