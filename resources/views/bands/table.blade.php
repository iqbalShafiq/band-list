@extends('layouts.backend')

@section('content')
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Genres</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bands as $index => $band)
            <tr>
                <th scope="row">{{ $bands->count() * ($bands->currentPage() - 1) + $loop->iteration }}</th>
                <td>{{ $band->name }}</td>
                <td>{{ $band->genres()->get()->implode('name', ',') }}</td>
                <td class="text-center">
                    <a href="#" class="btn btn-primary mr-2">Update</a>
                    <a href="#" class="btn btn-danger mr-2">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $bands->links() }}
</div>
@endsection
