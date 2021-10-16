<!doctype html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            <title>Product Catalog</title>
            
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        </head>
        <body>
            <div class="links">
            <a href="{{ config('app.url')}}">Home</a>
            </div>
            
            <div class="container">
            <div class ="col-md-8">
                <h1>ProductCatalog</h1>
                <form>
                    <label>Group BY</label>
                    <div class="input-group">
                        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                            <option selected>productVendor</option>
                            <option value ='0'>none</option>
                            @foreach($vendor as $vendor)
                            <option value={{$vendor->productVendor}}>{{$vendor->productVendor}}</option>
                            @endforeach
                        </select>
                        <!-- <button class="btn btn-outline-secondary" type="button">Select</button> -->
                        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                            <option selected>productScale</option>
                            <option value ='0'>none</option>
                            @foreach($scale as $scale)
                            <option value={{$scale-> productScale}}>{{$scale-> productScale}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-outline-secondary" type="button">Group</button>
                    </div>
                </form>
                
            </div>
                <div class = "row">
                <table class="table">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>ProductName</th>
                        <th>quantityInStock</th>
                        <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $row)
                        <tr>
                        <th>{{$row ->productCode}}</th>
                        <td>{{$row ->productName}}</td>
                        <td>{{$row ->quantityInStock}}</td>
                        <td>{{$row ->MSRP}}</td>
                        <td><input type ="submit" value ="BUY"></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
           
        </body>
    </html>