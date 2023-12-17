@extends('admin.master')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Products</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>


<!-- Button trigger modal -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <form action="{{ url('/admin/edit_product'). '/' .  $product->id }}" method="post">
                    @csrf
                    <div class="col-md-8">
                        <div class="mb-3 p-3">
                            <div class="mb-3">
                                <label for="category">Product Name</label>
                                <input type="text" placeholder="Input new product" name="product" value="{{  $product->product_name }}">
                            </div>
                            @error('product')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mb-3">
                                <label for="category">Product price</label>
                                <input type="text" placeholder="Input product price" name="price" value="{{ $product->product_price }}">
                            </div>
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mb-3">
                                <div class="name">
                                    <label for="category">Product Category</label>
                                </div>
                                <select name="category">
                                    <option value="{{ $product->product_category }}">{{ $product->product_category }}</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->product_category }}" {{ old('category') == $category->product_category ? 'selected' : '' }}>{{ $category->product_category }}</option>
                                @endforeach
                                </select>
                            </div>
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                    </div>
                </form>

            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

@endsection
