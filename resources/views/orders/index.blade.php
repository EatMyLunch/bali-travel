@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Order</h1>
    <table class="table-striped" id="table" 
           data-toggle="table" 
           data-pagination="true" 
           data-search="true" 
           data-card-view="true"
           data-show-toggle="true"
           data-cookie="true"
           data-cookie-id-table="orderId">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">Id</th>
                <th data-field="created_at" data-sortable="true">created_at</th>
                <th data-field="customer_name" data-sortable="true">Customer Name</th>
                <th data-field="customer_phone" data-sortable="true">Customer Phone</th>
                <th data-field="package_name" data-sortable="true">Package Name</th>
                <th data-field="total_participant" data-sortable="true">Total Participant</th>
                <th data-field="total_day" data-sortable="true">Total Day</th>
                <th data-field="accommodation" data-sortable="true">Accommodation</th>
                <th data-field="transportation" data-sortable="true">Transportation</th>
                <th data-field="food" data-sortable="true">Food</th>
                <th data-field="travel_price" data-sortable="true">Travel Price</th>
                <th data-field="total_bill" data-sortable="true">Total Bill</th>
                <th data-field="actions" data-formatter="actionsFormatter">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->customer_phone }}</td>
                <td>{{ $order->package_name }}</td>
                <td>{{ $order->total_participant }}</td>
                <td>{{ $order->total_day }}</td>
                <td>{{ $order->accommodation }}</td>
                <td>{{ $order->transportation }}</td>
                <td>{{ $order->food }}</td>
                <td>{{ $order->travel_price }}</td>
                <td>{{ $order->total_bill }}</td>
                <td></td>
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
            <a href="/orders/${row.id}/edit" class="btn btn-sm btn-info">Manual Edit</a>
            <form action="/orders/${row.id}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        `;
    }
</script>
@endpush