<?php

$startTime = microtime(1);
$startMem  = memory_get_usage();
session_start();
$length = 32;
$_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
$_SESSION['token-expire'] = time() + 3600;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Software Security Shop</title>
  <?php if (file_exists(__DIR__ . '/_header.php')): ?>
    <?php include_once(__DIR__ . '/_header.php'); ?>
  <?php endif; ?>
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

    <nav class="navtop">
		<div>
			<h1>Software Security Shop</h1>
			<a href="login.php"><i class="fas fa-sign-in-alt"></i>Login</a>
		</div>
	</nav>
    <div class="content">
        <div class="row">
            <form method="post" action="validate.php">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
              <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>"/>
            </div>
            <button type="submit" class="btn btn-primary">Log in</button><br>
            <span><i>In case you forgot your password, please contact the system administrator at <a href="mailto:info@administrator.example">info@administrator.example</a></i></span>
            </form>
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
