@extends('layouts.adminlte')
@section('title', 'edit Category | ')
@section('content')


<div class="row">
    <div class="col-12  col-md-8 mx-auto">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-edit"></i> Edit Category</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <a href="#!" onclick="history.back();" class="btn btn-sm  btn-secondary float-right"> <i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('category.update', $category->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label><span class="text-danger">*</span>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ $category->name }}">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
</div>

@endsection


@section('pluginsjs')

@endsection

@section('js')

@endsection