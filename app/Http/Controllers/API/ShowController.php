<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowResource;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //CONTOH PAGINATE (MENAMPILKAN 2 data saja)
        $data = Show::paginate();
        // $data = Show::all();
        // return response()->json(ShowResource::collection($data));

        return response()->json([
            'status' => 'success', //memberikan status
            'message' => 'fetched successfully', //memberikan pesan
            'data' => [ //menampilkan data
                'total' => $data->count(),
                'per_page' => $data->perPage(),
                'animes' => $data->items()
            ],
        ]);

        if (!$data) {
            return response()->json([
                'status' => 'success', //memberikan status
                'message' => 'No data found', //memberikan pesan
                'data' => [],
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Show $anime)
    {
        $data = $anime->get_slug($slug);

        // dd($data);

        if ($data == null) {
            return response()->json([
                'message' => 'Show not found'
            ], 404);
        }

        return response()->json([
            'data' => new ShowResource($data)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Show $anime, $slug)
    {
        $data = $anime->get_slug($slug);
        $data->title = $request->title;
        $data->slug = $request->slug;
        $data->score = $request->score;

        $data->save();

        return response()->json([
            'message' => 'Show updated successfully',
            'data' => new ShowResource($data)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $anime, $id)
    {
        $data = $anime->get_id($id);
        $data->delete();

        return response()->json([
            'message' => 'Anime deleted successfully'
        ], 200);
    }
}