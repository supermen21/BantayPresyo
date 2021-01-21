

  <!-- MODAL: EDIT USER -->
  <div class="modal fade" id="editUser<?=$rowresult['USERID'];?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
      <form method="post">
        <div class="modal-content">      
        <div class="modal-body modal-bg">
          <input type="hidden" class="form-control" name="txtuserid" value="<?=$rowresult['USERID'];?>" required>
         

          <!-- NAME -->
          <?php $userid=$rowresult['USERID'];?>

          <div class="container-fluid px-3 py-0">
           <div class="col-lg-12 bg-white border p-3">
             <div class="form-row">
                <div class="col-lg-12">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit User Profile</h1>
                </div>
            
            <div class="col-lg-12">
             <!-- Data Table -->
              <div style="font-size: 0.9rem;">
                <div class="form-row mt-3 border">
                  <div class="col-lg-2 mt-3">
                   <label></label>Prefix</label>
                    <select class="form-control" name="txtprefixname" required>
                      <option value="<?=$rowresult['PREFIX_NAME'];?>"><?=$rowresult['PREFIX_NAME'];?></option>
                      <option disabled>-------------</option>   
                      <option value="MR">MR.</option>
                      <option value="MS">MS.</option>
                    </select>
                  </div> 

                  <div class="col-lg-3 mt-3">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="txtfname" onkeyup="this.value = this.value.toUpperCase();" value="<?=$rowresult['FNAME'];?>" required>
                  </div>

                  <div class="col-lg-2 mt-3">
                    <label>Middle Initial</label>
                    <input type="text" class="form-control" name="txtmname" onkeyup="this.value = this.value.toUpperCase();" value="<?=$rowresult['MNAME'];?>">
                  </div>

                  <div class="col-lg-3 mt-3">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="txtlname" onkeyup="this.value = this.value.toUpperCase();" value="<?=$rowresult['LNAME'];?>" required>
                  </div>

                  <div class="col-lg-3 mt-2">
                    <label>Office</label>
                      <select class="form-control" name="txtoffice" required>
                        <option value="<?=$rowresult['OFFICE'];?>"><?=$rowresult['OFFICE'];?></option>
                        <option value="">Select Office</option>
                        <option value="" disabled>-----------</option>
                        <option value="Department of Agriculture">Department of Agriculture</option>
                      </select>
                  </div>

                  <div class="col-sm-4 form-group mt-2">
                    <label>Email Address</label>
                    <input type="Email" class="form-control" name="txtemail" value="<?=$rowresult['EMAILADD'];?>">
                  </div>

                    <!-- ACCOUNT INFO -->
                  <div class="col-sm-4 form-group mt-2">
                    <label>Username</label>
                    <input type="text" class="form-control" name="txtusername" value="<?=$rowresult['INFO_USERNAME'];?>" required>
                  </div>

                  <!-- PASSWORD -->
                  <div class="col-sm-4 form-group mt-2">
                    <label>Password</label>
                    <input type="password" class="form-control" name="txtpassword" value="<?=$rowresult['INFO_PASSWORD'];?>" required>
                  </div>

                   <!-- ACCOUNT TYPE -->
                  <div class="col-sm-3 form-group mt-2">
                    <label>Account Type</label>
                      <select class="form-control" name="txtaccesslevel" required>
                        <option value="<?=$rowresult['ACCESSLEVEL'];?>" selected ><?=$rowresult['ACCESSLEVEL'];?></option>
                        <option value="" disabled>Choose Type</option>
                        <option value="ADMINISTRATOR">Administrator</option>
                        <option value="VERIFIER">Verifier</option>
                        <option value="ENCODER">Encoder</option>
                      </select>
                  </div>

                  <!-- ACCOUNT STATUS -->
                  <div class="col-sm-3 form-group mt-2">
                    <label>Status</label>
                      <select class="form-control" name="txtstatus" required>
                        <option value="<?=$rowresult['INFO_STATUS'];?>" selected ><?=$rowresult['INFO_STATUS'];?></option>
                        <option value="" disabled>Choose Type</option>
                        <option value="ACTIVE">Active</option>
                        <option value="INACTIVE">Inactive</option>
                      </select>
                  </div>
                </div>
             </div>
            </div>
             </div>
            </div>

           <div class="modal-footer">
            <div class="form-group">
              <button type="submit" name="editUser" class="btn btn-success">SAVE</button>
              <button type="submit" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
          </div>
        </div>
        <!-- MODAL FOOTER - END -->
      </form> <!-- end of form method="post" -->
    </div>    <!-- end of modal-content -->
  </div>      <!-- end of modal-dialog -->
<!-- END OF MODAL -->



  