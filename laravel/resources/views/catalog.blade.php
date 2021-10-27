<!doctype html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            <title>Product Catalog</title>
            
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        </head>
        <body>
            <!-- <div class="links">
            <a href="{{ config('app.url')}}">Home</a>
            </div>
            <div class="links">
            <a href="{{ route('test')}}">cart</a>
            </div>
            <div class="links">
            <a href="{{ route('test2')}}">resetCart</a>
            </div> -->
            <!--  Navigation Bar  --> 
            <nav class="navbar navbar-expand-sm bg-light navbar-light">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('admin')}}">Home</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
            <!-- End of  Navigation Bar  --> 
            
            <div class="container">
                <div class ="col-md-8">
                    <h1>ProductCatalog</h1>
                    @error('quantity')
                        <div class="alert alert-danger alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    @if(session()->has('msg'))
                        <div class="alert alert-danger alert-block">
                            <strong>{{ session()->get('msg') }}</strong>
                        </div>
                    @endif
                    <form action ="{{route('catalog') }}" method="post">
                        @csrf
                        <label>Group BY</label>
                        <div class="input-group">
                            <select name ="productVendor" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" >
                                <option selected>productVendor</option>
                                <option value ='0'>none</option>
                                @foreach($vendor as $vendor)
                                <option>{{$vendor->productVendor}}</option>
                                @endforeach
                            </select>
                            <!-- <button class="btn btn-outline-secondary" type="button">Select</button> -->
                            <select name ="productScale" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name ="productVendor">
                                <option selected>productScale</option>
                                <option value ='0'>none</option>
                                @foreach($scale as $scale)
                                <option>{{$scale-> productScale}}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-secondary" type="submit">Group</button>
                        </div>
                    </form>
                    
                </div>
                <div class = "row">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>ProductName</th>
                            <th>ProductVendor</th>
                            <th>ProductScale</th>
                            <th>quantityInStock</th>
                            <th>Price</th>
                            <th>BuyQty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $row)
                            <tr>
                            <th>{{$row ->productCode}}</th>
                            <td>{{$row ->productName}}</td>
                            <td>{{$row ->productVendor}}</td>
                            <td>{{$row ->productScale}}</td>
                            <td>{{$row ->quantityInStock}}</td>
                            <td>{{$row ->MSRP}}</td>
                            <form action ="{{route('cart.store')}}" method = "post">
                                @csrf
                                <td><input type ="number" name="quantity"></td>
                                <td><input type ="hidden" value ="{{$row ->productCode}}" name = "productCode"></td>
                                <td><input type ="hidden" value ="{{$row ->productName}}" name = "productName"></td>
                                <td><input type ="hidden" value ="{{$row ->MSRP}}" name = "price"></td>
                                <td><button>BUY</button>
                                </td>
                            </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <div class ="d-flex justify-content-center">
                            {!! $products->links() !!}
                        </div>
                        
                </div>
                <div class = "row">
                    <div align = "right">
                        
                        <button class="btn btn-secondary btn-lg btn btn-success" type="button" onclick="window.location='{{ route("cart.index") }}'">CheckIn</button>
                    </div>
                    
                </div>
                
            </div>
        </body>
    </html>