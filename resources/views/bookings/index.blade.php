@extends('layouts.app')

@section('content')
<style>

</style>
<div class="container mt-4">
    <div id="toolbar">
        <h1 class="text-center">Available Travel Packages</h1>
    </div>
    <table id="packages-table" 
           data-toggle="table"
           data-url="{{ route('bookings.getData') }}"
           data-pagination="true"
           data-search="true"
           data-side-pagination="server"
           data-page-list="[6, 12, 24, 48]"
           data-page-size="6"
           data-toolbar="#toolbar"
           data-show-custom-view="true"
           data-custom-view="customViewFormatter">
        <thead>
            <tr>
                <th data-field="id">ID</th>
                <th data-field="name">Name</th>
                <th data-field="description">Description</th>
                <th data-field="image">Image</th>
            </tr>
        </thead>
    </table>
</div>

<template id="packageTemplate">
    <div class="col-12 col-md-4 mb-4">
        <div class="card">
            <img src="%IMAGE%" class="card-img-top" alt="photos">
            <div class="card-body">
                <h5 class="card-title">%NAME%</h5>
                <p class="card-text">%DESCRIPTION%</p>
                <a href="/bookings/order/%ID%" target="_blank" class="btn btn-primary">Book Now</a>
            </div>
        </div>
    </div>
</template>
@endsection

@push('styles')
<link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/custom-view/bootstrap-table-custom-view.min.js"></script>
<script>
   function customViewFormatter(data) {
    var template = $('#packageTemplate').html();
    var view = '';
    $.each(data, function(i, row) {
        view += template.replace('%NAME%', row.name)
                        .replace('%IMAGE%', row.image)
                        .replace('%DESCRIPTION%', row.description)
                        .replace('%ID%', row.id);
    });
    return `<div class="row">${view}</div>`;
}

    $(function() {
        $('#packages-table').bootstrapTable();
    });
</script>
@endpush