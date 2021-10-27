<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class='container'>
        <div>
            <form action ="{{route('order.index') }}">
                @csrf
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="orderID" name = "id">
                <button class="btn btn-osutline-secondary" type="submit" id="button-addon2">search</button>
                <input type ="hidden" value ='0' name = "zero">
                <button class="btn btn-osutline-secondary" type="submit" id="button-addon2">reset</button>
                </div>
            </form>
            
        </div>
    <div class = "row">
                    @if(session()->has('msg'))
                        <div class="alert alert-danger alert-block">
                            <strong>{{ session()->get('msg') }}</strong>
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                            <th>orderNumber</th>
                            <th>orderDate</th>
                            <th>requiredDate</th>
                            <th>shippedDate</th>
                            <th>shippedaddressID</th>
                            <th>billAddressID</th>
                            <th>status</th>
                            <th>comments</th>
                            <th>customerNumber</th>
                            <th>pointEarn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $row)
                            <tr>
                            <th>{{$row ->orderNumber}}</th>
                            <td>{{$row ->orderDate}}</td>
                            <td>{{$row ->requiredDate}}</td>
                            <td>{{$row ->shippedDate}}</td>
                            <td>{{$row ->shippedaddressID}}</td>
                            <td>{{$row ->billAddressID}}</td>
                            <td>{{$row ->status}}</td>
                            <td>{{$row ->comments}}</td>
                            <td>{{$row ->customerNumber}}</td>
                            <td>{{$row ->pointEarn}}</td>
                            <form action ="{{route('order.edit')}}" method = "post">
                                @csrf
                                <td><input type ="hidden" value ="{{$row ->requiredDate}}" name = "reqdate"></td>
                                <td><input type ="hidden" value ="{{$row ->status}}" name = "status"></td>
                                <td><input type ="hidden" value ="{{$row ->comments}}" name = "comments"></td>
                                <td><input type ="hidden" value ="{{$row ->orderNumber}}" name = "orderid"></td>
                                <td><button type ="submit">EDIT</button>
                                </td>
                            </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <div class ="d-flex justify-content-center">
                            {!! $order->links() !!}
                        </div>
                        
                </div>
    </div>
</body>
</html>