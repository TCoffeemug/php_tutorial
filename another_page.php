<?php require 'inc/header.php' ?>

<?php 
	

	$status='omg';
	if  ($_SERVER['REQUEST_METHOD']=='POST'){
		if (mail($_POST["email"], $_POST["subject"], $_POST["message"])){
			$status="Thank you, a mail has been sent.";
		} else {
			$status='thanks, but we didn\'t send anything';
		}
	};


?>

<h2>$_GET from index page</h2>

<?php

$message = 'no message received';

if(isset($_GET['message'])){
	$message=htmlspecialchars($_GET['message']);
} else if(isset($_GET['name'])){
	$message='query string was modified by POST and contains name: '.htmlspecialchars($_GET['name']);
}

echo $message;

?>

<h2>$_POST: let's do some post action</h2>

<h3>First take a look what happens when we use the get method in a form</h3>

<form action="" method="get">
	<ul>
		<li>
			<label for="name">Name:</label>
			<input type="text" name="name">
		</li>
		<li>
			<input type="submit" value="Go!">
		</li>
	</ul>
</form>

<p>For the $_SERVER['REQUEST_METHOD'] variable that means: <?php echo $_SERVER['REQUEST_METHOD']; ?></p>


<h3>Now let's take the post method in a form</h3>


<form action="" method="post">
	<ul>
		<li>
			<label for="name">Name:</label>
			<input type="text" name="name" id="name">
		</li>
		<li>
			<label for="email">Email:</label>
			<input type="text" name="email" id="email">
		</li>
		<li>
			<label for="subject">Subject:</label>
			<input type="text" name="subject" id="subject">
		</li>
		<li>
			<label for="message">Your message:</label><br>
			<textarea name="message" id="message"></textarea>
		</li>
		<li>
			<input type="submit" value="Go!">
		</li>
	</ul>
</form>

<?php 

if(!empty($status)){ 
	echo $status;
} else {
	echo 'nothing mailed';
}

?>


<p>Here we print the $_POST variable if we have one: </p>
<?php 

if (!empty($_POST)){
	print_r($_POST);
	}

?>

<?php require 'inc/footer.php' ?>