<?php

//$startTime = microtime(1);
//$startMem  = memory_get_usage();

session_start();

if (!isset($_SESSION['useron'])) {
	header('Location: login.php');
	exit();
}
?>
<?php if(isset($_SESSION['token']) || $_SESSION['token'] != $_GET['id']): ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
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
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <strong><?php echo $_SESSION['name']; ?></strong>!</p>

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
