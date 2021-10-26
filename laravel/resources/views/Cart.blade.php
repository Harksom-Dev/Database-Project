<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
        <div class="links">
        <a href="{{ route('test')}}">cart</a>
        </div>
    <br>
    <br>
    <div class = "container">
        <div align = "center">
        <h1><strong>Your Order</strong></h1>
        </div>
        <div class = "row">
            <table class="table">
            <thead>
                <tr>
                <th>Product</th>
                <th>qty</th>
                <th>price</th>
                </tr>
            </thead>
            <tbody>
            @if($items != null)
            @foreach($items as $row)
            <!-- @if($row != null) -->
                <tr>
                <th>{{$row['name']}}</th>
                <td>{{$row['qty']}}</td>
                <td>{{$row['price']}}</td>
                <form action ="{{route('cart.remove')}}" method = "post">
                    @csrf
                    @method('delete')
                    <td><input type ="hidden" value ="{{$row['name']}}" name = "name"></td>
                    <td><input type ="hidden" value ="{{$row['id']}}" name = "id"></td>
                    <td><button class ="btn btn-danger">REMOVE</button>
                    </td>
                </form>
                </tr>
                <!-- @endif -->
            @endforeach
                <tr>
                <th>Total</th>
                <td>{{$totalqty}}</td>
                <td>{{$totalprice}}</td>
                </tr>
            @else
            <tr>
                <th>Total</th>
                <td>0</td>
                <td>0</td>
                </tr>
            @endif
                
            </tbody>
        </table>
        </div>
        <div class = card style="width: 40rem;">
            
            <form action = "{{route('order.add')}}" method = "post">
                @csrf
                <!-- @method('get') -->
                <div class ="card-title">
                    
                    <label>Discount Code</label>
                </div>
                
                <div class="input-group card-body" >
                    <input type="text" class="form-control" placeholder="Discount Code" aria-describedby="button-addon2" name = "code">
                    <input type="text" class="form-control" placeholder="customerNumber" aria-describedby="button-addon2" name = "customerNumber">
                    <button class="btn btn-secondary btn-lg btn btn-success" type="submit" >Confirm</button>
                    
                </div>
                @error('customerNumber')
                        <div class="alert alert-danger alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                @enderror
                @if(session()->has('msg'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{ session()->get('msg') }}</strong>
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>