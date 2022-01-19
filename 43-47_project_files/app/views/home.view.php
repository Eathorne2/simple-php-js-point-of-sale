<?php require views_path('partials/header');?>
 
	<div class="d-flex">
		<div style="min-height:600px;" class="shadow-sm col-7 p-4">
			
			<div class="input-group mb-3"><h3> Items </h3>
			  <input type="text" class="ms-4 form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" autofocus>
			  <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
			</div>

			<div class="js-products d-flex" style="flex-wrap: wrap;height: 90%;overflow-y: scroll;">
				
				
			</div>
		</div>
		
		<div class="col-5 bg-light p-4 pt-2">
			
			<div><center><h3>Cart <div class="badge bg-primary rounded-circle">3</div></h3></center></div>
			
			<div class="table-responsive" style="height:400px;overflow-y: scroll;">
				<table class="table table-striped table-hover">
					<tr>
						<th>Image</th><th>Description</th><th>Amount</th>
					</tr>
					
					<!--item-->
					<tr>
						<td style="width:110px"><img src="assets/images/image.jpg" class="rounded border" style="width:100px;height:100px"></td>
						<td class="text-primary">
							COFFEE SOFT DRINK

							<div class="input-group my-3" style="max-width:150px">
							  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-minus text-primary"></i></span>
							  <input type="text" class="form-control text-primary" placeholder="1" value="1" >
							  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-plus text-primary"></i></span>
							</div>

						</td>
						<td style="font-size:20px"><b>$5.00</b></td>
					</tr>
	 				<!--end item-->

	 				<!--item-->
					<tr>
						<td style="width:110px"><img src="assets/images/wave.jpg" class="rounded border" style="width:100px;height:100px"></td>
						<td class="text-primary">
							WAVE DRINK

							<div class="input-group my-3" style="max-width:150px">
							  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-minus text-primary"></i></span>
							  <input type="text" class="form-control text-primary" placeholder="1" value="1" >
							  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-plus text-primary"></i></span>
							</div>

						</td>
						<td style="font-size:20px"><b>$8.00</b></td>
					</tr>
	 				<!--end item-->

	 				<!--item-->
					<tr>
						<td style="width:110px"><img src="assets/images/wave.jpg" class="rounded border" style="width:100px;height:100px"></td>
						<td class="text-primary">
							WAVE DRINK

							<div class="input-group my-3" style="max-width:150px">
							  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-minus text-primary"></i></span>
							  <input type="text" class="form-control text-primary" placeholder="1" value="1" >
							  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-plus text-primary"></i></span>
							</div>

						</td>
						<td style="font-size:20px"><b>$8.00</b></td>
					</tr>
	 				<!--end item-->

	 				<!--item-->
					<tr>
						<td style="width:110px"><img src="assets/images/wave.jpg" class="rounded border" style="width:100px;height:100px"></td>
						<td class="text-primary">
							WAVE DRINK

							<div class="input-group my-3" style="max-width:150px">
							  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-minus text-primary"></i></span>
							  <input type="text" class="form-control text-primary" placeholder="1" value="1" >
							  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-plus text-primary"></i></span>
							</div>

						</td>
						<td style="font-size:20px"><b>$8.00</b></td>
					</tr>
	 				<!--end item-->

	 				
				</table>
			</div>

			<div class="alert alert-danger" style="font-size:30px">Total: $30.00</div>
			<div class="">
				<button class="btn btn-success my-2 w-100 py-4">Checkout</button>
				<button class="btn btn-primary my-2 w-100">Clear All</button>
			</div>
		</div>
	</div>	

<script>
	
	function send_data(data)
	{

		var ajax = new XMLHttpRequest();

		ajax.addEventListener('readystatechange',function(e){

			if(ajax.readyState == 4){

				if(ajax.status == 200)
				{
					handle_result(ajax.responseText);
				}else{

					console.log("An error occured. Err Code:"+ajax.status+" Err message:"+ajax.statusText);
					console.log(ajax);
				}
			}
			
		});

		ajax.open('post','index.php?pg=ajax',true);
		ajax.send();
	}

	function handle_result(result){

		var obj = JSON.parse(result);

		if(typeof obj != "undefined"){

			//valid json
			var mydiv = document.querySelector(".js-products");
			mydiv.innerHTML = "";

			for (var i = 0; i < obj.length; i++) {
				
				mydiv.innerHTML += product_html(obj[i]);
			}
			
		}

	

	}

	function product_html(data)
	{

		return `
			<!--card-->
			<div class="card m-2 border-0" style="min-width: 190px;max-width: 190px;">
				<a href="#">
					<img src="${data.image}" class="w-100 rounded border">
				</a>
				<div class="p-2">
					<div class="text-muted">${data.description}</div>
					<div class="" style="font-size:20px"><b>$${data.amount}</b></div>
				</div>
			</div>
			<!--end card-->
			`;

				
	}

	send_data();

</script>

<?php require views_path('partials/footer');?>
