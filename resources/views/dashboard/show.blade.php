@extends('layouts.index')

@section('title', 'Show Anime')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Show Anime</h1>
    </div>

    <div class="row">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Show Anime</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Score</th>
                                <th>Genre</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->title }}</td>
                                    <td>{{ $d->slug }}</td>
                                    <td>{{ $d->score }}</td>
                                    @foreach ($genre as $g)
                                        @if ($d->genre_id == $g->id)
                                            <td>{{ $g->genre }}</td>
                                        @endif
                                    @endforeach
                                    <td><img src="/cover_image/{{ $d->image }}" alt=""></td>
                                    <td>
                                        <button class="btn btn-warning">Update</button>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
