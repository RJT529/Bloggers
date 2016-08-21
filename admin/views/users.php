<h1>USER MANAGER</h1>


<div class="row">
	<div class="col-md-3"><!--To display the contents of the page-->			
		<div class="list-group">
			<a class = "list-group-item" href="?page=users"><!--To add new page-->
				<h4 class="list-group-item-heading"><i class="fa fa-plus"></i> New User</h4>
			</a>
			<?php
				$q = "SELECT * FROM users ";
				$r = mysqli_query($dbc,$q);

				while($list = mysqli_fetch_assoc($r)) { 
					$list = data_user($dbc,$list['id']); 
					//$blurb =substr( strip_tags($list['body']),0,150);
				?>
				<a class = "list-group-item <?php selected($list['id'],$opened['id'],'active');?>" href="index.php?page=users&id=<?php echo $list['id']; ?>">
					<h4 class="list-group-item-heading"><?php echo $list['fullname_reverse'];?></h4>
				</a>				
			<?php }?><!--While loop ends -->
		</div>
	</div><!--END col1-->

	<div class="col-md-9"><!--To set Form -->

		<?php if(isset($message)) { echo $message; } ?>

		
		<form action = "index.php?page=users&id=<?php if(isset($opened['id'])){echo $opened['id'];}else{echo $opened;}  ?>" method = "post" role = "form">
			<div class = "form-group">
				<label for = "first">First Name:</label>
				<input class="form-control" type = "text" name = "first" value = "<?php echo $opened['first'];?>" id = "first" placeholder = "First Name" autocomplete = "off">
			</div>
			<div class = "form-group">
				<label for = "last">Last Name:</label>
				<input class="form-control" type = "text" name = "last" value = "<?php echo $opened['last'];?>" id = "last" placeholder = "Last Name"
				autocomplete = "off">
			</div>
			<div class = "form-group">
				<label for = "email">Email Address:</label>
				<input class="form-control" type = "text" name = "email" value = "<?php echo $opened['email'];?>" id = "email" placeholder = "Email Address" autocomplete = "off">
			</div>
			<div class = "form-group">
				<label for = "status">Status:</label>
				<select class="form-control" name = "status" id = "status" >
					<option value="0" <?php if(isset($_GET['id'])){ selected('0',$opened['status'],'selected');}?>>Inactive</option>
					<option value="1" <?php if(isset($_GET['id'])){ selected('1',$opened['status'],'selected');}?>>Active</option>
				</select>
			</div>
			<div class = "form-group">
				<label for = "password">Password:</label>
				<input class="form-control" type = "password" name = "password" value = "" id = "password" placeholder = "Password">
			</div>
			<div class = "form-group">
				<label for = "passwordv">Verify Password:</label>
				<input class="form-control" type = "password" name = "passwordv" value = "" id = "passwordv" placeholder = "Type Password Again">
			</div>
			<button type="submit" class="btn btn-default">Save</button>
			<input type="hidden" name="submitted" value="1">	<!-- to check whether the form has been submitted -->
			<input type="hidden" name="id" value="
			<?php 
			if(isset($opened['id'])){
				echo $opened['id'];
			} else {
				echo $opened;
			}
			?>">		<!-- to avoid the addition of an existing page on saving-->
		</form>			
	</div>
</div>