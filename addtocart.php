<?php
session_start();

if($_SESSION['token'] != $_POST['token']){
    header('Location: login.php');
	exit();
}
else{

    if (!isset($_SESSION['useron'])) {
    	header('Location: login.php');
    	exit();
    }
    /*
     * SKUs = 'LPN45', 'LPX230U', 'MBP2019U', 'HPP12U'
     */
     
    if(time() >= $_SESSION['token-expire']){
        header('Location: login.php');
    	exit();    
    } else{
        require_once("_inc/controller.php");
        
        $db_handle = new SecureDB;
        
        if($_POST["searchbar"]){
          if($_POST["searchbar"] != null && $_POST["item"] == null){
            $sku = $_POST["searchbar"];
            $productByCode = $db_handle->fetchProducts($sku);
          }
          unset($_POST["searchbar"]);
          header('Content-Type: application/json');
          echo json_encode($productByCode);
        }
        if($_POST["prodQuantity"] != null && $_POST["prodPrice"] != null){
          $prodQuantity = (int)$_POST["prodQuantity"];
          $prodPrice = (float)$_POST["prodPrice"];
          $prodName = $_POST["prodName"];
          //echo $prodQuantity;
          //echo $prodPrice;
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
