@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3"><a href="{{ route('banners.index') }}">Banners</a> / Create</h1>
    <form action="{{ route('banners.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="image">Image URL:</label>
            <input type="text" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
    
@endsection