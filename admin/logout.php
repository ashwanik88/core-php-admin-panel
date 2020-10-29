<?php 
require_once('include/startup.php');


unset($_SESSION['user']);

setcookie('username', $username, time() - (3600 * 24 * 30), '/'); // expire after 1 month
setcookie('password', $password, time() - (3600 * 24 * 30), '/');

addAlert('success', 'Successfully logged out!');

redirect('index.php');