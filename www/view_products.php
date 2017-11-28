
<?php
    session_start();

	$page_title = "View category";
	
	include('includes/function.php');
	
    include('includes/dashboard_header.php');

    include('includes/db.php');
   
?>


	<div class="wrapper">
		<div id="stream">
			<table id="tab">
				<thead>
					<tr>
						<th>title</th>
						<th>author</th>
						<th>price</th>
                        <th>category</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
					</tr>
				</thead>
				<tbody>
                   <?php
                    $prod = viewProducts($conn); echo $prod;
                    ?>
          		</tbody>
			</table>
		</div>

		<div class="paginated">
			<a href="#">1</a>
			<a href="#">2</a>
			