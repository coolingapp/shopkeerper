<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <style>
    li{
      list-style: none;

    }
    .product{
        margin-top: 100px;
    }
  </style>
  <body>
    <div class="container">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
        @if(auth()->check() && auth()->user()->canEdit(auth()->user()))
            <span> <a class="navbar-brand" href="{{ url("/dashboard") }}">Dashboard</a></span>
        @else
            <span> <a class="navbar-brand" href="{{ url("/") }}">TestApp</a></span>
        @endif

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
       <li>
            @if(auth()->check() && auth()->user()->canEdit(auth()->user()))
                <span class="mr-5"><a href="{{ url('/cart') }}">Cart</a></span>
                <span><a class="btn btn-primary" href="{{ url('/logout') }}">Log out</a></span>
            @else
                <span><a class="btn btn-primary" href="{{ url('/login') }}">Log in</a></span>
            @endif
      </li>
  </div>
</nav>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="product">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Product price</th>
                        <th scope="col">Product category</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $singleProduct)
                            <tr>
                                <td>{{ $singleProduct->id }}</td>
                                <td>{{ $singleProduct->product_name }}</td>
                                <td>{{ $singleProduct->product_price }}</td>
                                <td>{{ $singleProduct->product_category }}</td>
                                <td><a class="btn btn-primary" href="{{ url('/cart'). '/' .  $singleProduct->id }}">Add cart</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
  </body>
</html>
