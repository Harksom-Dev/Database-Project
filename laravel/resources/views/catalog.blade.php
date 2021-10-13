<!doctype html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            <title>View Products | Product Store</title>
        </head>
        <body>
            <div class="links">
            <a href="{{ config('app.url')}}">Home</a>
            </div>
            <div class="flex-center position-ref full-height">
            
                <div class="content">
                    <h1>Here's a list of available products</h1>
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
                        </thead>
                    
                        <tbody>
                            @foreach( $product as $data )
                            <tr>
                                <td>{{ $data->productCode }}</td>
                                <td class="inner-table">{{ $data->productName }}</td>
                                <td class="inner-table">{{ $data->productLine }}</td>
                                <td class="inner-table">{{ $data->productScale }}</td>
                                <td class="inner-table">{{ $data->productVendor }}</td>
                                <td class="inner-table">{{ $data->productDescription }}</td>
                                <td class="inner-table">{{ $data->buyPrice }}</td>
                                <td class="inner-table">{{ $data->MSRP }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </body>
    </html>
