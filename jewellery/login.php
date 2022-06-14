<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="css/form.css?v=e031e80c3d8bbbb">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
		<?php
			
			include 'conn.php';

			if(isset($_POST['sighnup_btn'])){
				$user=$_POST['sighnup_txt'];
				$email=$_POST['sighnup_email'];
				$pass=$_POST['sighnup_pswd'];

				$query="insert into admin values(null,'$user','$email','$pass')";

				if(mysqli_query($conn,$query)){
					echo '<script> alert("Inserted") </script>';
				}
				else{
					echo '<script> alert("not Inserted") </script>';

				}
			}
			        
			// ----------------------login from database----------------------------
			session_start();

			if(isset($_POST['login_btn'])){
				$email=$_POST['login_email'];
				$pass=$_POST['login_pswd'];

				$query="select * from admin where email='$email' and password='$pass'";
				$result=mysqli_query($conn,$query);
				$count=mysqli_num_rows($result);
				$row=mysqli_fetch_array($result);
				if($count>0){
					$_SESSION['ID']=$row[0];
					$_SESSION['user_name']=$row[1];
					header("Location:admin.php");
				}
				else{
					echo '<script> alert("invalid username or password") </script>';
				}
			}


		?>

	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

		<div class="login">
				<form action="login.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="login_email" placeholder="Email" required="">
					<input type="password" name="login_pswd" placeholder="Password" required="">
					<button name="login_btn">Login</button>
					<!-- <h3> <?php echo $usercity; ?> </h3> -->
				</form>
			</div>


			<div class="signup">
				<form action="login.php" method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="sighnup_txt" placeholder="User name" required="" autocomplete="off">
					<input type="email" name="sighnup_email" placeholder="Email" required="" autocomplete="off">
					<input type="password" name="sighnup_pswd" placeholder="Password" required="" autocomplete="off">
					<button name="sighnup_btn">Sign up</button>
					<!-- <input type="submit" name="sighnup_btn" value="Sighnup"> -->
				</form>
			</div>

	</div>
</body>
</html>