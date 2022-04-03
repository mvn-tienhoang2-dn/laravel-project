<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $newName = \Carbon\Carbon::now()->toString() . $request->file('avatar')->getClientOriginalName();
            $path = '/image';
            $request->file('avatar')->move(public_path($path), $newName);
            $data['avatar'] = "$path/$newName";
        }
        $data['age'] = date('Y', strtotime(now())) - date('Y', strtotime($data['birthday']));
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return response()->json(['status' => true]);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $file_path =  '/var/www/public' . $user->avatar;
        if ($user) {
            File::delete($file_path);
            $user->delete();
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $newName = \Carbon\Carbon::now()->toString() . $request->file('avatar')->getClientOriginalName();
            $path = '/image';
            $request->file('avatar')->move(public_path($path), $newName);
            $data['avatar'] = "$path/$newName";
        }
        $data['age'] = date('Y', strtotime(now())) - date('Y', strtotime($data['birthday']));
        $data['password'] = bcrypt($data['password']);
        $user = User::find($request->id);
        $user->update($data);
        return response()->json(['status' => true]);
    }
}
