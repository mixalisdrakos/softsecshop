<?php
session_start();

include_once('_inc/conn.php');

if($_SESSION['token'] != $_POST['token']){
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}

if ($_SESSION['token']==$_POST['token']) {
  if (time() >= $_SESSION['token_expire'] && time() >= $_SESSION['iddle_state']) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();  
  } else {
      
        $_SESSION['iddle_state'] = time() + 600;
      
        $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
        if ( mysqli_connect_errno() ) {
        	
        	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
        
        
        if ( !isset($_POST['username'], $_POST['password']) ) {
            
        	die ('Sorry! You must enter both with username and password. Thanks!!!');
        }
        
        //To be checked for security
        if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
        	
        	$stmt->bind_param('s', $_POST['username']);
        	$stmt->execute();
        	$stmt->store_result();
        }
    
        if ($stmt->num_rows > 0) {
        	$stmt->bind_result($id, $password);
        	$stmt->fetch();
        	
        	if (password_verify($_POST['password'], $password)) {
        		session_regenerate_id();
        		$_SESSION['useron'] = TRUE;
        		$_SESSION['name'] = $_POST['username'];
        		$_SESSION['id'] = $id;
        		header('Location: index.php');
        	} else {
        		echo 'Incorrect password!';
        	}
        } else {
        	echo 'Incorrect username!';
        }
        $stmt->close();
    }
}
?>
