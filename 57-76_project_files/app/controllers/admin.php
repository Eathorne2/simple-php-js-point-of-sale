<?php 

$tab = $_GET['tab'] ?? 'dashboard';


if($tab == "products")
{

	$productClass = new Product();
	$products = $productClass->query("select * from products order by id desc");
}else
if($tab == "sales")
{

	$saleClass = new Sale();
	$sales = $saleClass->query("select * from sales order by id desc");

	//get today's sales total
	$year = date("Y");
	$month = date("m");
	$day = date("d");

	$query = "SELECT sum(total) as total FROM sales WHERE day(date) = $day && month(date) = $month && year(date) = $year";

	$st = $saleClass->query($query);
	$sales_total = 0;
	if($st){
		$sales_total = $st[0]['total'] ?? 0;
	}

}else
if($tab == "users")
{

	$userClass = new User();
	$users = $userClass->query("select * from users order by id desc");
}



if(Auth::access('supervisor')){
	require views_path('admin/admin');
}else{

	Auth::setMessage("You dont have access to the admin page");
	require views_path('auth/denied');
}

