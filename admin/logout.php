<?php 
require_once('include/startup.php');


unset($_SESSION['user']);

addAlert('success', 'Successfully logged out!');

redirect('index.php');