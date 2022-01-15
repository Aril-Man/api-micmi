@extends('layouts.index')

@section('title', 'Create Anime')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Anime</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Create Anime</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form method="POST" action="/dashboard/create" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="font-weight-bold">Title</label>
                        <input name="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="score" class="font-weight-bold">Score</label>
                        <input name="score" type="number" class="form-control">
                    </div>
                    <div class="form-group ">
                        <label for="genre_id" class="font-weight-bold">Genre</label>
                        @foreach ($genre as $g)
                            <div class="form-check ">
                                <label class="form-check-labe d-inline-flex">
                                    <input class="form-check-input" value="{{ $g->genre }}" type="checkbox"
                                        name="genre_id[]" id="genre_id">
                                    {{ $g->genre }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="image" class="font-weight-bold">Image</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
