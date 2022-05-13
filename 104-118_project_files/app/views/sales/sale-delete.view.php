<?php require views_path('partials/header');?>

	<div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">

		<?php if(!empty($row)):?>

		<form method="post" enctype="multipart/form-data">

			<h5 class="text-primary"><i class="fa fa-hamburger"></i> Delete Sale</h5>

			<div class="alert alert-danger text-center">Are you sure you want to delete this sale??!!</div>

			<div class="mb-3">
			  <label for="saleControlInput1" class="form-label">Sale description</label>
			  <input disabled value="<?=set_value('description',$row['description'])?>" name="description" type="text" class="form-control <?=!empty($errors['description']) ? 'border-danger':''?>" id="saleControlInput1" placeholder="Sale description">
			</div>
			
			<div class="mb-3">
			  <label for="barcodeControlInput1" class="form-label">Barcode</small></label>
			  <input disabled value="<?=set_value('barcode',$row['barcode'])?>" name="barcode" type="text" class="form-control <?=!empty($errors['barcode']) ? 'border-danger':''?>" id="barcodeControlInput1" placeholder="Sale barcode">
			</div>
 
			<div class="mb-3">
			  <label for="barcodeControlInput1" class="form-label">Total</small></label>
			  <input disabled value="<?=set_value('total',$row['total'])?>" name="total" type="text" class="form-control <?=!empty($errors['barcode']) ? 'border-danger':''?>" id="barcodeControlInput1" placeholder="Sale barcode">
			</div>
			<div class="mb-3">
			  <label for="barcodeControlInput1" class="form-label">Date</small></label>
			  <input disabled value="<?=set_value('date',$row['date'])?>" name="date" type="text" class="form-control <?=!empty($errors['barcode']) ? 'border-danger':''?>" id="barcodeControlInput1" placeholder="Sale barcode">
			</div>
			
			<br>
			<button class="btn btn-danger float-end">Delete</button>
			<a href="index.php?pg=admin&tab=sales">
				<button type="button" class="btn btn-primary">Cancel</button>
			</a>
		</form>
		<?php else:?>
			That record was not found
			<br><br>
			<a href="index.php?pg=admin&tab=sales">
				<button type="button" class="btn btn-primary">Back to sales</button>
			</a>

		<?php endif;?>

	</div>

<?php require views_path('partials/footer');?>