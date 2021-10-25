<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title class>Stock-in</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="py12">
        <div class="container">
            <div class="row">
                <!-- <div class = "col-md-8">
                    <div class="table">
                        <div class="card-header">Stock in history</div>
                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product number</th>
                                <th scope="col">Employee number</th>
                                <th scope="col">Order date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Last modified</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($stock_in as $row)
                            <tr>
                                <th>{{$i++}}</th>
                                <td>{{$row->productNumber}}</td>
                                <td>{{$row->employeeNumber}}</td>
                                <td>{{$row->orderDate}}</td>
                                <td>{{$row->amountOfProduct}}</td>
                                <td>{{$row->last_Modified}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div> -->
                    <div  >
                        <h1 class=container4>Insert new stock</h1>
                    </div>
                    <div class = "card-body">
                        <form action="" method="post">
                            <div>
                                <label for="productNumber" class = "col-md-2">productNumber</label>
                                <label for="employeeNumber" class = "col-md-3">employeeNumber</label>
                                <label for="orderDate" class = "col-md-2">orderDate</label>
                                <label for="amountOfProduct" class = "col-md-2">amountOfProduct</label>
                                <label for="last_Modified" class = "col-md-2">last_Modified</label>
                                <input type="text" class="col-md-2" name="productNumber">
                                <input type="text" class="col-md-3" name="employeeNumber">
                                <input type="text" class="col-md-2" name="orderDate">
                                <input type="text" class="col-md-2" name="amountOfProduct">
                                <input type="text" class="col-md-2" name="last_Modified">
                                <input type="submit" value="+" class="btn btn-primary">
                            </div>
                            <input type="submit" class="Submit">
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>