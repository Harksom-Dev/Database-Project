<!DOCTYPE html>
<html lang="en">
<head>
        <!-- style -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
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
    <title>Hi Employee</title>
</head>

        <!--  Navigation Bar  --> 
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('admin')}}">home</a>
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
    @if(session("success"))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    @if(session("deleted"))
            <div class="alert alert-danger">{{session('deleted')}}</div>
    @endif
        @error('firstName') <div class="my-1"><span class="text-danger">{{$message}}</span></div> @enderror
        @error('lastName') <div class="my-1"><span class="text-danger">{{$message}}</span</div> @enderror
        @error('extension') <div class="my-1"><span class="text-danger">{{$message}}</span></div>@enderror
        @error('email') <div class="my-1"><span class="text-danger">{{$message}}</span></div>@enderror
        @error('officeCode') <div class="my-1"><span class="text-danger">{{$message}}</span></div>@enderror
        @error('jobTitle') <div class="my-1"><span class="text-danger">{{$message}}</span></div>@enderror

        <body>
            <h1 style="text-align: center; text-transform: uppercase; color: #581845;"> Employee Management </h1>

                    <!--  Search box -->
                    <div class="" style=" width: 50%; margin: auto;">
                    <div class="">
                        <form class="d-flex" action="{{ route('employee') }}" method="GET" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control mr-2" name="term" placeholder="Employeee Name, Employee NO. or Job Title" id="term">
                                <a href="{{ route('employee') }}" class=" mt-1">
                                    <span class="input-group-btn  mt-1">
                                        <button class="btn " type="submit" title="Search Employee">
                                        <i class="fa fa-search"></i> 
                                        </button>
                                    </span>
                                    <span class="input-group-btn">
                                        <button class="btn " type="button" title="Refresh page">
                                            clear
                                        </button>
                                    </span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end of search box -->

                <div class="container mt-3" align ="center" style="margin-top: 5%;">
                    <div align="left" style="padding-bottom: 1%;">  
                            <button type="button" class="btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addEmployee">New Employee</button> 
                    </div>
                    <div class="row">
                        @foreach($employees as $row)
                            <div class="card col-4  margin-bottom border" style="width: 30%; padding: 25px 50px 15px 50px; ">
                                <div class="card-body">
                                    <p class= "card-title" ><b>{{$row->jobTitle}} {{$row->firstName}} {{$row->lastName}}</b></p>
                                    <p class="card-text">ID : {{$row -> employeeNumber}}</p>
                                    <a href="{{url('/employees/edit/'.$row->employeeNumber)}}" class="btn btn-outline-dark btn-sm edit_btnnaja" >More..</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$employees -> links()}}
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployee" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        @include('popup.addEmployee');
                    </div>
                </div>
                <!-- END IF MODEL --> 

        </body>
</html>