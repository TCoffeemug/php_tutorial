<h2>Using variables</h2>

	Let's create a variable with a name: '<code>$name=Thomas Eisbrenner</code>'. 
	<p>	If we echo it with <b>single quotation marks</b> we get this result:</p>
	<p><i><?php
	$name = "Thomas Eisbrenner";
	echo 'Hello $name';
	?></i></p>

	<p>If we echo it with <b>double quotation marks</b> we get this result:</p>
	<?php
	echo "<p><i>Hello $name</i></p>";
	echo "<p>If we use <b>concatenation</b>, we get this result</p>";
	echo '<p><i>Hello ' . $name.'</i></p>';
	?>