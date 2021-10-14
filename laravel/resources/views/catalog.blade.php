<!doctype html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            <title>View Products | Product Store</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
            <!-- Styles -->
            <link rel="stylesheet" type="text/css" href="/css/main.css">
        </head>
        <body>
            <div class="links">
            <a href="{{ config('app.url')}}">Home</a>
            </div>
            <div>
                @foreach($employee as $employee)
                <h1>{{$employee -> lastName}}  {{$employee -> firstName}} {{$employee -> employeeNumber}}</h1>
                @endforeach
            </div>
            <script>
                function test(){
                    document.getElementById("demo").innerHTML = "Hello JavaScript!";
                }
                
            </script>
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <h1>Available products</h1>
                    <table>
                        <thead>
                            <td>productCode</td>
                            <td>productName</td>
                            <td>productLine</td>
                            <td>productScale</td>
                            <td>productVendor</td>
                            <td>productDescription</td>
                            <td>buyPrice</td>
                            <td>MSRP</td>
                            <td>QuantityToBuy</td>
                        </thead>
                    
                        <tbody>
                            @foreach( $product as $data )
                            <tr>
                                <form action= "{{route('addorderDetail')}}" method ="post">
                                    @csrf
                                    <td>{{ $data->productCode }}</td>
                                    <td class="inner-table">{{ $data->productName }}</td>
                                    <td class="inner-table">{{ $data->productLine }}</td>
                                    <td class="inner-table">{{ $data->productScale }}</td>
                                    <td class="inner-table">{{ $data->productVendor }}</td>
                                    <td class="inner-table">{{ $data->productDescription }}</td>
                                    <td class="inner-table" name="buyPrice">{{ $data->buyPrice }}</td>
                                    <td class="inner-table">{{ $data->MSRP }}</td>
                                    <td>  
                                        <div class="mb-3">
                                        <input type="number" class="form-control" name="quantity">
                                        </div>
                                    </td>
                                    <td><button type="submit" class="btn btn-primary" onclick= >BUY</button> </td> 
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @error('quantity')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <h1>confirm buy</h1>
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"></span>
                <input type="text" class="form-control" placeholder="CustomerNumber" aria-label="CustomerNumber" aria-describedby="basic-addon1">
            </div>
            </div>
        </body>
    </html>
