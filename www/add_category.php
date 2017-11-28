<?php
        session_start();

        $page_title = "Add Category" ;
    
        include('includes/function.php');
        include('includes/dashboard_header.php');

        include('includes/db.php');

      // checkLogin();

        $errors =[];

        if(array_key_exists('add', $_POST)) {

            if(empty($_POST['cat_name'])) {

                $errors['cat_name'] = "Please enter a category name";
            }
        if(empty($errors)) {
            $clean = array_map('trim', $_POST);

            addCategory($conn, $clean);

            redirect("view_category.php?msg= ", "");
            }
        }

?>



<div class="wrapper">
		<div id="stream">
			<form id="register"  action ="add_category.php" method ="POST">
			<div>
                <?php
                $info = displayErrors($errors, 'cat_name');
                echo $info;
                ?>
				<label>Add Category:</label>
				<input type="text" name="cat_name" placeholder="category name">
            </div>
            <input type="submit" name ="add" value ="Add">
            </form>
		</div>
    </div>
    
    <?php
        include ('includes/footer.php');
    
    ?>