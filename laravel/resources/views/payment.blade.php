<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAYMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
        <!--  Navigation Bar  --> 
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('admin')}}">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('catalog')}}">catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('cart')}}">cart</a>
                </li>
                
            </ul>
        </div>
    </nav>
    <!-- End of  Navigation Bar  --> 
    <div class = "container">
        <br>
        <div align = "center">
            <h1><strong>Payment</strong></h1>
        </div>

        <div class = "card">
            <form action ="{{route('payment.add')}}" method ="post">
                @csrf
                <div class="input-group flex-nowrap card-body " style=" width: 40rem;">
                <span class="input-group-text" id="basic-addon1 " >money Cheque</span>
                <input type="text" class="form-control" placeholder="money Cheque" name="cheque" >
                </div>

                <div class="input-group flex-nowrap card-body" style=" width: 40rem;">
                <span class="input-group-text" id="addon-wrapping">requiredDate</span>
                <input type="date" class="form-control" placeholder="yyyy-mm-dd" name ="requiredate">
                </div>

                <div class="input-group card-body" style=" width: 40rem;">
                <span class="input-group-text" id="addon-wrapping">ShippmentAddress</span>
                <select class="form-select" id="inputGroupSelect04" name="ship">
                    <option>{{$mainaddr}}</option>
                    @foreach($address as $address)
                    <option>{{$address->addressLine1}}</option>
                    @endforeach
                </select>
                </div>

                <div class="input-group card-body" style=" width: 40rem;">
                <span class="input-group-text" id="addon-wrapping">BillAddress</span>
                <select class="form-select" id="inputGroupSelect04" name="bill">
                    <option>{{$mainaddr}}</option>
                    @foreach($address2 as $address)
                    <option>{{$address->addressLine1}}</option>
                    @endforeach
                </select>
                </div>
                <input type ="hidden" value ="{{$id}}" name = "id">
                <button type="submit" class="btn btn-primary">Confirm</button>
                
                
            </form>
            @error('cheque')
                <div class="alert alert-danger alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @if(session()->has('msg'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{ session()->get('msg') }}</strong>
                    </div>
                @endif
        </div>
    </div>
</body>
</html>