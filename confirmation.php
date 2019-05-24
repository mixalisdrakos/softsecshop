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
    	session_unset();
        session_destroy();
    	header('Location: login.php');
    	exit();
    }
    /*
     * SKUs = 'LPN45', 'LPX230U', 'MBP2019U', 'HPP12U'
     */
     
    if(time() >= $_SESSION['token_expire'] && time() >= $_SESSION['iddle_state']){
        session_unset();
        session_destroy();
        header('Location: login.php');
    	exit();    
    } else{
        
        $_SESSION['iddle_state'] = time() + 600;
        
        if($_POST["totalPrice"]){
          if($_POST["totalPrice"] != null || $_POST["totalPrice"] != 0){
              if($_SESSION['orderConfirmation'] != $_POST['confirmation']){
                    $orderConfirmation = array(
                        "confirmed" => "yes",
                        "sent"      => "no"
                    );
                    header('Content-Type: application/json');
                    echo json_encode($orderConfirmation);
                }
              if($_SESSION['orderConfirmation'] == $_POST['confirmation']){
                    $cartItems = json_decode($_POST["cartDescription"]);
                    $to = "alcaeusdim@gmail.com, gbkaragiannidis@gmail.com, m.drakos92@gmail.com, vergopoulos@gmail.com";
                    $subject = "New Order - Software Security Shop";
        
                    $message = "
                    <html>
                    <head>
                    <title>New Order - Software Security Shop</title>
                    </head>
                    <body>
                    <h3>New Order - Software Security Shop</h3>
                    <p>Dear " . $_SESSION['name'] . ",</p>
                    <p>Your order has been submitted sucessfully and will be delivered to <strong>" . $_POST['customerAddress'] . "</strong>!</p>
                    <br>
                    <p>Below you will find details according to your placement:</p>
                    <table style='text-align: center;'>
                    <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    </tr>";
                    foreach($cartItems as $ci){
                        $message .= "
                        <tr>
                            <td>" . $ci[0]. "</td>
                            <td>" . $ci[1]. "</td>
                            <td>" . $ci[2]. ".00 €</td>
                        </tr>";
                    }
                    $message .= "
                      <tr>
                        <td></td>
                        <td></td> 
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><strong>Total Qty.: " . $_POST["totalQuantity"] ."</strong></td> 
                        <td><strong>Total Price: " . $_POST["totalPrice"] . ".00 €</strong></td> 
                      </tr>
                    </table>
                    </body>
                    </html>
                    ";
                    
                    // Always set content-type when sending HTML email
                    // To send HTML mail, the Content-type header must be set
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html; charset=utf-8\r\n";
                    $headers .= "Reply-To: alkaanag@gmail.com\r\n";
                    
                    // send email
                    mail($to, $subject, $message, $headers);
                    
                    $orderConfirmation = array(
                        "approved"  => "yes",
                        "sent"      => "yes"
                    );
                    header('Content-Type: application/json');
                    echo json_encode($orderConfirmation);
                }
            }
        }
    }
}
?>
