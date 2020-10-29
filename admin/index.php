<?php 
require_once('include/startup.php');

// echo '<pre>';
// print_r($_SESSION);
// die;

$username = '';
$password = '';
$remember = '';

function validateUser($conn, $username, $password){
	$sql = "SELECT * FROM `manage_user` WHERE username='". $username ."' AND password='". md5($password) ."'";
	
	$rs = mysqli_query($conn, $sql);
	if(mysqli_num_rows($rs) > 0){
		$_SESSION['user'] = mysqli_fetch_assoc($rs);
		
		if(isset($_POST['remember']) && !empty($_POST['remember'])){
			setcookie('username', $username, time() + (3600 * 24 * 30), '/'); // expire after 1 month
			setcookie('password', $password, time() + (3600 * 24 * 30), '/');
		}
		
		addAlert('success', 'Successfully logged in!');
		redirect('dashboard.php');
		
	}else{	// wrong password
		addAlert('danger', 'Wrong password!');
		redirect('index.php');
	}	
}

if(isset($_COOKIE['username']) && !empty($_COOKIE['username']) && isset($_COOKIE['password']) && !empty($_COOKIE['password'])){
	$username = $_COOKIE['username'];
	$password = $_COOKIE['password'];
	$remember = 'on';
	
	validateUser($conn, $username, $password);
}


if($_POST){
	if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		validateUser($conn, $username, $password);

	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login to Admin Panel</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-6 col-md-4">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login to Admin Panel!</h1>
                  </div>
				  <?php showAlert(); ?>
                  <form method="POST" action="" class="user">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Enter Username" required value="<?php echo $username; ?>">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"  required value="<?php echo $password; ?>">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" <?php echo ($remember == 'on')?'checked="checked"':''; ?>>
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login" />
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>
