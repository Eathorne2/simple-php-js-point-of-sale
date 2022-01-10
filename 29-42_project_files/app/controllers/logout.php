<?php 


if(isset($_SESSION['USER'])){
	unset($_SESSION['USER']);
}

//session_destroy();
//session_regenerate_id();

redirect('login');