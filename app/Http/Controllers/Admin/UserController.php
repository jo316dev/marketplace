<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UsersModel;

class UserController extends Controller
{
    protected $user;

    public function __construct(UsersModel $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if(!$data){

            return redirect()->back();
        }

        $this->user->create($data);

        return redirect()->route('users.index');
    }
}
