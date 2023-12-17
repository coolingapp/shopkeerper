@extends('user.master')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="order_product text-center">
                <h1>Order Product</h1>
            </div>
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Product name</th>
                                <th>Product Price</th>
                                <th>Product Qty</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->Product_name }}</td>
                                <td>{{ $item->Product_price }}</td>
                                <td>{{ $item->Product_Qty }}</td>
                                <td><span>Cash On delivery</span></td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

@endsection
