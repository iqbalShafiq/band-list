@extends('layouts.backend')

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2multiple').select2();
    });
</script>
@endpush

@section('content')
@include('alert')
<div class="card">
    <div class="card-header">Update Band</div>
    <div class="card-body">
        <form action="{{ route('bands.edit', $band->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail" class="form-control-file">

                @error('thumbnail')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{ old('name') ?? $band->name }}" type="text" id="name" name="name" class="form-control">

                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <select name="genres[]" id="genres" class="form-control select2multiple" multiple>
                    @foreach ($genres as $genre)
                    <option {{ $band->genres()->find($genre) ? 'selected' : '' }} value="{{ $genre->id }}">
                        {{ $genre->name }}</option>
                    @endforeach
                </select>

                @error('genres')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
