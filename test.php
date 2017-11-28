<?php
    include 'product.php';

    //create a new copy/instance
   
    $product = new Product(); 
    //the object is not here, its created somewhere in memory(RAM); $product is a pointer to the memory.
//objects are always referenced never copied

   $productTilte = $product->getTitle();

   echo $productTitle;




?>