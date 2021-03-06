<html lang="{{ app()->getLocale() }}">
<head>
    <title>Promotion code</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

    <nav class="navbar navbar-expand-sm bg-light navbar-light">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('admin')}}">Home</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
    <div class="py12">
        <div class="container">
            <div class="row">
                <div>
                    <div>
                        <div align="center">
                            <h1>Promotion code</h1>
                        </div>
                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Code ID</th> 
                                <th scope="col">Discount</th>
                                <th scope="col">Expire Date</th>
                                <th scope="col">Timeused</th>
                                <th scope="col">Description</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($promotioncode as $row)
                            <tr>
                                <th>{{$row->codeID}}</th>
                                <td>{{$row->discount}}</td>
                                <td>{{$row->expDate}}</td>
                                <td>{{$row->timeused}}</td>
                                <td>{{$row->description}}</td>
                                <form action="{{url('/promotioncode/delete')}}">
                                @csrf
                                <td>
                                    <input type="hidden" value="{{$row->codeID}}"name="codeID">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <h2>Create new promotion code</h2>
                    @if(session("success"))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    
                    <div class = "card-body">
                        <form action="{{route('promotion.store')}}" method="post">
                            @csrf
                            <div class="form">
                                <label for="codeID" class="col-md-2">codeID</label> 
                                <label for="discount" class="col-md-3">discount</label>
                                <label for="expDate" class="col-md-2">expDate</label> 
                                <label for="Timeused" class="col-md-2">Timeused</label> 
                                <label for="description">description</label> <br>
                                <input type="text" name="codeID" class="col-md-2">
                                <input type="number" name="discount">
                                <input type="date" name="expDate" class="col-md-3">
                                <input type="number" name="timeused" class="col-md-2">
                                <input type="text" name="description" class="col-md-3">
                                @error('codeID') <div class="my-1"><span class="text-danger">{{$message}}</span></div> @enderror
                                @error('discount') <div class="my-1"><span class="text-danger">{{$message}}</span></div> @enderror
                                @error('timeused') <div class="my-1"><span class="text-danger">{{$message}}</span></div> @enderror
                                @error('description') <div class="my-1"><span class="text-danger">{{$message}}</span></div> @enderror
                                @if(session()->has('msg'))
                                <div class="alert alert-danger alert-block">
                                    <strong>{{ session()->get('msg') }}</strong>
                                </div>
                                @endif
                                <br>
                                <input type="submit" class="btn btn-primary  my-2">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class ="d-flex justify-content-center">
        {!! $promotioncode->links() !!}
    </div>
</body>

</html>