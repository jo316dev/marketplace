<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Observers\CategoryObeserver;

class CategoryController extends Controller
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$categories = $this->category->paginate()){

            return redirect()->back()->with('error', 'Verificar error');
        }

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if(!$this->category->create($request->all())){

            redirect()->back()->with('error', 'Erro ao cadastar categoria, tente mais tarde');
        }

        return redirect()->route('admin.categories.index')->with('success', 'Categoria cadastrada com sucesso!');

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idCategory)
    {
        if(!$category = $this->category->find($idCategory)){

            return redirect()->back()->with('error', 'Error ao fazer a consulta');
        }

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $idCategory)
    {
        if(!$category = $this->category->find($idCategory)){

            return redirect()->back()->with('error', 'Error ao editar');
        }

            $category->update($request->all());

            return redirect()->route('admin.categories.index')->with('success', 'Categoria editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCategory)
    {
        if(!$category = $this->category->find($idCategory)){

            return redirect()->back()->with('error', 'Error ao deletar');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('warning', 'Categoria excluida com sucesso!');


    }
}
