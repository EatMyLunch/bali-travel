@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Packages</h1>
    <a href="{{ route('packages.create') }}" class="btn btn-primary">Create New Package</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($packages as $package)
            <tr>
                <td>{{ $package->id }}</td>
                <td>{{ $package->name }}</td>
                <td><img src="{{ $package->image }}" width="80"></td>
                <td>{{ $package->description }}</td>
                <td>
                    <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline">
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