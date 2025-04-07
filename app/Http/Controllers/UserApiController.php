<?php

namespace App\Http\Controllers;

use App\Models\UserApi;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      x={
 *          "logo": {
 *              "url": "https://via.placeholder.com/190x90.png?text=L5-Swagger"
 *          }
 *      },
 *      title="Api documentation for Rimba Ananta Test",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="darius@matulionis.lt"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */
class UserApiController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Menampilkan daftar user",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="Berhasil menampilkan user"
     *     )
     * )
     */
    public function index()
    {
        return response()->json(UserApi::all());
    }

    /**
     * @OA\Get(
     *     path="/api/users/{id}",
     *     summary="Menampilkan data User berdasarkan ID",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID User",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Data User ditemukan"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User tidak ditemukan"
     *     )
     * )
     */

    public function show($id)
    {
        return response()->json(UserApi::findOrFail($id));
    }

    /**
     * @OA\Post(
     *     path="/api/users",
     *     summary="Menambahkan user baru",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","email","age"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="age", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User berhasil ditambahkan"
     *     )
     * )
     */

    public function store(Request $request)
    {
        $user = UserApi::create($request->only(['name', 'email', 'age']));
        return response()->json($user, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/users/{id}",
     *     summary="Memperbarui data User berdasarkan ID",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID User",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","email","age"},
     *             @OA\Property(property="name", type="string", example="firman 2"),
     *             @OA\Property(property="email", type="string", format="email", example="firman2@example.com"),
     *             @OA\Property(property="age", type="integer", example=25)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Data User berhasil diperbarui"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User tidak ditemukan"
     *     )
     * )
     */

    public function update(Request $request, $id)
    {
        $user = UserApi::findOrFail($id);
        $user->update($request->only(['name', 'email', 'age']));
        return response()->json($user);
    }

    /**
     * @OA\Delete(
     *     path="/api/users/{id}",
     *     summary="Menghapus User berdasarkan ID",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID User",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="User berhasil dihapus"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User tidak ditemukan"
     *     )
     * )
     */

    public function destroy($id)
    {
        $user = UserApi::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
