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
        $user_posts = User::with('posts')->get();
        $user_comments = User::with('comments')->get();
        return view('client.pages.list_user', compact('data', 'user_posts', 'user_comments'));
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
