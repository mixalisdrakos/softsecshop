<?php

$startTime = microtime(1);
$startMem  = memory_get_usage();
?>
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
        <h3>Please Log in</h3>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form>
            <div class="form-group">
              <label for="user_username">Username</label>
              <input type="text" class="form-control" id="user_username" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label for="user_password">Password</label>
              <input type="password" class="form-control" id="user_password">
            </div>
            <button type="submit" class="btn btn-primary">Log in</button>
            <span><i>In case you forgot your password, please contact the system administrator at <a href="mailto:info@administrator.example">info@administrator.example</a></i></span>
            </form>
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
