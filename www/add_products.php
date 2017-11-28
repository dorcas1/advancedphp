<?php
 session_start();
 
         $page_title = "Add Products";
     
         include('includes/function.php');
         include('includes/dashboard_header.php');
         include('includes/db.php');

         $errors = [];

         $flag = ['Top-Selling', 'Trending', 'Recently-Viewed' ];

         define('MAX_FILE_SIZE', 2097152);

          $ext = ['image/jpeg', 'image/jpg', 'image/png'];

         if(array_key_exists('add', $_POST)) {

            if(empty($_POST['author'])) {
                $errors ['author'] = "Please enter book author";
            }
            if(empty($_POST['title'])) {
                $errors ['title'] = "Please enter book title";
            }
            if(empty($_POST['year'])) {
                $errors['year'] = "Please enter year of publication";
            }
            if(empty($_POST['price'])) {
                $errors['price'] = "Please enter book price";
            }
            if(empty($_POST['cat'])) {
                $errors['cat'] = "please enter book category";
            }
            if(empty($_POST['flag'])) {
                $errors['flag'] = "Please select a flag";
            }
            if(empty($_FILES['image']['name'])) {
                $errors['image'] = "Please select a book image";
            }
            if($_FILES['image']['size'] > MAX_FILE_SIZE) {
                $errors['image'] = "Image size too large";
            }
            if(!in_array($_FILES['image']['type'], $ext)) {
                $errors['image'] = "Image type not supported";
            }

            if(empty($errors)){

                $img =uploadFile($_FILES, 'image', 'uploads/');

                if($img[0]) {

                    $location = $img[1];
                }
                $clean = array_map('trim', $_POST);
                $clean['dest'] = $location;
                
                addProduct($conn, $clean);

                redirect('view_products.php');
            }

         }

?>

<div class="wrapper">

		
		<form id="register"  action ="" method ="POST" enctype="multipart/form-data">
			<div>
                <?php 
                    $data = displayErrors($errors, 'title');
                     echo $data;
                ?>
				<label>title:</label>
				<input type="text" name="title" placeholder="title">
			</div>
			<div>
                <?php $err = displayErrors($errors, 'author'); 
                echo $err; 
                ?>
            
                <label>last name:</label>	
				<input type="text" name="author" placeholder="author">
                
            </div>

            <div>
                <?php $err = displayErrors($errors, 'price'); 
                echo $err; 
                ?>
            
                <label>price:</label>	
                <input type="text" name="price" placeholder="price">
            </div>
            


            <div>
                <?php $err = displayErrors($errors, 'year'); 
                echo $err; 
                ?>
            
                <label>Year:</label>	
                <input type="text" name="year" placeholder="year">
            </div>

            
            <div>
                <?php $err = displayErrors($errors, 'cat'); 
                echo $err; 
                ?>
            
                <label>Category:</label>	
                <select name="cat">

                <?php 
                $data = fetchCategory ($conn);
                echo $data;
                ?>
                </select>
            </div>
            <div>
            <?php $err = displayErrors($errors, 'flag'); 
                echo $err; 
                ?>
            
                <label>Flag:</label>	
                <select name="flag">
                    <option name="">Select Flag</option>
                    <?php foreach($flag as $f1) {?>
                        <option value="<?php echo $f1; ?>"><?php echo $f1; ?></option>
                 <?php   } ?>
                    
                    ?>
                </select>
            </div>    
                    
			<div> 
            
                <?php $err = displayErrors($errors, 'image'); 
                echo $err; 
                ?>
            
                <label>Book Image:</label>
                <input type ="file" name="image">
            </div>
               
                <input type="submit" name="add" value="add products">
            
            </form>
            </div>

    <?php
    
    include('includes/footer.php')
    ?>