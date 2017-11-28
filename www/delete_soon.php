<?php $errors =[];

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



        
        if($_GET['cat_id']) {
            $cat_id = $_GET['cat_id'];
        }

        $item = getCategoryById($conn, $cat_id);

        $errors = [];

        if(array_key_exists('edit', $_POST)) {

            if(empty($_POST['cat_name'])) {

                $errors['cat_name'] = "Please enter a category name";
            }
        if(empty($errors)) {
            $clean =array_map('trim', $_POST);
            $clean['id'] = $cat_id;

            updateCategory($conn, $clean);

            redirect("view_category.php");

            ?>