<?php require views_path('partials/header');?>

<div style="color:#444">
	<center class="p-2"><h4><i class="fa fa-user-shield"></i> Admin</h4></center>

	<div class="container-fluid row">
		<div class="col-12 col-sm-4 col-md-3 col-lg-2">
			<ul class="list-group">
				<a href="index.php?pg=admin&tab=dashboard">
			  		<li class="list-group-item <?=!$tab || $tab == 'dashboard'?'active':''?>" ><i class="fa fa-th-large"></i> Dashboard</li>
			  	</a>
			  	<a href="index.php?pg=admin&tab=users">
			  		<li class="list-group-item <?=$tab=='users'?'active':''?>"><i class="fa fa-users"></i> Users</li>
				</a>
			  	<a href="index.php?pg=admin&tab=products">
			  		<li class="list-group-item <?=$tab=='products'?'active':''?>"><i class="fa fa-hamburger"></i> Products</li>
				</a>

				<a href="index.php?pg=admin&tab=sales">
			  		<li class="list-group-item <?=$tab=='sales'?'active':''?>"><i class="fa fa-money-bill-wave"></i> Sales</li>
				</a>
				
			  	<a href="index.php?pg=logout">
			  		<li class="list-group-item"><i class="fa fa-sign-out-alt"></i> Logout</li>
				</a>
			</ul>
		</div>
		<div class="border col p-3">
			
			<h4><?=strtoupper($tab)?></h4>

			<?php  

				switch ($tab) {
					case 'products':
						// code...
						require views_path('admin/products');
						break;

					case 'users':
						// code...
						require views_path('admin/users');
						break;

					case 'sales':
						// code...
						require views_path('admin/sales');
						break;
					
					default:
						// code...
						require views_path('admin/dashboard');
						break;
				}


			?>
		</div>
	</div>
</div>
<?php require views_path('partials/footer');?>