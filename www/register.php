
  
    <?php
      $page_title = "Register";
      
      include ('includes/header.php');
      $errors = [];
    if (array_key_exists('register', $_POST)) {
       

        if (empty($POST['fname'])) {
            $errors['fname'] = "please enter your firstname";
        }

        if(empty($_POST['lname'])) {
            $errors['lname'] = "please enter your lastname";
        }

        if(empty($_POST['email'])) {
            $errors[email] = "please enter your email";
        }

        if(empty($_POST['password'])) {
            $errors['password'] = "please enter your password";
        }
        if(empty($_POST['pword'])) {
            $errors['pword'] = "please confirm your password";
        }
        
        if(empty($errors)) {
            #do database stuff
        }else {
            foreach($errors as $err) {
                echo $err.'</br>';
            }
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
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
            
                <?php if (isset($errors['password'])) {echo '<p class = "err">'.$errors['password'].'</p>'; } 
                ?>
            </div>
 
			<div>
				<label>confirm password:</label>	
                <input type="password" name="pword" placeholder="password">
                
                
                <?php if (isset($errors['pword'])) {echo '<p class = "err">'.$errors['pword'].'</p>'; } 
                ?>
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>

    <?php
    
    include('includes/footer.php')
    ?>