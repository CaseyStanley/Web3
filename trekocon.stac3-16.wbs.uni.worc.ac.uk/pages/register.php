<?php
	if(isset($_POST['user_email'])||isset($_POST['user_password'])||isset($_POST['user_name']))
	{
		if(strlen($_POST['user_password'])<8)
		{
			$error="Your password must contain more than 7 characters";
		}
		if(!filter_var($_POST['user_email'],FILTER_VALIDATE_EMAIL))
		{
			$error="This isn't a valid email address";
		}
		if(!$_POST['user_name'])
		{
			$error="Please enter a username";
		}
		
		//Checking email in database
		$result = $pdo->prepare('SELECT COUNT(email) FROM user WHERE email=:user_email');
		$result->bindParam(':user_email',$_POST['user_email']);
		$result->execute();
		if($em=$result->fetchColumn()>0){$error = "This email address already exists";}
		
		//Checking username in database
		$result = $pdo->prepare('SELECT COUNT(username) FROM user WHERE username=:user_name');
		$result->bindParam(':user_name',$_POST['user_name']);
		$result->execute();
		if($em=$result->fetchColumn()>0){$error = "This username already exists";}
		
		if(!$error)
		{
			//No errors - let's create the account
			//Encrypt the password with a salt
			$pass=$_POST['user_password'];
			//$encryptedPass = password_hash($_POST['user_password'],PASSWORD_DEFAULT);
			$encryptedPass = password_hash($pass, PASSWORD_DEFAULT);
			//Insert DB
			$query = "INSERT INTO user(email,password,username,number) VALUES(:user_email,:user_password,:user_name,:user_number)";
			$result = $pdo->prepare($query);
			$result->bindParam(':user_email',$_POST['user_email']);
			$result->bindParam(':user_password',$encryptedPass);
			$result->bindParam(':user_name',$_POST['user_name']);
			$result->bindParam(':user_number',$_POST['user_number']);
			$result->execute();
			
			$to = $_POST['user_email'];
			$subject = "Welcome to Trekocon!";
			
			$message = 
			"<html>
				<head>
					<title>Welcome to Trekocon!</title>
				</head>
				<body>
					<p>We are please to welcome you into our family. If you need any help, don't hesitate to contact us on: stac3_16@uni.worc.ac.uk.</p>
				</body>
			</html>";
			
			//Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0"."\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
			
			//More headers
			$headers .= 'From: 	todolist@stac3-16.wbs.uni.worc.ac.uk'."\r\n";
			mail($to,$subject,$message,$headers);
			
			//Textlocal account details
			$username = 'sean.preston@worc.ac.uk';
			$hash = '2578a4c767fbea1519b176fb9e748ff3f574a0952efbac43d7a151598ba30923';
			
			//Message details
			$numbers = $_POST['user_number'];
			$sender = urlencode('Trekocon');
			$message = rawurlencode("We are please to welcome you into our family. If you need any help, don't hesitate to contact us on: stac3_16@uni.worc.ac.uk.");
			
			//Prepare data for POST request
			$data = array('user_name' => $username, 'hash' => $hash, 'user_numbers' => $numbers, "sender" => $sender, "message" => $message);
			
			//Send the POST request with cURL
			$ch = curl_init('http://api.txtlocal.com/send/');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			
			echo"<script>window.location.assign('index.php?p=registersuccess');</script>";
		}
	}
?>
<div class="container">
	<h1 id="register">Register</h1>
	<form action="index.php?p=register" method="post">
		<?php if($error)
		{
			echo '<div class="alert alert-danger" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			'.$error.'
			</div>';
		}?>
		<div class="form-group">
			<label for="name" class="label">Username</label>
			<input type="text" class="form-control" id="name" name="user_name" placeholder="username">
		</div>
		<div class="form-group">
			<label for="email" class="label">Email address</label>
			<input type="email" class="form-control" id="email" name="user_email" placeholder="email">
		</div>
		<div class="form-group">
			<label for="password" class="label">Password</label>
			<input type="password" class="form-control" id="password" name="user_password" placeholder="password">
		</div>
		<div class="form-group">
			<label for="number" class="label">Mobile Number</label>
			<input type="text" class="form-control" id="number" name="user_number" placeholder="01234567892">
		</div>
		<!--Include forename, surname, birthday and gender to registration-->
		<button type="submit" class="btn btn-default">Register</button>
	</form>
</div>
<script src="js/register.js"></script>