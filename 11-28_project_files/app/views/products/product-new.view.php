<?php require views_path('partials/header');?>

	<div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">

		<form method="post">

			<h5 class="text-primary"><i class="fa fa-hamburger"></i> Add Product</h5>
			
			<div class="mb-3">
			  <label for="productControlInput1" class="form-label">Product description</label>
			  <input name="description" type="text" class="form-control" id="productControlInput1" placeholder="Product description">
			</div>
			
			<div class="mb-3">
			  <label for="barcodeControlInput1" class="form-label">Barcode <small class="text-muted">(optional)</small></label>
			  <input name="barcode" type="text" class="form-control" id="barcodeControlInput1" placeholder="Product barcode">
			</div>

			<div class="input-group mb-3">
			  <span class="input-group-text">Qty:</span>
			  <input name="qty" value="1" type="number" class="form-control" placeholder="Quantity" aria-label="Quantity">
			  <span class="input-group-text">Amount:</span>
			  <input name="amount" value="0.00" step="0.05" type="number" class="form-control" placeholder="Amount" aria-label="Amount">
			</div>

			<div class="mb-3">
			  <label for="formFile" class="form-label">Product Image</label>
			  <input name="image" class="form-control" type="file" id="formFile">
			</div>

			<br>
			<button class="btn btn-danger float-end">Save</button>
			<button type="button" class="btn btn-primary">Cancel</button>
		</form>
	</div>

<?php require views_path('partials/footer');?>