<?php
	if($_GET['id'])
	{
		//Get user details
		$query = "SELECT * FROM user WHERE user_id = :userid";
		$result = $pdo->prepare($query);
		$result->bindParam(':userid', $_GET['id']);
		$result->execute();
		$userProfile = $result->fetch(PDO::FETCH_ASSOC);
	}
	else
	{
		//Display error
		$error = "No user id defined.";
	}
?>
<div class="container card mt-5">
	<div class="card-body">
		<?php
			if($error)
			{
				echo "<h1>Error!</h1>";
				echo "<p>".$error."</p>";
			}
			else
			{
		?>
		
		<!--User info here-->
		<h1><?php echo $userProfile['forename']; ?></h1>
		<h1><?php echo $userProfile['surname']; ?></h1>
		<img class="profileImage" src="./user_images/<?php echo $userProfile['profile_pic']; ?>"/>
		<p><strong>Gender:</strong> <?php echo $userProfile['gender']; ?></p>
		<p><strong>Birthday:</strong> <?php echo $userProfile['birthday']; ?></p>
		<?php } ?>
	</div>
</div>