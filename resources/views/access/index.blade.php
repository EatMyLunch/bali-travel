@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Admin Access</h1>
    <div id="toolbar">
    <a href="{{ route('access.create') }}" class="btn btn-primary">Create New access</a>
    </div>
    <table class="table-striped mt-3" id="table" data-toggle="table" data-toolbar="#toolbar" data-pagination="true" data-search="true" data-cookie="true"
        data-cookie-id-table="adminId">
        <thead>
            <tr>
                <th data-field="id">Id</th>
                <th data-field="username">Username</th>
                <th data-field="password">Hash</th>
                <th data-field="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $access)
            <tr>
                <td>{{ $access->id }}</td>
                <td>{{ $access->username }}</td>
                <td>{{ $access->password }}</td>
                <td>
                    <form action="{{ route('access.destroy', $access->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this admin?');">Delete</button>
                    </form>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('styles')
<link href="https://unpkg.com/bootstrap-table@1.23.2/dist/bootstrap-table.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://unpkg.com/bootstrap-table@1.23.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.23.2/dist/extensions/cookie/bootstrap-table-cookie.min.js"></script>
@endpush