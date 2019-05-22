<?php if (file_exists(__DIR__ . '/css/bootstrap.min.css')): ?>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
<?php else: ?>
    <?php die('Something went wrong! Please check your directory and try again.'); ?>
<?php endif; ?>

<?php if (file_exists(__DIR__ . '/css/custom.css')): ?>
    <link rel="stylesheet" href="/css/custom.css">
<?php else: ?>
    <?php die('Something went wrong! Please check your directory and try again.'); ?>
<?php endif; ?>

<?php if (file_exists(__DIR__ . '/js/jquery-3.4.1.min.js')): ?>
    <script src="/js/jquery-3.4.1.min.js"></script>
<?php else: ?>
    <?php die('Something went wrong! Please check your directory and try again.'); ?>
<?php endif; ?>
