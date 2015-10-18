<h2>printf</h2>

with printf you can build clean strings

<ul>
<?php 
	
	$name = "Thomas";
	$age = 38;
	$message = "Hi, my name is %s and I am %d.";

	echo '<li>print a message with printf</li>';
	printf($message, $name, $age);
	echo '<li>try to echo what is created with printf by storing it in a variable first</li>';
	$greeting = printf($message, $name, $age);
	echo ' ... message stored in $greeting was: '.$greeting;
	echo '<li>echo a message created with sprintf</li>';
	echo sprintf($message, $name, $age);

?>
</ul>	

<p>let's see what we can do with <code>sscanf</code></p>

<ul>
<?php 

	$scanresult = sscanf("This post was made on October 14th, 2015","%s");
	print_r($scanresult);

	$scanresult = sscanf("October 14th, 2015","%s %[^,], %d");
	print_r($scanresult);
	
	list($month, $day, $year) = sscanf("October 14th, 2015","%s %[^,], %d");
	echo "<li>Month is: $month</li>";
	echo "<li>Day is: $day</li>";
	echo "<li>Year is: $year</li>";

?>
</ul>	