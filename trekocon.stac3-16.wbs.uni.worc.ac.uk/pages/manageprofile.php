<?php
	if(!$_SESSION['loggedin'])
	{
		//User is not logged in
		echo "<script> window.location.assign('index.php?p=login'); </script>";
		exit;
	}
?>
<div class="container card mt-5">
	<div class="card-body">
		<h1>Edit your profile</h1>
		<p>Complete the form below to edit your public profile.</p>
		<!--Form here-->
	</div>
</div>