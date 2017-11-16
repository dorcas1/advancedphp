
  
    <?php
      $page_title = "Register";
      
      include ('includes/header.php');
      include ('includes/db.php');
      include ('includes/function.php');
      $errors = [];
    if (array_key_exists('register', $_POST)) {
       

        if (empty($_POST['fname'])) {
            $errors['fname'] = "please enter your firstname";
        }

        if(empty($_POST['lname'])) {
            $errors['lname'] = "please enter your lastname";
        }

        if(empty($_POST['email'])) {
            $errors['email'] = "please enter your email";
        }

        if(empty($_POST['password'])) {
            $errors['password'] = "please enter your password";
        }
        if(empty($_POST['pword'])) {
            $errors['pword'] = "please confirm your password";


        }
           if (empty($errors)) {
                $clean = array_map('trim', $_POST);
                doAdminRegister($conn, $clean);

              /*  $hash = password_hash($clean['password'], PASSWORD_BCRYPT);

                $stmt = $conn->prepare("INSERT INTO admin(firstName, lastName, email,
                         hash) VALUES(:f, :l, :e, :h)");

                print_r($stmt);
                $data = [ 
                    ":f" => $clean['fname'],
                    ":l" => $clean['lname'],
                    ":e" => $clean['email'],
                    ":h" => $hash
              ];

              $stmt->execute($data); */
            }        

    }
    
?>

	<div class="wrapper">

		<h1 id="register-label">Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>
                <?php if (isset($errors['fname'])) {echo '<p class = "err">'.$errors['fname'].'</p>'; } 
                ?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
                <?php if (isset($errors['lname'])) {echo '<p class = "err">'.$errors['lname'].'</p>'; } 
                ?>
            
                <label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
                
            </div>

			<div>
                <?php if (isset($errors['email'])) {echo '<p class = "err">'.$errors['email'].'</p>'; } 
                ?>

				<label>email:</label>
				<input type="text" name="email" placeholder="email">
            
            </div>
			<div>
                 <?php if (isset($errors['password'])) {echo '<p class = "err">'.$errors['password'].'</p>'; } 
                ?>

				<label>password:</label>
				<input type="password" name="password" placeholder="password">
    
            </div>
 
			<div> 
                <?php if (isset($errors['pword'])) {echo '<p class = "err">'.$errors['pword'].'</p>'; } 
                ?>

				<label>confirm password:</label>	
                <input type="password" name="pword" placeholder="password">
                
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>

    <?php
    
    include('includes/footer.php')
    ?>