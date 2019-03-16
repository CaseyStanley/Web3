<?php
	if(isset($_POST['user_email'])||isset($_POST['user_password']))
	{
		if(!$_POST['user_email']||!$_POST['user_password'])
		{
			$error = "Please enter an email address AND password";
		}
		
		if(!$error)
		{
			//No errors-lets get the users account
			$query = "SELECT * FROM user WHERE email=:email";
			$result = $pdo->prepare($query);
			$result->bindParam(':email', $_POST['user_email']);
			$result->execute();
			
			$row = $result->fetch(PDO::FETCH_ASSOC);
			
			if(isset($row['email']))
			{
				//User found-let's check the password
				if(password_verify($_POST['user_password'], $row['password']))
				{
					$_SESSION['loggedin'] = true;
					$_SESSION['userData'] = $row['username'];
					echo "<script>
					window.location.assign('index.php?p=events');
					</script>";
				}
				else
				{
					$error = "Username OR Password is incorrect";
				}
			}
			else
			{
				$error = "Username OR Password is incorrect";
			}
		}
	}
?>
			
<div class="card container mt-5">
	<div class="card-body">
		<h1 class="mb-3">Login to your account</h1>
		<form action="index.php?p=login" method="post">
			<?php
				if($error)
				{
					echo'<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					'.$error.'
					</div>';
				}
			?>
			<div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" id="email" name="user_email" placeholder="email">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="user_password" placeholder="password">
			</div>
			<button type="submit" class="btn btn-default">Login</button>
		</form>
	</div>
</div>