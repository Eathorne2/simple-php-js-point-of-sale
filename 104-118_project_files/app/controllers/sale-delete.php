<?php 

$errors = [];

$id = $_GET['id'] ?? null;
$sale = new Sale();

$row = $sale->first(['id'=>$id]);

if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
{
	
	$sale->delete($row['id']);
  
	redirect('admin&tab=sales');
 

}


require views_path('sales/sale-delete');

