<?php
session_start();

if($_SESSION['token'] != $_POST['token']){
    header('Location: login.php');
    exit();
} else {
    if(time() >= $_SESSION['token-expire']){
        header('Location: login.php');
        exit();
    } else{
        if(!isset($_SESSION['useron'])){
            header('Location: login.php');
            exit();
        } else{
            $cartItems = json_decode($_POST['hiddencheckout']);
            
            ?>
            <!DOCTYPE html>
            <html>
            	<head>
            		<meta charset="utf-8">
            		<title>Software Security Eshop</title>
            		<?php if (file_exists(__DIR__ . '/_header.php')): ?>
            	    <?php include_once(__DIR__ . '/_header.php'); ?>
            	  <?php endif; ?>
            	</head>
            	<body class="loggedin">
            		<nav class="navtop">
            			<div>
            				<h1>Software Security Shop</h1>
                            <a href="index.php?id=<?php echo $_SESSION['token']; ?>">Home</a>
                            <a href="catalogue.php?id=<?php echo $_SESSION['token']; ?>">Catalogue</a>
            				<a href="logout.php">Logout</a>
            			</div>
            		</nav>
            		<div class="content" id="content">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-12 col-md-12 text-center">
                            <h2>Checkout</h2>
                            <p>&nbsp;</p>
                            <table style="width:100%">
                              <tr>
                                <th>Item</th>
                                <th>Quantity</th> 
                                <th>Price</th>
                              </tr>
                                <?php foreach($cartItems as $ci): ?>
                                <tr>
                                    <td><?php echo $ci[0]; ?></td>
                                    <td><?php echo $ci[1]; ?></td>
                                    <td><?php echo $ci[2]; ?></td>
                                </tr>
                                <?php endforeach; ?>
                              <tr>
                                <td></td>
                                <td></td> 
                                <td></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td><strong>Total Qty.: <?php echo $_POST["finalQuantity"]; ?></strong></td> 
                                <td><strong>Total Price: <?php echo $_POST["finalPrice"]; ?></strong></td> 
                              </tr>
                            </table>
                            <p>&nbsp;</p>
                            <form method="post" id="orderConfirmationForm">
                              <label for="address">Address *</label>
                              <input type="text" name="customerAddress" id="customerAddress" required>
                              <input type="hidden" name="cartDescription" id="cartDescription" value='<?php echo $_POST["hiddencheckout"]; ?>'>
                              <input type="hidden" name="totalQty" id="totalQty" value="<?php echo $_POST["finalQuantity"]; ?>">
                              <input type="hidden" name="totalPrice" id="totalPrice" value="<?php echo $_POST["finalPrice"]; ?>">
                              <input type="hidden" id="finalToken" name="token" value="<?php echo $_SESSION['token']; ?>">
                              <input type="submit" name="Submit" value="Send Order">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script>
                        $("#orderConfirmationForm").submit(function(){
                          event.preventDefault();
                          var customerAddress = $("input#customerAddress").val();
                          var cartDescription = $("input#cartDescription").val();
                          var totalQuantity = $("input#totalQty").val();
                          var totalPrice = $("input#totalPrice").val();
                          var token = $("input#finalToken").val();
                          $.ajax({
                                url:"/confirmation.php ",
                                method:"POST",
                                data:{
                                  customerAddress: customerAddress,
                                  cartDescription: cartDescription,
                                  totalQuantity: totalQuantity,
                                  totalPrice: totalPrice,
                                  token: token
                                },
                                success:function(data) {
                                  console.log(data);
                               },
                               error:function(){
                                alert("error");
                               }
                             });
                        });
                    </script>
                    <?php if (file_exists(__DIR__ . '/cart_footer.php')): ?>
                      <?php include_once(__DIR__ . '/cart_footer.php'); ?>
                    <?php endif; ?>
                    <?php if (file_exists(__DIR__ . '/_footer.php')): ?>
                      <?php include_once(__DIR__ . '/_footer.php'); ?>
                    <?php endif; ?>
                </body>
            </html>
                      
            <?php
        }
    }
}
?>
