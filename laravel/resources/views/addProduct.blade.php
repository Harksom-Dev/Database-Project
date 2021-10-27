<html lang="{{ app()->getLocale() }}">
<head>
    <title>Insert new product</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <div class="py12">
        <div class="container">
            <div class="row">
                <div align="center">
                    <h2>Insert new product</h2>
                    @if(session("success"))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    @if(session("noproduct"))
                        <div class="alert alert-danger">{{session('noproduct')}}</div>
                    @endif
                    <div class = "card-body">
                        <form action="{{route('product.store')}}" method="post">
                            @csrf
                            <div class="form">
                                <label for="productCode">product Code</label> <br>
                                <input type="text" name="productCode"><br>
                                <label for="productName">product Name</label><br>
                                <input type="text" name="productName"><br>
                                <label for="productLine">productLine</label><br>
                                <input type="text" name="productLine"><br>
                                <label for="productScale">productScale</label><br>
                                <input type="text" name="productScale"><br>
                                <label for="productVendor">product Vendor</label><br>
                                <input type="text" name="productVendor"><br>
                                <label for="productDescription">product Description</label><br>
                                <input type="text" name="productDescription"><br>
                                <label for="buyPrice">buy Price</label><br>
                                <input type="text" name="buyPrice"><br>
                                <label for="MSRP">MSRP</label><br>
                                <input type="text" name="MSRP"><br>
                                <br>
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>