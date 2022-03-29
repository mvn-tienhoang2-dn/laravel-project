<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data = User::with('posts', 'comments')->get();
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

    public function searchIndex()
    {
        return view('client.pages.search_index');
    }

    public function getDataTable()
    {
        $data = User::with('posts', 'comments')->get();
        return response()->json(['status' => true, 'data' => $data]);
    }

    public function searchDataName(Request $request)
    {
        $name = $request->all();
        $user = User::with('posts', 'comments')->where('name', 'LIKE', "%{$name['name']}%")->get();
        return response()->json(['status' => true, 'data' => $user]);
    }

    public function searchDataPost(Request $request)
    {
        $users = User::with('posts', 'comments')->get();
        $data = [];
        $count = $request->all();
        foreach ($users as $user_key => $user_value) {
            if (count($user_value->posts) == $count['count']) {
                $data[$user_key] = $user_value;
            }
        }

        return response()->json(['status' => true, 'data' => $data]);
    }

    public function searchDataComment(Request $request)
    {
        $users = User::with('posts', 'comments')->get();
        $data = [];
        $count = $request->all();
        foreach ($users as $user_key => $user_value) {
            if (count($user_value->comments) == ($count['count'])) {
                $data[$user_key] = $user_value;
            }
        }
        return response()->json(['status' => true, 'data' => $data]);
    }
}
