@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Videos</h1>
    <a href="{{ route('videos.create') }}" class="btn btn-primary">Create New Video</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Url</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($videos as $video)
            <tr>
                <td>{{ $video->id }}</td>
                <td>{{ $video->name }}</td>
                <td>{{ $video->url }}</td>
                <td>
                    <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection