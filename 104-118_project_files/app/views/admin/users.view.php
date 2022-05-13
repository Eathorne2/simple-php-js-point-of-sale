<div class="table-responsive">
	
	<table class="table table-striped table-hover">
		<tr>
			<th>Image</th><th>Username</th><th>gender</th><th>email</th><th>role</th><th>Date</th>
			<th>
				<a href="index.php?pg=signup">
					<button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button>
				</a>
			</th>
		</tr>

		<?php if (!empty($users)):?>
			<?php foreach ($users as $user):?>
	 		<tr>
				<td>
					<a href="index.php?pg=profile&id=<?=$user['id']?>">
					<img src="<?=crop($user['image'],400,$user['gender'])?>" style="width: 100%;max-width:100px;" >
					</a>
				</td>

				<td>
					<a href="index.php?pg=profile&id=<?=$user['id']?>">
						<?=esc($user['username'])?>
					</a>	
				</td>
				<td><?=esc($user['gender'])?></td>
				<td><?=esc($user['email'])?></td>
				<td><?=esc($user['role'])?></td>
				
				<td><?=date("jS M, Y",strtotime($user['date']))?></td>
				<td>
					<a href="index.php?pg=edit-user&id=<?=$user['id']?>">
						<button class="btn btn-success btn-sm">Edit</button>
					</a>
					<a href="index.php?pg=delete-user&id=<?=$user['id']?>">
						<button class="btn btn-danger btn-sm">Delete</button>
					</a>
				</td>
			</tr>
			<?php endforeach;?>
		<?php endif;?>
		
	</table>

	<?php $pager->display(count($users))?>
</div>