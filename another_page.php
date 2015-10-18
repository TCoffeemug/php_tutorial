<?php require 'inc/header.php' ?>

<h2>$_GET from index page</h2>

<?php

$message = 'no message received';

if(isset($_GET['message'])){
	$message=htmlspecialchars($_GET['message']);
}

echo $message;

?>

<?php require 'inc/footer.php' ?>