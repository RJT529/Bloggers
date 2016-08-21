<h1>SETTINGS</h1>

<div class="container">
<div class="row">
	<div class="col-md-12"><!--To display the contents of the page-->	


		<?php if(isset($message)) { echo $message; } ?>
	
			<?php
				$q = "SELECT * FROM settings ";
				$r = mysqli_query($dbc,$q);

				while($opened = mysqli_fetch_assoc($r)) {?>

					<form class = "form-inline" action = "index.php?page=settings&id=<?php if(isset($opened['id'])){echo $opened['id'];}else{echo $opened;}  ?>" method = "post" role = "form">
						<div class = "form-group">
							<label class = "sr-only" for = "id">Id:</label>
							<input class="form-control" type = "text" name = "id" value = "<?php echo $opened['id'];?>" id = "id" placeholder = "id-name" autocomplete = "off">
						</div>
						<div class = "form-group">
							<label class = "sr-only" for = "label">Label:</label>
							<input class="form-control" type = "text" name = "label" value = "<?php echo $opened['label'];?>" id = "label" placeholder = "Label" autocomplete = "off">
						</div>
						<div class = "form-group">
							<label class = "sr-only" for = "value">Value:</label>
							<input class="form-control" type = "text" name = "value" value = "<?php echo $opened['value'];?>" id = "value" placeholder = "Value" autocomplete = "off">
						</div>
						
						<button type="submit" class="btn btn-default">Save</button>
						<input type="hidden" name="submitted" value="1">	<!-- to check whether the form has been submitted -->
						<input type="hidden" name="openedid" value="
						<?php 
						if(isset($opened['id'])){
							echo $opened['id'];
						} else {
							echo $opened;
						}
						?>">		<!-- to avoid the addition of an existing page on saving-->
					</form>		
								
			<?php }?><!--While loop ends -->
		
	</div><!--END col1-->
</div>
</div>