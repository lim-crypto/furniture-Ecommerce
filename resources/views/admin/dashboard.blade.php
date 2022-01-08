@extends('layouts.adminlte')

@section('title', 'Dashboard | ')

@section('pluginscss')

@endsection

@section('css')

@endsection

@section('content_header')
Dashboard
@endsection

@section('content')

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$newOrders}}</h3>

                <p>New Orders</p>
            </div>
            <div class="icon">
            <i class="fas fa-shopping-basket"></i>
            </div>
            <a href="/admin/orders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$orders}}</h3>

                <p>Orders</p>
            </div>
            <div class="icon">
            <i class="fas fa-cash-register"></i>
            </div>
            <a href="/admin/orders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{$products}}</h3>

                <p>Products</p>
            </div>
            <div class="icon">
            <i class="fas fa-store-alt"></i>
            </div>
            <a href="/admin/products" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$users}}</h3>

                <p>Customers</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="/admin/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
@endsection


@section('pluginsjs')

@endsection

@section('js')

@endsection