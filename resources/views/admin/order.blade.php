@extends('admin.master')
@section('content')
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>All Order</h1>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">

							<div class="card-body table-responsive p-0">
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th width="60">ID</th>
											<th>Product_name</th>
											<th>Product_price</th>
											<th>Product_qty</th>
											<th>User_ Id</th>
											<th width="100">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($allorder as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->Product_name }}</td>
                                            <td>{{ $order->Product_price }}</td>
                                            <td>{{ $order->Product_Qty }}</td>
                                            <td>{{ $order->user_id }}</td>
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
			<!-- /.content-wrapper -->
		</div>
        @endsection
