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
        <title>Hi customer</title>
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
        <h1 style="text-align: center; text-transform: uppercase; color: #581845;"> Edit Employee </h1>


        <!-- CONTAINER  -->
        <div class="container mt-3 " align="center">
        <div class="col-md-8">
            <div class="card">
                <!-- Start HERE -->
                <!-- Form-->
        <form action="{{ url('/employees/update/'.$employees[0]->employeeNumber)}}"  method="POST">    
            <div class="content">
                {{ method_field('patch') }} 
                {{ csrf_field() }}
                <div class="modal-body" id="detail">
                    <fieldset disabled>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">ID</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="employeeID" value="{{$employees[0]->employeeNumber}}" required >
                        </div>
                    </fieldset>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">First Name</span>
                        <input  name="firstName"" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="firstName" value="{{$employees[0]->firstName}}" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Last Name</span>
                        <input   name="lastName" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="lastName" value="{{$employees[0]->lastName}}" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Extension</span>
                        <input  name="extension" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="extension" value="{{$employees[0]->extension}}" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Email: </span>
                        <input  name="email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="email"  value="{{$employees[0]->email}}" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Office-Code</span>
                        <input  name="ofcode" ype="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="ofcode"  value="{{$employees[0]->officeCode}}"required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Report To</span>
                        <input name="reportsTo" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="reportTo"  value="" placeholder="Report to">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">jobTitle:</span>
                        <select id="jobtitle" name="jobtitle" class="form-control" >
                            <option value="{{$employees[0]->jobTitle}}">{{$employees[0]->jobTitle}}</option>
                            <option value="President">President</option>
                            <option value="VP Sales">VP Sales</option>
                            <option value="VP Marketing">VP Marketing</option>
                            <option value="Sales Manager">Sales Manager</option>
                            <option value="Sales Rep">Sales Rep</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{url('/employees/softdelete/'.$employees[0]->employeeNumber)}}" class="btn btn-outline-danger btn-sm fa fa-trash"  onclick="return confirm('Are you certain that you want to delete ?')"></a>
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Close</button>
                    <button type="SUBMIT" class="btn btn-primary" onclick="return confirm('Do you want to save changes?')">Update</button>
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