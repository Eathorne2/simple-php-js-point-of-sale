<?php require views_path('partials/header');?>

	<div class="container-fluid border col-lg-4 col-md-5 mt-5 p-4 shadow-sm" >
		
		<form method="post">
			<center>
				<h1><i class="fa fa-user"></i></h1>
				<h3>Login</h3>
				<div><?=esc(APP_NAME)?></div>
			</center>
			<br>
		
			<div class="mb-3">
			  <input  value="<?=set_value('email')?>" autocomplete="off" name="email" type="email" class="form-control  <?=!empty($errors['email']) ? 'border-danger':''?>" id="exampleFormControlInput1" placeholder="Email" autofocus>
				<?php if(!empty($errors['email'])):?>
					<small class="text-danger"><?=$errors['email']?></small>
				<?php endif;?>
			</div> 

			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1">Password</span>
			  <input value="<?=set_value('password')?>" name="password" type="password" class="form-control <?=!empty($errors['password']) ? 'border-danger':''?>" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
				<?php if(!empty($errors['password'])):?>
					<small class="text-danger col-12"><?=$errors['password']?></small>
				<?php endif;?>
			</div>

			<br>
			<div class="row">
				<button class="btn btn-primary" style="font-size: 20px;">Login</button>
			</div>
		</form>
	</div>

<?php require views_path('partials/footer');?>
