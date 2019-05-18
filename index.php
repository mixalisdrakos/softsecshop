<?php

//$startTime = microtime(1);
//$startMem  = memory_get_usage();
?>
<?php if(!isset($user)): ?>
    <?php echo "<script> window.location.replace('login.php') </script>" ?>
    <?php die("You have to login first"); ?>
<?php endif; ?>
<?php if(isset($user)): ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Software Security Shop</title>
        <?php if (file_exists(__DIR__ . '/css/bootstrap.min.css')): ?>
            <link rel="stylesheet" href="/css/bootstrap.min.css">
        <?php else: ?>
            <?php die('Something went wrong! Please check your directory and try again.'); ?>
        <?php endif; ?>
        
        <?php if (file_exists(__DIR__ . '/js/jquery-3.4.1.min.js')): ?>
            <script src="/js/jquery-3.4.1.min.js"></script>
        <?php else: ?>
            <?php die('Something went wrong! Please check your directory and try again.'); ?>
        <?php endif; ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>Information Security Eshop</h1>
            </div>
        </div>
    
    <?php
    if (file_exists(__DIR__ . '/_header.php'))
    {
    	include_once __DIR__ . '/_header.php';
    }
    
    else if (!file_exists(__DIR__ . '/_header.php'))
    {
    	die('Something went wrong! Please check your directory and try again.');
    }
    ?>
    <div class="container">
        <div class="row">
            <h3>Homepage</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
            </div>
            <div class="col-lg-12 col-md-12">
            </div>
        </div>
    </div>
    
    
    
    <?php
    if (file_exists(__DIR__ . '/_footer.php'))
    {
    	include_once __DIR__ . '/_footer.php';
    }
    
    else if (!file_exists(__DIR__ . '/_footer.php'))
    {
    	die('Something went wrong! Please check your directory and try again.');
    }
    ?>

    </body>
    </html>
    <?php endif; ?>
