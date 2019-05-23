<?php
session_start();

/*
 * Token validation from $.ajax request
 */

if($_SESSION['token'] != $_POST['token']){
    header('Location: login.php');
	exit();
}
else{
    
    /*
     * User session validation (TRUE || FALSE)
     */
	
    if (!isset($_SESSION['useron'])) {
    	header('Location: login.php');
    	exit();
    }
     
    /*
     * Token expiration time validation
     */
	
    if(time() >= $_SESSION['token-expire']){
        header('Location: login.php');
    	exit();    
    } else{
        require_once("_inc/controller.php");
        
        $db_handle = new SecureDB;
        
	/*
         * $.ajax results from Search Form
         */
	    
        if($_POST["searchbar"]){
          if($_POST["searchbar"] != null && $_POST["item"] == null){
            $sku = $_POST["searchbar"];
            $productByCode = $db_handle->fetchProducts($sku);
          }
          unset($_POST["searchbar"]);
          header('Content-Type: application/json');
          echo json_encode($productByCode);
        }
	    
	/*
         * $.ajax results from All Products button
         */
	    
        if($_POST["prodQuantity"] != null && $_POST["prodPrice"] != null){
          $prodQuantity = (int)$_POST["prodQuantity"];
          $prodPrice = (float)$_POST["prodPrice"];
          $prodName = $_POST["prodName"];
          $itemToCart = array(
            "prodQuantity" => $prodQuantity,
            "prodPrice"    => $prodPrice,
            "prodName"     => $prodName
          );
          header('Content-Type: application/json');
          echo json_encode($itemToCart);
        }
    }
}
?>
