@extends('layouts.index')

@section('title', 'Create Film')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Film</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-6 mb-4">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" placeholder="Please insert title">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Slug</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="slug" placeholder="Please insert slug">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Sinopsis</label>
                <div class="col-sm-10">
                    <textarea class="form-control" placeholder="Please insert a sinopsis" id="sinopsis"></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Genre</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select Genre</option>
                        <option value="Family">family</option>
                        <option value="Romance">Romance</option>
                        <option value="Action">Action</option>
                        <option value="Animation">Animation</option>
                        <option value="Drama">Drama</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Score</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="score" placeholder="Please insert score">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="image" aria-describedby="inputGroupFileAddon04"
                        aria-label="Upload">
                </div>
            </div>

        </div>
    </div>

@endsection
