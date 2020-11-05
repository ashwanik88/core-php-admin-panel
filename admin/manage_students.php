<?php require_once('include/startup.php'); 
checkLogIn();

$sql = "SELECT * FROM manage_student";

$order = '';

if(isset($_GET['sort']) && !empty($_GET['sort']) && isset($_GET['order']) && !empty($_GET['order'])){
	$sort = $_GET['sort'];
	$order = $_GET['order'];
	$sql .= " ORDER BY ". $sort ." " . $order;
}
echo $sql;

$rs = mysqli_query($conn, $sql);

?>
<?php require_once('common/header.php'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Students</h1>
            <a href="form-user.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add New User</a>
          </div>
			
			
			          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Student Listing</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><input type="checkbox" /></th>
                      <th><a href="manage_students.php?sort=student_id&order=<?php echo ($order == 'ASC')?'DESC':'ASC'; ?>">Student ID</a></th>
                      <th><a href="manage_students.php?sort=student_name&order=<?php echo ($order == 'ASC')?'DESC':'ASC'; ?>">Name</a></th>
                      <th><a href="manage_students.php?sort=roll_number&order=<?php echo ($order == 'ASC')?'DESC':'ASC'; ?>">Roll No</a></th>
                      <th><a href="manage_students.php?sort=status&order=<?php echo ($order == 'ASC')?'DESC':'ASC'; ?>">Status</a></th>
                      <th><a href="manage_students.php?sort=date_added&order=<?php echo ($order == 'ASC')?'DESC':'ASC'; ?>">Date Added</a></th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					
					
					if(mysqli_num_rows($rs)){
						while($rec = mysqli_fetch_assoc($rs)){
							?>
							
                    <tr>
                      <td><input type="checkbox" /></td>
                      <td><?php echo $rec['student_id']; ?></td>
                      <td><?php echo $rec['student_name']; ?></td>
                      <td><?php echo $rec['roll_number']; ?></td>
                      <td><?php echo ($rec['status'] == '1')?'Active':'Inactive'; ?></td>
                      <td><?php echo $rec['date_added']; ?></td>
                      <td><a href = "manage_users.php">Edit</a></td>
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