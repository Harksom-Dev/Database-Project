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
            @foreach($items as $row)
                <tr>
                <th>{{$row['name']}}</th>
                <td>{{$row['qty']}}</td>
                <td>{{$row['price']}}</td>
                <form action ="{{route('cart.remove')}}" method = "post">
                    @csrf
                    @method('delete')
                    <td><input type ="hidden" value ="{{$row['name']}}" name = "name"></td>
                    <td><button class ="btn btn-danger">REMOVE</button>
                    </td>
                </form>
                </tr>
            @endforeach
                <tr>
                <th>Total</th>
                <td>{{$totalqty}}</td>
                <td>{{$totalprice}}</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>