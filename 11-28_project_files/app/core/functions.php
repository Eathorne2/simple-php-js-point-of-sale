<?php 


function show($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function views_path($view)
{
	if(file_exists("../app/views/$view.view.php")){
		return "../app/views/$view.view.php";
	}else{
		echo "view '$view' not found";
	}
}

function esc($str)
{
	return htmlspecialchars($str);
}

function redirect($page)
{

	header("Location: index.php?pg=" .$page);
	die;
}



function set_value($key,$default = "")
{

	if(!empty($_POST[$key]))
	{
		return $_POST[$key];
	}

	return $default;
}

function authenticate($row)
{

	$_SESSION['USER'] = $row;
}

function auth($column)
{
	if(!empty($_SESSION['USER'][$column])){
		return $_SESSION['USER'][$column];
	}

	return "Unknown";
}

