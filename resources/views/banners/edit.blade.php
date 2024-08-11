@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3"><a href="{{ route('banners.index') }}">Banners</a> / Edit</h1>
    <form action="{{ route('banners.update', $banner->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Image URL:</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $banner->image }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection