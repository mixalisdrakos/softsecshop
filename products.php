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
     
    if(time() >= $_SESSION['token-expire']){
        header('Location: login.php');
    	exit();    
    } else{
        require_once("_inc/controller.php");
        
        $db_handle = new SecureDB;
        
        if($_POST["products"]){
          $productByCode = $db_handle->fetchAllProducts();
          header('Content-Type: application/json');
          echo json_encode($productByCode);
        }
    }
}
?>
