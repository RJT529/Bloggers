<nav class = "navbar navbar-default" role="navigation">

		<ul class="nav navbar-nav">
			<li><a href="?page=dashboard">Dashboard</a></li>
			<li><a href="?page=pages">Pages</a></li>
			<li><a href="?page=users">Users</a></li>
			<li><a href="?page=settings">Settings</a></li>

		</ul>

		<div class="pull-right">			
			<ul class="nav navbar-nav ">

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $users['fullname']; ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
				<li>
					<?php if($debug == 1) { ?>
						<button id = "btn-debug" class = "btn btn-default navbar-btn"><i class="fa fa-bug"></i></button>
					<?php } ?>
				</li>
			</ul>
		</div>
</nav><!--END nav -->