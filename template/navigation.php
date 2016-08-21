<nav class = "navbar navbar-default" role="navigation">

	<?php if($debug == 1) { ?>
		<button id = "btn-debug" class = "btn btn-default"><i class="fa fa-bug"></i></button>
	<?php } ?>

	<div class = "container">
		<ul class="nav navbar-nav">
			<?php nav_main($dbc, $pageid)?>
			
		
			<li<?php if($pageid == 3) {echo ' class="active"';} ?>><a href="?page=3">FAQ</a></li>
			<li<?php if($pageid == 4) {echo ' class="active"';} ?>><a href="?page=4">Contact</a></li>
		
		</ul>
	</div>

</nav><!--END nav -->