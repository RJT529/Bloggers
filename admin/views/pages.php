<h1>PAGE MANAGER</h1>

<div class="row">
	<div class="col-md-3"><!--To display the contents of the page-->			
		<div class="list-group">
			<a class = "list-group-item" href="?page=pages"><!--To add new page-->
				<h4 class="list-group-item-heading"><i class="fa fa-plus"></i> New Page</h4>
			</a>
			<?php
				$q = "SELECT * FROM pages";
				$r = mysqli_query($dbc,$q);

				while($list = mysqli_fetch_assoc($r)) { 
					$blurb =substr( strip_tags($list['body']),0,150);//To extract first 150 characters from the page
				?>
				<a class = "list-group-item <?php selected($list['id'],$opened['id'],'active');?>" href="index.php?page=pages&id=<?php echo $list['id']; ?>">
					<h4 class="list-group-item-heading"><?php echo $list['title'];?></h4>
					<p class="list-group-item-text">
						<?php echo $blurb; ?>
					</p>
				</a>				
			<?php }?><!--While loop ends -->
		</div>
	</div><!--END col1-->

	<div class="col-md-9"><!--To set Form -->

		<?php if(isset($message)) { echo $message; } ?>
		
		<form action = "index.php?page=pages&id=<?php if(isset($opened['id'])){echo $opened['id'];}else{echo $opened;} ?>" method = "post" role = "form">
			<div class = "form-group">
				<label for = "title">Title:</label>
				<input class="form-control" type = "text" name = "title" value = "<?php echo $opened['title'];?>" id = "title" placeholder = "Page Title">
			</div>
			<div class = "form-group">
				<label for = "user">User:</label>
				<select class="form-control" name = "user" id = "user" >
					<option value="0">No user</option>

					<?php 	//php to select the appropriate user
						$q = "SELECT id FROM users ORDER BY first ASC";
						$r = mysqli_query($dbc,$q);

						while($user_list = mysqli_fetch_assoc($r)) { 
							$user_data = data_user($dbc,$user_list['id']);
						?>

							<option value="<?php echo $user_data['id']; ?>"
							 <?php 
							 	if(isset($_GET['id'])) {
							 		selected($user_data['id'],$opened['user'],'selected'); //to select the user according to the page opened
							 	}else{
							 		selected($user_data['id'],$users['id'],'selected');	//to select the user according to session
							 	}


							 ?>><?php  echo $user_data['fullname'];?></option>

						<?php }?>

				</select>
			</div>
			<div class = "form-group">
				<label for = "slug">Slug:</label>
				<input class="form-control" type = "text" name = "slug" value = "<?php echo $opened['slug'];?>" id = "slug" placeholder = "Page Slug">
			</div>
			<div class = "form-group">
				<label for = "label">Label:</label>
				<input class="form-control" type = "text" name = "label" id = "label" value = "<?php echo $opened['label'];?>" placeholder = "Page Label">
			</div>
			<div class = "form-group">
				<label for = "header">Header:</label>
				<input class="form-control" type = "text" name = "header" id = "header" value = "<?php echo $opened['header'];?>" placeholder = "Page Header">
			</div>
			<div class = "form-group">
				<label for = "body">Body:</label>
				<textarea class="form-control" name = "body" id = "body" placeholder = "Page Body" rows="15"><?php echo $opened['body'];?></textarea>
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