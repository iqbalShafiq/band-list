@extends('layouts.base')

@section('body')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-3">
            <x-sidebar></x-sidebar>
        </div>

        <div class="col-md-9">
            @include('alert')
            <div class="card">
                <div class="card-header">Create Band</div>
                <div class="card-body">
                    <form action="{{ route('bands.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" id="thumbnail" name="thumbnail" class="form-control-file">

                            @error('thumbnail')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control">

                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <select name="genres[]" id="genres" class="custom-select" multiple>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>

                            @error('genres')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
