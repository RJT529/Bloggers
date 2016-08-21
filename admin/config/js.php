<?php
	//Javascript

?>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- jQeury UI-->
<script src= "http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script  src ="js/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
	
	$(document).ready(function() {
		$("#console-debug").hide();
		
		$('#btn-debug').click(function(){
			$("#console-debug").toggle();

		});
	});

	tinymce.init({
		selector: '#body',
		theme: 'modern',
	   	plugins: "code",
	    code_dialog_width: 500
	 });
	

</script>