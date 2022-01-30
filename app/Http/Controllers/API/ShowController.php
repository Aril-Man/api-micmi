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
        $data = Show::all();

        return response()->json([
            'data' => ShowResource::collection($data)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = Show::where('slug', $slug)->first();

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
    public function update(Request $request, $slug)
    {
        $data = Show::where('slug', $slug)->first();
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
    public function destroy($slug)
    {
        $data = Show::where('slug', $slug)->first();
        $data->delete();

        return response()->json([
            'message' => 'Anime deleted successfully'
        ], 200);
    }
}