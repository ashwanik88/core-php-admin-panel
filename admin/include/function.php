<?php
function redirect($url){
	header('Location: ' . $url);
	die;
}

function addAlert($type, $msg){
	$_SESSION['alert']['type'] = $type;
	$_SESSION['alert']['msg'] = $msg;
}

function showAlert(){
	$html = '';
	if(isset($_SESSION['alert']['type']) && !empty($_SESSION['alert']['type']) 
		&& isset($_SESSION['alert']['msg']) && !empty($_SESSION['alert']['msg'])){
		$type = $_SESSION['alert']['type'];
		$msg = $_SESSION['alert']['msg'];
		
		$html = '<div class="alert alert-'. $type .' alert-dismissible fade show" role="alert">
  <strong>'. ucfirst($type) .'!</strong> '. $msg .'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
		unset($_SESSION['alert']);
	}
	echo $html;
}

function checkLogIn(){
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])){	// logged in
		
	}else{	// not logged in
		redirect('index.php');
	}
}