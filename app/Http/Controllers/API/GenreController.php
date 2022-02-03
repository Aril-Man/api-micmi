<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Genre::paginate();

        return response()->json([
            'status' => 'success',
            'message' => 'fetched successfully',
            'data' => [
                'total' => $data->count(),
                'per_page' => $data->perPage(),
                'genres' => $data->items()
            ],
        ]);

        // return response()->json([
        //     'data' => GenreResource::collection($data)
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'genre' => 'required',
        ]);

        $input = $request->all();

        $input['genre'] = $input['genre'];

        $respons = Genre::create([
            'genre' => $input['genre'],
        ]);

        return response()->json([
            'message' => 'Successfully created genre!',
            'data' => new GenreResource($respons)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre, $id)
    {
        $data = $genre->get_id($id);

        if ($data == null) {
            return response()->json([
                'message' => 'Data tidak ditemukan.'
            ], 404);
        }
        return response()->json([
            'data' => new GenreResource($data)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre, $id)
    {
        $data = $genre->get_id($id);
        $data->genre = $request->genre;
        $data->save();

        return response()->json([
            'message' => 'Data Berhasil Update',
            'status' => 'success',
            'data' => new GenreResource($data)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre, $id)
    {
        $data = $genre->get_id($id);

        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Dihapus'
        ]);
    }
}