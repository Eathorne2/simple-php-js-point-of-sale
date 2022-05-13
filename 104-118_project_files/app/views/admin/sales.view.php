
<ul class="nav nav-tabs">
  
  <li class="nav-item">
    <a class="nav-link <?=($section =='table') ? 'active':''?>" aria-current="page" href="index.php?pg=admin&tab=sales">
	    Table View
	</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=($section =='graph') ? 'active':''?>" href="index.php?pg=admin&tab=sales&s=graph">
	    Graph View
	</a>
  </li>
  
</ul>

<br>

<?php if($section == 'table'):?>

<div>
	<form class="row float-end" >
			<div class="col">
				<label for="start">Start Date:</label>
				<input class="form-control" id="start" type="date" name="start" value="<?=!empty($_GET['start']) ? $_GET['start']:''?>">
			</div>
			<div class="col">
				<label for="end">End Date:</label>
				<input class="form-control" id="end" type="date" name="end" value="<?=!empty($_GET['end']) ? $_GET['end']:''?>">
			</div>
			<div class="col">
				<label for="limit">Rows:</label>
				<input style="max-width: 80px" class="form-control" id="limit" type="number" min="1" name="limit" value="<?=!empty($_GET['limit']) ? $_GET['limit']:'20'?>">
			</div>
			
			<button style="max-width:50px" class="btn col btn-primary btn-sm">Go <i class="fa fa-chevron-right"></i></button>
			<input type="hidden" name="pg" value="admin">
			<input type="hidden" name="tab" value="sales">
	</form>
	<div class="clearfix" ></div>
</div>

<div class="table-responsive">
	<h2>Today's Total: $<?=number_format($sales_total,2)?></h2>
	<table class="table table-striped table-hover">
		<tr>
			<th>Barcode</th><th>Receipt No</th><th>Description</th><th>Qty</th><th>Amount</th><th>Total</th><th>Cashier</th><th>Date</th>
			<th>
				<a href="index.php?pg=home">
					<button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button>
				</a>
			</th>
		</tr>

		<?php if (!empty($sales)):?>
			<?php foreach ($sales as $sale):?>
	 		<tr>
				<td><?=esc($sale['barcode'])?></td>
				<td><?=esc($sale['receipt_no'])?></td>
				<td>
 					<?=esc($sale['description'])?>
 				</td>
				<td><?=esc($sale['qty'])?></td>
				<td><?=esc($sale['amount'])?></td>
				<td><?=esc($sale['total'])?></td>
				<?php 
					$cashier = get_user_by_id($sale['user_id']);
					if(empty($cashier)){
						$name = "Unknown";
						$namelink = "#";
					}else{
						$name = $cashier['username'];
						$namelink = "index.php?pg=profile&id=".$cashier['id'];
					}
				?>
				<td>
					<a href="<?=$namelink?>">
						<?=esc($name)?>
					</a>
				</td>
		
				<td><?=date("jS M, Y",strtotime($sale['date']))?></td>
				<td>
					<a href="index.php?pg=sale-edit&id=<?=$sale['id']?>">
						<button class="btn btn-success btn-sm">Edit</button>
					</a>
					<a href="index.php?pg=sale-delete&id=<?=$sale['id']?>">
						<button class="btn btn-danger btn-sm">Delete</button>
					</a>
				</td>
			</tr>
			<?php endforeach;?>
		<?php endif;?>
		
	</table>

<?php

		$pager->display();
?>

</div>

<?php else:?>


	<?php 

		$graph = new Graph();

		$data = generate_daily_data($today_records);
		$graph->title = "Today's sales";
		$graph->xtitle = "Hours of the day";
		$graph->styles = "width:80%;margin:auto;display:block";
		$graph->display($data);

	?>
	<br>

	<?php 

		$data = generate_monthly_data($thismonth_records);
		$graph->title = "This month's sales";
		$graph->xtitle = "Days of the month";
		$graph->styles = "width:80%;margin:auto;display:block";
		$graph->display($data);

	?>
	<br>

	<?php 

		$data = generate_yearly_data($thisyear_records);
		$graph->title = "This year's sales";
		$graph->xtitle = "Months of the year";
		$graph->styles = "width:80%;margin:auto;display:block";
		$graph->display($data);

	?>
	<br>


<?php endif;?>