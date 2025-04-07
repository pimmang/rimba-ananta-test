<?php

namespace App\Http\Controllers;

use App\Models\UserApi;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index()
    {
        return response()->json(UserApi::all());
    }
    public function show($id)
    {
        return response()->json(UserApi::findOrFail($id));
    }

    public function store(Request $request)
    {
        $user = UserApi::create($request->only(['name', 'email', 'age']));
        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = UserApi::findOrFail($id);
        $user->update($request->only(['name', 'email', 'age']));
        return response()->json($user);
    }
    public function destroy($id)
    {
        $user = UserApi::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
