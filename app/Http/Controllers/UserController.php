<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $data = DB::table('users')->get();
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
        $data['created_at'] = now();
        $data['updated_at'] = now();
        $sql = [
            'name' => $data['name'],
            'age' => $data['age'],
            'email' => $data['email'],
            'password' => $data['password'],
            'birthday' => $data['birthday'],
            'status' => $data['status'],
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at']
        ];
        // dd($sql);
        DB::table('users')->insert($sql);
        return redirect(route('user.list.index'));
    }
}
