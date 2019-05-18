<?php

$startTime = microtime(1);
$startMem  = memory_get_usage();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Software Security Shop</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <script src="/js/jquery-3.4.1.min"></script>
</head>
<body>

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
<form method="post" action="/index.php">
  <input type="text" name="username" id="username" value="">
</form>
<div class="container">
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
    <span><i>In case you forgot your password, please contact the system administrator at <a href="mailto:info@administrator.example"></a></i></span>
  </form>
  </div>
  <div class="col-lg-12 col-md-12">
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
