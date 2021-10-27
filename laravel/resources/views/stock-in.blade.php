<html lang="{{ app()->getLocale() }}">
<head>
    <title>Stock in</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('admin')}}">Home</a>
                </li>
                
            </ul>
        </div>
    </nav>

    <div class="py12">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div>
                        <div align="center">
                            <h1>Stock in history</h1>
                        </div>
                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Stock ID</th> 
                                <th scope="col">Product number</th>
                                <th scope="col">Product name</th>
                                <th scope="col">Employee number</th>
                                <th scope="col">Order date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Last modified</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($stock_in as $row)
                            <tr>
                                <th>{{$i++}}</th>
                                <td>{{$row->productNumber}}</td>
                                <td>{{$row->productName}}</td>
                                <td>{{$row->employeeNumber}}</td>
                                <td>{{$row->orderDate}}</td>
                                <td>{{$row->amountOfProduct}}</td>
                                <td>{{$row->last_Modified}}</td>
                                <form action="{{url('/stock-in/delete/')}}">
                                @csrf
                                <td>
                                    <input type="hidden" value="{{$row->productNumber}}"name="productNumber">
                                </td>
                                <td>
                                    <input type="hidden" value="{{$row->employeeNumber}}"name="employeeNumber">
                                </td>
                                <td>
                                    <input type="hidden" value="{{$row->orderDate}}"name="orderDate">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-2">
                    <h2>Insert new stock</h2>
                    @if(session("success"))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    @if(session("employee"))
                        <div class="alert alert-danger">{{session('employee')}}</div>
                    @endif
                    <div class = "card-body">
                        <form action="{{route('stockin.store')}}" method="post">
                            @csrf
                            <div class="form">
                                <label for="productNumber">productNumber</label> <br>
                                <input type="text" name="productNumber"><br>
                                <label for="employeeNumber">employeeNumber</label><br>
                                <input type="text" name="employeeNumber"><br>
                                <label for="orderDate">orderDate</label><br>
                                <input type="date" name="orderDate"><br>
                                <label for="amountOfProduct">amountOfProduct</label><br>
                                <input type="text" name="amountOfProduct"><br>
                                @error('productNumber') <div class="my-1"><span class="text-danger">{{$message}}</span></div> @enderror
                                @error('employeeNumber') <div class="my-1"><span class="text-danger">{{$message}}</span></div> @enderror
                                @error('orderDate') <div class="my-1"><span class="text-danger">{{$message}}</span></div> @enderror
                                @error('amountOfProduct') <div class="my-1"><span class="text-danger">{{$message}}</span></div> @enderror
                                <br>
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class ="d-flex justify-content-center">
        {!! $stock_in->links() !!}
    </div>
</body>

</html>