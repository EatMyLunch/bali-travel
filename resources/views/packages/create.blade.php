@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3"><a href="{{ route('packages.index') }}">Packages</a> / Create</h1>
    <form action="{{ route('packages.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group mb-2">
            <label for="image">Image URL:</label>
            <input type="text" class="form-control" id="image" name="image" required>
        </div>
        <div class="form-group mb-2">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
@endsection