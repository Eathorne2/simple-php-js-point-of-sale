<?php 

$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$user = new User();
 	if($row = $user->where(['email'=>$_POST['email']]))
 	{
  	 
 		if(password_verify($_POST['password'], $row[0]['password']))
 		{
 			authenticate($row[0]);
			redirect('home');
 		}else
	 	{
	 		$errors['password'] = "wrong password";
	 	}
 	}else
 	{
 		$errors['email'] = "wrong email";
 	}


}

require views_path('auth/login');

