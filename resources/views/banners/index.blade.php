@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Banners</h1>
    <a href="{{ route('banners.create') }}" class="btn btn-primary">Create New Banner</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
            <tr>
                <td>{{ $banner->id }}</td>
                <td><img src="{{ $banner->image }}" width="80"></td>
                <td>
                    <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection