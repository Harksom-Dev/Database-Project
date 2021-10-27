<form class="row g-3" action="{{route('updateAddress')}}" method="POST">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @csrf
                        <!--<fieldset disabled> -->
                        <div class="col-8 cusNo">
                                <label for="customerNumber" class="form-label">Customer No:</label>  <span style="color: red !important; display: inline; float: none;">*</span> 
                                <input id ="customerNumber" type="text" class="form-control" name="customerNumber" value="" readonly>
                        </div>
                        <div class="col-8 addrl1">
                                <label for="addressLine1" class="form-label">address Line 1:</label>  <span style="color: red !important; display: inline; float: none;">*</span> 
                                <input id ="addressLine1" type="text" class="form-control" name="addressLine1" value="" required>
                        </div>
                        <div class="col-8 addrl2">
                                <label for="addressLine2" class="form-label">address Line 2:</label>  <span style="color: red !important; display: inline; float: none;">*</span> 
                                <input id ="addressLine2" type="text" class="form-control" name="addressLine2" value="" placeholder="address line 2 " required>
                        </div>
                        <div class="col-8 city">
                                <label for="city" class="form-label">city:</label>  <span style="color: red !important; display: inline; float: none;">*</span> 
                                <input id ="city" type="text" class="form-control" name="city" value="" required>
                        </div>
                        <div class="col-8 state">
                                <label for="state" class="form-label">state:</label>  <span style="color: red !important; display: inline; float: none;">*</span> 
                                <input id ="state" type="text" class="form-control" name="state" value="" required>
                        </div>
                        <div class="col-8 postalCode">
                                <label for="postalCode" class="form-label">postalCode:</label>  <span style="color: red !important; display: inline; float: none;">*</span> 
                                <input id ="postalCode" type="text" class="form-control" name="postalCode" value="" required>
                        </div>
                        <div class="col-8 country">
                                <label for="country" class="form-label">country:</label>  <span style="color: red !important; display: inline; float: none;">*</span> 
                                <input id ="country" type="text" class="form-control" name="country" value="" required>
                        </div>
                        <div class="hiddenid">
                                <input type="hidden" id="addressIDPhi" name="addressIDPhi" value="">
                        </div>
                        <div class="col-7 pA">
                        <label for="primaryaddres" class="form-label">Primary Address:</label>  <span style="color: red !important; display: inline; float: none;">*</span> 
                                <!-- <input id ="primaryaddres" type="text" class="form-control" name="primaryaddres" value="" required> -->
                                <select id="primaryaddres" name="primaryaddres" class="form-control" required>
                                        <option class="ph1" value=""></option>        
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                </select>
                                <i>*set to 1 to make it Primary Address</i>
                        </div>
                        <!--</fieldset>-->  
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm Changes</button>
                </div>
        </div>
</form>