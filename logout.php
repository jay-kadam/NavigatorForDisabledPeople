<?php
	if (session_status() === PHP_SESSION_NONE){
        	session_start();
    	}
    	session_destroy();
?>
<script>
	alert('You are now logged out.'); 
    	window.location.href='index.php';
</script>