@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Packages</h1>
    <div id="toolbar">
        <a href="{{ route('packages.create') }}" class="btn btn-primary">Create New Package</a>
    </div>
    <table class="table-striped mt-3" id="table" data-toggle="table" data-toolbar="#toolbar" data-pagination="true" data-search="true"
        data-cookie="true" data-cookie-id-table="packageId">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">ID</th>
                <th data-field="name" data-sortable="true">Name</th>
                <th data-field="image" data-sortable="true">Image</th>
                <th data-field="description" data-sortable="true">Description</th>
                <th data-field="actions" data-formatter="actionsFormatter">Actions</th>
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
<script>
    function actionsFormatter(value, row) {
        return `
            <a href="/packages/${row.id}/edit" class="btn btn-sm btn-info">Edit</a>
            <form action="/packages/${row.id}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        `;
    }
</script>
@endpush