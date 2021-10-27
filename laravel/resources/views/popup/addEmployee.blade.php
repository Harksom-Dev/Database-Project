<form class="row g-3" action="{{route('addEmployee')}}" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @csrf
                    <div class="col-12">
                        <label for="inputfirstName" class="form-label">firstName:</label><span style="color: red !important; display: inline; float: none;">*</span>  
                        <input type="text" class="form-control" name="firstName" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputlastName" class="form-label">lastName:</label><span style="color: red !important; display: inline; float: none;">*</span>  
                        <input type="text" class="form-control" name="lastName" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputextension" class="form-label">extension:</label><span style="color: red !important; display: inline; float: none;">*</span>  
                        <input type="text" class="form-control" name="extension" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputemail" class="form-label">email:</label><span style="color: red !important; display: inline; float: none;">*</span>  
                        <input type="text" class="form-control" name="email" placeholder="example@example.com" required>
                    </div>
                    <div class="col-12">
                        <label for="inputofficeCode" class="form-label">officeCode:</label><span style="color: red !important; display: inline; float: none;">*</span>  
                        <select id="ofcode" name="ofcode" class="form-control" required>
                            <option value="1">001</option>
                            <option value="2">002</option>
                            <option value="3">003</option>
                            <option value="4">004</option>
                            <option value="5">005</option>
                            <option value="6">006</option>
                            <option value="7">007</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputreportsTo" class="form-label">reportsTo: (Optional)</label>
                        <input type="text" class="form-control" name="reportsTo"  >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">jobTitle:</label><span style="color: red !important; display: inline; float: none;">*</span> 
                        <select id="jobtitle" name="jobtitle" class="form-control" required>
                            <option value="President">President</option>
                            <option value="VP Sales">VP Sales</option>
                            <option value="VP Marketing">VP Marketing</option>
                            <option value="Sales Manager">Sales Manager</option>
                            <option value="Sales Rep">Sales Rep</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Employee</button>
            </div>
        </div>
</form>