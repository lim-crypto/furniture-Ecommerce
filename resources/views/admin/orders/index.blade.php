@extends('layouts.adminlte')

@section('title', 'Orders | ')

@section('pluginscss')
@include('layouts.plugins.datatables.css')
@endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Orders</h3>
            </div>
            <div class="card-body">
                <table id="orders-table" class="table table-sm table-hover table-head-fixed">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Payment status</th>
                            <th>Order Status</th>
                            <th>Placed order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->getName() }}</td>
                            <td>{{ $order->shipping_address }}</td>
                            <td> &#8369; {{ $order->total }}</td>
                            <td>{{ $order->payment_method  }}</td>
                            <td>{{ $order->payment_status  }}</td>
                            <td>
                                @if($order->status == 'pending')
                                <span class="badge badge-pill badge-warning   py-1 px-2">{{$order->status}}</span>
                                @elseif($order->status == 'packed')
                                <span class="badge badge-pill badge-info   py-1 px-2">{{$order->status}}</span>
                                @elseif($order->status == 'shipped')
                                <span class="badge badge-pill badge-secondary   py-1 px-2">{{$order->status}}</span>
                                @elseif($order->status == 'delivered')
                                <span class="badge badge-pill badge-success   py-1 px-2">{{$order->status}}</span>
                                @elseif($order->status == 'cancelled')
                                <span class="badge badge-pill badge-danger   py-1 px-2">{{$order->status}}</span>
                                @endif
                            </td>
                            <td>{{ $order->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>

@endsection


@section('pluginsjs')
@include('layouts.plugins.datatables.js')
@endsection

@section('js')

<script>
    $(function() {
        $("#orders-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                    "extend": 'copy',
                    "exportOptions": {
                        "columns": ':visible'
                    }
                },
                {
                    "extend": 'csv',
                    "exportOptions": {
                        "columns": ':visible'
                    }
                }, {
                    "extend": 'excel',
                    "exportOptions": {
                        "columns": ':visible'
                    }
                },
                {
                    "extend": 'pdf',
                    "exportOptions": {
                        "columns": ':visible'
                    }
                },
                {
                    "extend": 'print',
                    "exportOptions": {
                        "columns": ':visible'

                    }

                },


                'colvis'
            ]
        }).buttons().container().appendTo('#orders-table_wrapper .col-md-6:eq(0)');

    });
</script>
@endsection