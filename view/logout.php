<?php  
	session_start();
	session_unset($_SESSION['username']);
	session_unset($_SESSION['company']);
	session_unset($_SESSION['UserId']);
	session_unset($_SESSION['UserLoggedIn']);
	// session_destroy();

	echo "<script>window.location.href='index.php';</script>";
?>