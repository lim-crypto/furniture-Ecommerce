@extends('layouts.adminlte')

@section('title', 'User')

@section('pluginscss')
@include('layouts.plugins.datatables.css')
@endsection
@section('css')
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table id="users-table" class="table table-sm table-hover table-head-fixed ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact number</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ ++$loop->index }}</td>
                                <td>{{ $user->getName() }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{$user->contact_number}}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('pluginsjs')
@include('layouts.plugins.datatables.js')
@endsection

@section('js')

<script>
    $(function() {
        $("#users-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });

    });
</script>
@endsection