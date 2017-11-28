
<?php
	session_start();

    $page_title = "Login";

	include('includes/header.php');

	include('includes/db.php');

	include('includes/function.php');

	$errors =[];
	
	if(array_key_exists('login', $_POST)) {

		if(empty($_POST['email'])) {
			$errors['email'] = "Please enter your email";
		}
		
		if(empty($_POST['password'])) {
			$errors['password'] = "Please enter your password";
		}
	
		if(empty($errors)) {
			$clean = array_map('trim', $_POST);

			$data = adminLogin($conn, $clean);

			if($data[0]) {
				$details = $data[1];

				$_SESSION['aid'] = $details['admin_id'];
				$_SESSION['name'] = $details['firstName'].' '.$details['lastName'];

				//redirect("add_category.php?msg= ", "admin successfully logged in");
				 header("Location:add_category.php");
				 echo "hello, there";
			}else {
				header('Location:login.php?msg="Invalid email or password"');
			}
		}
	}
?>

	<div class="wrapper">
		<h1 id="register-label">Admin Login</h1>
		<hr>
		<form id="register"  action ="login.php" method ="POST">
			<div>
				<?php
					$info = displayErrors($errors, 'email');
					echo $info;
				?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>

			<div>
				<?php
				$info = displayErrors($errors, 'password');
				echo $info;
				?>

				<label>password:</label>

				<input type="password" name="password" placeholder="password">
			</div>

			<input type="submit" name="login" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
	</div>

    <?php
    include ('includes/footer.php')
    ?>