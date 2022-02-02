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
        $data = User::paginate();

        return response()->json([
            'status' => 'success',
            'message' => 'fetched successfully',
            'data' => [
                'total' => $data->count(),
                'per_page' => $data->perPage(),
                "current_page" => $data->currentPage(),
                "last_page" => $data->lastPage(),
                'users' => $data->items()
            ],
        ]);
    }

    public function show($id)
    {
        $data = User::find($id);

        if ($data) {
            return response()->json([
                'data' => new UserResource($data)
            ]);
        }
        return response()->json([
            'message' => 'User not found'
        ], 404);
    }


    public function destroy($id)
    {
        $data = User::find($id);

        $data->delete();

        return response()->json([
            'message' => 'Successfully deleted user'
        ], 200);
    }
}