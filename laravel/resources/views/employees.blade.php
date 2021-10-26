<!DOCTYPE html>
<html lang="en">
<head>
    <!-- style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi Employee</title>
</head>
<body>
    <h1> Employees Management</h1>
    <div class="container">
        <form class="d-flex sticky-top" style=" width: 50%; margin-left: 20%; margin-top: 2%;">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" method="post">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    
    <div class="py-12">
        <div class="container" style="margin-top: 5%;">
            <div class="row"  >
                @foreach($employees as $row)
                    <div class="card col-4  margin-bottom border" style="width: 20rem; margin-left: 2%;">
                        <img src="#" alt="#" style="width:100%" class="card-img-top">
                        <div class="card-body">
                            <p class= "card-title" ><b>{{$row->jobTitle}} {{$row->firstName}} {{$row->lastName}}</b></p>
                            <p class="card-text">EmployeeNumber : {{$row -> employeeNumber}}</p>
                            <p class="card-text">Email: {{$row -> email}}</p>
                            <button type="button" class="btn btn-outline-info btn-sm" style="">ReadMore</button>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$employees -> links()}}
        </div>
        
        
    </div>



</body>
</html>