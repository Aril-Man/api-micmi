<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();

        return response()->json(UserResource::collection($data));
    }

    public function show($id)
    {
        $data = User::find($id);

        if ($data) {
            return response()->json([new UserResource($data)]);
        }
        return response()->json('User tidak ditemukan');
    }


    public function destroy($id)
    {
        $data = User::find($id);

        $data->delete();

        return response()->json('Data berhasil di hapus');
    }
}