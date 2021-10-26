<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- style -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- end script -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit</title>
    </head>
    
        <!--  Navigation Bar  --> 
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('/')}}">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('customers')}}">CustomerManagement</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{url('employees')}}">EmployeeManagement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End of  Navigation Bar  --> 

    <body>
        <h1 style="text-align: center; text-transform: uppercase; color: #581845;"> Edit ORDER </h1>
        

        <!-- CONTAINER  -->
        <div class="container mt-3 " align="center">
        <div class="col-md-8">
            <div class="card">
                <!-- Start HERE -->

                <!-- Form-->
                                                <form action="{{route('order.addedit')}}"method="POST">    
                                                    <div class="content">
                                                        
                                                        @csrf
                                                        <div class="container">
                                                        </div>
                                                            <div class="modal-body" id="detail">
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <span class="input-group-text" id="inputGroup-sizing-sm">shippedDate</span>
                                                                    <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="customerID" value="{{$shipD}}" name = "date" >
                                                                </div>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <span class="input-group-text" id="inputGroup-sizing-sm">status</span>
                                                                    <select name ="status" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" >
                                                                        <option>{{$status}}</option>
                                                                        @foreach($allstatus as $row)
                                                                        <option>{{$row->status}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="input-group-sm mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="">comment</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="comment" value = "{{$comment}}" name = "comment">
                                                                    
                                                                </div>

                                                        <div class="modal-footer">
                                                            <input type ="hidden" value ="{{$orderid}}" name = "orderid">
                                                            <button type="SUBMIT" class="btn btn-primary">Update</button>
                                                        </div>
                                                        
                                                        </div>
                                                    </form>
                                                    <!-- End of FORM -->

                <!-- end HERE -->
            </div>
        </div>
        
            
        </div>



    </body>
</html>