@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3"><a href="{{ route('access.index') }}">Admin Access</a> / Create</h1>
    <form action="{{ route('access.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="name">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group mb-2">
            <label for="image">Password</label>
            <input type="text" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
@endsection