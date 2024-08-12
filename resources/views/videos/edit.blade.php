@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3"><a href="{{ route('videos.index') }}">Videos</a> / Edit</h1>
    <form action="{{ route('videos.update', $video->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $video->name ?? '' }}" required>
        </div>
        <div class="form-group mb-2">
            <label for="image">Video URL:</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ $video->url }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection