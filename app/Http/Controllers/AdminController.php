<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()

    {
        $users = User::where('role', 'user')->get();
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request_data = $request->all();
        if ($request->hasFile("image")) {
            $image = $request_data["image"];
            $path = $image->store("users_images", 'usersimg_uploads');
            $request_data["image"] = $path;
        }

        User::create($request_data);
        return to_route('admin-users.index');
    }
    public function show($id)
    {
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);

        return redirect()->route('admin-users.index');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id)

            ],
            'image' => 'required',
            'password' => 'required',
            'password_confirmation' =>'required',
        ]);

        $request_data = $request->all();

        if ($request->hasFile("image")) {
            $image = $request_data["image"];
            $path = $image->store("users_images", 'usersimg_uploads');
            $request_data["image"] = $path;
        }

        $user = User::findorfail($id);
        $user->update($request_data);

        return redirect()->route('admin-users.index');
    }

    public function destroy(string $id)
    {

        User::findorfail($id)->delete();

        return to_route('admin-users.index');
    }
}
