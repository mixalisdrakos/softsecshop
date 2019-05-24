<?php
session_start();

if($_SESSION['token'] != $_POST['token']){
    session_unset();
    session_destroy();
    header('Location: login.php');
	exit();
}
else{

    if (!isset($_SESSION['useron'])) {
    	header('Location: login.php');
    	exit();
    }
     
    if(time() >= $_SESSION['token_expire'] && time() >= $_SESSION['iddle_state']){
        header('Location: login.php');
    	exit();    
    } else{
        
        $_SESSION['iddle_state'] = time() + 600;
        
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
