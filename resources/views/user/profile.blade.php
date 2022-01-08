@extends('layouts.app')
@section('title',$user->getName() . 'Profile | ')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div>
                <form class="needs-validation" novalidate="" action="{{route('users.update', auth()->user()->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="" value="{{Auth::user()->first_name}}">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="" value="{{Auth::user()->last_name}}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label><small style="color: red !important; display: inline; float: none;">can't be changed </small>
                            <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="contactNumber">Contact number</label>
                            <input type="text" class="form-control" id="contactNumber" name="contact_number" placeholder="" value="{{Auth::user()->contact_number}}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Shipping Address</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add">
                            <i class="fas fa-plus"></i> Add new address
                        </button>
                    </div>
                </div>
                <!-- Edit Modal -->
                <div class="modal fade" id="add" aria-modal="true" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add shipping address</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>

                            </div>
                            <form action="{{route('shippingAddresses.store')}}" method="POST">
                                <div class="modal-body">
                                    @csrf
                                    <div class="card-body">
                                        <!-- house number -->
                                        <div class="form-group">
                                            <label for="houseNumber">House number</label>
                                            <input type="text" class="form-control" id="houseNumber" name="houseNumber" placeholder="">
                                        </div>
                                        <!-- street -->
                                        <div class="form-group">
                                            <label for="street">Street</label>
                                            <input type="text" class="form-control" id="street" name="street" placeholder="">
                                        </div>
                                        <!-- brgy -->
                                        <div class="form-group">
                                            <label for="brgy">Brgy</label><span style="color: red !important; display: inline; float: none;">*</span>
                                            <input type="text" class="form-control" id="brgy" name="brgy" placeholder="">
                                        </div>
                                        <!-- city -->
                                        <div class="form-group">
                                            <label for="city">City</label><span style="color: red !important; display: inline; float: none;">*</span>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="">
                                        </div>
                                        <!-- province -->
                                        <div class="form-group">
                                            <label for="province">Province</label><span style="color: red !important; display: inline; float: none;">*</span>
                                            <input type="text" class="form-control" id="province" name="province" placeholder="">
                                        </div>
                                        <!-- country -->
                                        <div class="form-group">
                                            <label for="country">Country</label> <span style="color: red !important; display: inline; float: none;">*</span>
                                            <input type="text" class="form-control" id="country" name="country" placeholder="">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <div class="card-body">
                    <!-- table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Adresses</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shippingAddresses as $shippingAddress)
                            <tr>
                                <td>{{$shippingAddress->completeAddress()}}</td>
                                <td colspan="2">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$shippingAddress->id}}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$shippingAddress->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="edit{{$shippingAddress->id}}" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit shipping address</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>

                                        </div>
                                        <div class="modal-body">
                                            <form class="needs-validation" novalidate="" action="{{route('shippingAddresses.update',auth()->user()->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                    <!-- house number -->
                                                    <div class="form-group">
                                                        <label for="houseNumber">House number</label>
                                                        <input type="text" class="form-control" id="houseNumber" name="houseNumber" placeholder="" value="{{$shippingAddress?$shippingAddress->houseNumber:''}}">
                                                    </div>
                                                    <!-- street -->
                                                    <div class="form-group">
                                                        <label for="street">Street</label>
                                                        <input type="text" class="form-control" id="street" name="street" placeholder="" value="{{$shippingAddress?$shippingAddress->street:''}}">
                                                    </div>
                                                    <!-- brgy -->
                                                    <div class="form-group">
                                                        <label for="brgy">Brgy</label><span style="color: red !important; display: inline; float: none;">*</span>
                                                        <input type="text" class="form-control" id="brgy" name="brgy" placeholder="" value="{{$shippingAddress->brgy}}">
                                                    </div>
                                                    <!-- city -->
                                                    <div class="form-group">
                                                        <label for="city">City</label><span style="color: red !important; display: inline; float: none;">*</span>
                                                        <input type="text" class="form-control" id="city" name="city" placeholder="" value="{{$shippingAddress->city}}">
                                                    </div>
                                                    <!-- province -->
                                                    <div class="form-group">
                                                        <label for="province">Province</label><span style="color: red !important; display: inline; float: none;">*</span>
                                                        <input type="text" class="form-control" id="province" name="province" placeholder="" value="{{$shippingAddress->province}}">
                                                    </div>
                                                    <!-- country -->
                                                    <div class="form-group">
                                                        <label for="country">Country</label> <span style="color: red !important; display: inline; float: none;">*</span>
                                                        <input type="text" class="form-control" id="country" name="country" placeholder="" value="{{$shippingAddress->country}}">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <!-- delete modal -->
                            <div class="modal fade" id="delete{{$shippingAddress->id}}" aria-modal="true" role="dialog">
                                <div class="modal-dialog  modal-md">
                                    <div class="modal-content bg-danger">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete </p>
                                            <p>{{$shippingAddress->completeAddress()}}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>


                                            <form action="{{route('shippingAddresses.destroy', $shippingAddress->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-outline-light">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection