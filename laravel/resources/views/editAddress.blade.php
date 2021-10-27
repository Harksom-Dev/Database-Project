<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- style -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
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
        <title>Address Management</title>
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
        <h1 style="text-align: center; text-transform: uppercase; color: #581845;"> Address MAnagement</h1>
        @if(session("msg"))
            <div class="alert alert-danger">{{session('msg')}}</div>
        @endif
        @if(session("success"))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        @if(session("deleted"))
            <div class="alert alert-danger">{{session('deleted')}}</div>
        @endif
        <!-- CONTAINER  -->
        <div class="container mt-3 " align="center">
                    <!-- Start HERE -->
                    <!-- Form-->
            <form action="{{route('addAddress')}}"  method="POST">    
                <div class="content">
                {{ method_field('patch') }} 
                {{ csrf_field() }}
                    <div class="modal-body" id="detail">
                        <fieldset disabled>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ID</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="customerID" value="{{$customers[0]->customerNumber}}">
                            </div>
                        </fieldset>
                        @if(session("success"))
                            <div class="alert alert-succees">{{session('succees')}}</div>
                        @endif
                        <!-- table --->

                        <table class="table">
                            <thead>
                                <tr>  
                                    <th scope="col">addressid</th>
                                    <th scope="col">addressLine1</th>
                                    <th scope="col">addressLine2</th>
                                    <th scope="col">city</th>
                                    <th scope="col">state</th>
                                    <th scope="col">postalCode</th>
                                    <th scope="col">Country </th>
                                    <th scope="col">   </th>
                                    <th scope="col">   </th>
                                    <th scope="col">defult</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $row)
                                    <tr>
                                        <td>{{$row->addressid}}</td>
                                        <td>{{$row->addressLine1}}</td>
                                        <td>{{$row->addressLine2}}</td>
                                        <td>{{$row->city}}</td>
                                        <td>{{$row->state}}</td>
                                        <td>{{$row->postalCode}}</td>
                                        <td>{{$row->country}}</td>
                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target="#editAddress" class="btn btn-dark btn-sm edit_btnnaja" 
                                            data-bs-addrId="{{$row->addressid}}" 
                                            data-bs-cusNo="{{$row->customerNumber}}"
                                            data-bs-addrl1="{{$row->addressLine1}}" 
                                            data-bs-addrl2="{{$row->addressLine2}}" 
                                            data-bs-city="{{$row->city}}"
                                            data-bs-state="{{$row->state}}"
                                            data-bs-postalCode="{{$row->postalCode}}"
                                            data-bs-pA = "{{$row ->primaryaddress}}"
                                            data-bs-country="{{$row->country}}"
                                            > 
                                            <i class="bi bi-pencil-square"></i>    Edit</a></td>
                                        <td>
                                        <a href="{{url('/customers/address/delete/'.$row->addressid)}}" class="btn btn-outline-danger btn-sm fa fa-trash"  onclick="return confirm('Are you certain that you want to delete this Address?') "></a></td>
                                        <td><!-- <select name="priAddr" id="priAdddr">
                                                <option value="{{$row->primaryaddress}}">{{$row->primaryaddress}}</option>
                                        </select> -->
                                        <?php if ($row->primaryaddress == '0') { ?>
                                            <p class="h6"><sub>[edit to set default]</sub></p>
                                        <?php }else{?> <p> <mark>[Primary]</mark> </p> <?php }?>
                                    </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                            
                        </table>
                        
                        <!-- end of table -->           
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" href="{{url('/customers')}}">Close</a>
                    <a type="button" id="addAddress1" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAddress" data-bs-cusNo="{{$customers[0]->customerNumber}}"> <i class="bi bi-plus"></i> Add</a>
                </div>
                
            </form>
            <!-- End of FORM -->
            <!-- end HERE -->
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="addAddress" tabindex="-1" aria-labelledby="addAddress" aria-hidden="true">
            <div class="modal-dialog">
                @include('popup.addAddress');
            </div>
        </div>
        <!-- end of modal --> 

        <!-- Modal 2 -->
        <div class="modal fade" id="editAddress" tabindex="-1" aria-labelledby="editAddress" aria-hidden="true">
            <div class="modal-dialog">
                @include('popup.editAddr');
            </div>
        </div>
        <!-- end of modal --> 

        <script type="text/javascript">

            $('.mk-def').click(function () {
                var button = event.relatedTarget
                var data = button.getAttribute('data-bs-mdk');
                
                
            });











            var addAddressModal = document.getElementById('addAddress')
            addAddressModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-cusNo');
                
                var modalTitle = addAddressModal.querySelector('.modal-title');
                var modalBodyInput = addAddressModal.querySelector('.idN input');
                
                modalTitle.textContent = 'new address of user :' + recipient
                modalBodyInput.value = recipient
            });


            var editAddressModal = document.getElementById('editAddress')
            editAddressModal.addEventListener('show.bs.modal', function (event) {
                var bt = event.relatedTarget
                var addrId = bt.getAttribute('data-bs-addrId');
                var cusNo = bt.getAttribute('data-bs-cusNo');
                var addrL1 = bt.getAttribute('data-bs-addrl1');
                var addrL2 = bt.getAttribute('data-bs-addrl2');
                var city = bt.getAttribute('data-bs-city');
                var state = bt.getAttribute('data-bs-state');
                var postalCode = bt.getAttribute('data-bs-postalCode');
                var country = bt.getAttribute('data-bs-country');
                var praddr = bt.getAttribute('data-bs-pA');

                var addrIDInput = editAddressModal.querySelector('.hiddenid input');
                var modalTitle = editAddressModal.querySelector('.modal-title');
                var cusNoInput = editAddressModal.querySelector('.cusNo input');
                var addrl1Input = editAddressModal.querySelector('.addrl1 input');
                var addrl2Input = editAddressModal.querySelector('.addrl2 input');
                var cityInput = editAddressModal.querySelector('.city input');
                var stateInput = editAddressModal.querySelector(' .state input');
                var postalCodeInput = editAddressModal.querySelector('.postalCode input');
                var countryInput = editAddressModal.querySelector('.country input');
                var paddrInput = editAddressModal.querySelector('.ph1');
                
                modalTitle.textContent = 'Edit address of ' + cusNo;
                
                cusNoInput.value = cusNo;
                addrl1Input.value = addrL1;
                addrl2Input.value = addrL2;
                cityInput.value = city;
                stateInput.value = state;
                postalCodeInput.value = postalCode;
                countryInput.value = country;
                addrIDInput.value = addrId;
                var a ;
                if(praddr == 1) a= 'Yes';
                else a='No';
                
                paddrInput.textContent = a;
                paddrInput.value = praddr;
            })
        </script>

        <!-- END IF MODEL -->  
    </body>
</html>