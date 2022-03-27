<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('client.pages.list_user', compact('data'));
    }
    public function view()
    {
        return view('client.pages.add_user');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['age'] = date('Y', strtotime(now())) - date('Y', strtotime($data['birthday']));
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect(route('user.list.index'));
    }
}
