<?php
session_start();
session_unset();
session_destroy();
?>
<script>
	alert("You are now leaving UIFR, Thank You..!");
	window.location.href = "login.html";
</script>