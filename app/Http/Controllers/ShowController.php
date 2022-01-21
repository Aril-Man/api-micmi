<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Http\Requests\StoreShowRequest;
use App\Http\Requests\UpdateShowRequest;
use App\Models\Genre;
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
        return view('dashboard.index', ['data', $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_anime()
    {
        $data_genre = Genre::all();
        return view('dashboard.create')->with('genre', $data_genre);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store_anime(StoreShowRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'score' => 'required',
            'genre_id' => 'required|array',
            'image' => 'required|file|image'
        ]);

        $input = $request->all();

        $input['title'] = $input['title'];
        $input['slug'] = strtolower($input['title']);
        $input['score'] = $input['score'];

        $input_genre = $request->input('genre_id');
        $genre = implode(',', $input_genre);

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $folderName = 'cover_image/';
        $destinationPath = $folderName;
        $safeName = Str::random(10) . '.' . $extension;
        $file->move($destinationPath, $safeName);
        $input['image'] = $safeName;

        $respons = Show::create([
            'title' => $input['title'],
            'slug' => $input['slug'],
            'score' => $input['score'],
            'genre_id' => $genre,
            'image' => $input['image'],
        ]);

        // dd($respons);

        if ($respons) {
            return redirect()->back()
                ->with('success', 'Data Berhasil Ditambah');
        }
        return redirect('/dashboard/create')
            ->with('error', 'Data Tidak Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function show_anime(Show $show)
    {
        $data = Show::all();
        $genre = Genre::all();

        // dd($genre);
        // dd($data);
        return view('dashboard.show', compact('data', 'genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function edit(Show $show)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShowRequest  $request
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShowRequest $request, Show $show)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
    {
        //
    }
}