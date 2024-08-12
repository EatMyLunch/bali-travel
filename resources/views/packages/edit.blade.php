@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3"><a href="{{ route('packages.index') }}">Packages</a> / Edit</h1>
    <form action="{{ route('packages.update', $package->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $package->name ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image URL:</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $package->image }}" required>
        </div>
        <div class="form-group mb-2">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $package->description }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection