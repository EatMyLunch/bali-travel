@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Videos</h1>
    <div id="toolbar">
        <a href="{{ route('videos.create') }}" class="btn btn-primary">Create New Video</a>
    </div>
    <table class="table-striped mt-3" id="table" data-toggle="table" data-toolbar="#toolbar" data-pagination="true" data-search="true"
    data-cookie="true" data-cookie-id-table="videoId">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">ID</th>
                <th data-field="name" data-sortable="true">Name</th>
                <th data-field="url" data-sortable="true">Url</th>
                <th data-field="actions" data-formatter="actionsFormatter">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($videos as $video)
            <tr>
                <td>{{ $video->id }}</td>
                <td>{{ $video->name }}</td>
                <td>{{ $video->url }}</td>
                <td>
                    <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline">
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

@push('styles')
<link href="https://unpkg.com/bootstrap-table@1.23.2/dist/bootstrap-table.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://unpkg.com/bootstrap-table@1.23.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.23.2/dist/extensions/cookie/bootstrap-table-cookie.min.js"></script>
<script>
    function actionsFormatter(value, row) {
        return `
            <a href="/videos/${row.id}/edit" class="btn btn-sm btn-info">Edit</a>
            <form action="/videos/${row.id}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        `;
    }
</script>
@endpush