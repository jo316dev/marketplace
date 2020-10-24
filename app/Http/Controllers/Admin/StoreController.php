<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{

    protected $user, $store;

    public function __construct(Store $store, User $user)
    {
        $this->user = $user;
        $this->store = $store;
        $this->middleware('user.has.store')->only(['create', 'store']);
    }

    public function index()
    {
        $store = auth()->user()->store;

        // dd(auth()->user()->store);
        

        return view('admin.stores.index', compact('store'));
    }


    public function create()
    {

        

        $users = $this->user::all(['id', 'name']);
        
        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {
        $user = auth()->user();

        $user->store()->create($request->all());
        // $user = $this->user::find($request->user);
        

        return redirect()->route('admin.stores.index')
                            ->with('success', 'Loja criada com sucesso');
        
    }

    public function edit($idStore)
    {
        $store = $this->store->find($idStore);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, $idStore)
    {
        $store = $this->store->find($idStore);

        $store->update($request->all());

        return redirect()->route('stores.index')->with('success', 'Loja editada com sucesso!');

    }

    public function delete($idStore)
    {
        if(!$store = $this->store->find($idStore)){

            return redirect()->route('stores.index');
        }

        $store->delete();

        return redirect()->route('stores.index')->with('success', 'Loja removida com sucesso!');

    }
}
