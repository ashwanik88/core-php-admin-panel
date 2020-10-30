<?php require_once('include/startup.php'); 
checkLogIn();
?>
<?php require_once('common/header.php'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Users</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add New User</a>
          </div>
			
			
			          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Date Added</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					$sql = "SELECT * FROM manage_user";
					$rs = mysqli_query($conn, $sql);
					
					if(mysqli_num_rows($rs)){
						while($rec = mysqli_fetch_assoc($rs)){
							?>
							
                    <tr>
                      <td><input type="checkbox" /></td>
                      <td><?php echo $rec['user_id']; ?></td>
                      <td><?php echo $rec['username']; ?></td>
                      <td><?php echo $rec['firstname']; ?></td>
                      <td><?php echo $rec['lastname']; ?></td>
                      <td><?php echo $rec['email']; ?></td>
                      <td><?php echo $rec['phone']; ?></td>
                      <td><?php echo ($rec['status'] == '1')?'Active':'Inactive'; ?></td>
                      <td><?php echo $rec['date_added']; ?></td>
                      <td>Edit</td>
                    </tr>
					
							<?php
						}
					}
				  ?>
					
                  </tbody>
                </table>
              </div>
            </div>
          </div>



       
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php require_once('common/footer.php'); ?>