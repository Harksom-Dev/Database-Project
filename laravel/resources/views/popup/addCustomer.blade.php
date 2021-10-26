<form class="row g-3"  method="POST">
{{ csrf_field() }}
    <div class="col-12">
        <label for="inputCustomerName" class="form-label">CustomerName</label>
        <input type="text" class="form-control" id="nputCustomerName">
    </div>
    <div class="col-md-6">
        <label for="inputContFName" class="form-label">contactFirstName</label>
        <input type="text" class="form-control" id="inputContFName">
    </div>
    <div class="col-md-6">
        <label for="inputContLName" class="form-label">contactLasttName</label>
        <input type="text" class="form-control" id="inputContLName">
    </div>
    <div class="col-12">
        <label for="inputAddressL1" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddressL1" placeholder="1234 Main St">
    </div>
    <div class="col-12">
        <label for="inputAddress2" class="form-label">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="col-md-4">
        <label for="inputState" class="form-label">State</label>
        <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
    </select>
    </div>
    <div class="col-md-2">
        <label for="inputZip" class="form-label">Zip</label>
        <input type="text" class="form-control" id="inputZip">
    </div>
    <div class="col-12">
    </div>

</form>