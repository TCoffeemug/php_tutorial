<h2>Arrays</h2>

	We created arrays on top of our document:
	<ui>
		<li><code>$months</code> (containung the name of the months)</li>
		<li><code>$tuts_sites</code> (containing the name of tutorial websites)</li>
	</ui>

	<h3>months</h3>

	<p>Let's echo out the 5th element on <code>$months</code>: 
	<?php 
	//print_r($months); 
	echo $months[4];
	?>
	</p>
	<p><code>var_dump</code> of <code>$months</code> gives us:
	<?php 
	var_dump($months); 
	?>
	</p>
	</p>
	<p><code>print_r</code> of <code>$months</code> gives us:
	<?php 
	print_r($months); 
	?>
	</p>

	<p>Let's add something using <code>$months[]='something'</code></p>

	<?php

		$months[] = 'Thomas';
		print_r($months);
	?>

	<p>Let's delete something using <code>array_pop</code> and <code>array_shift</code></p>

	<?php

		$lastName = array_pop($months);
		$firstMonth = array_shift($months);
		print_r($months);
	?>

	<p>Let's add the names the stuff again using <code>array_push</code> and <code>array_unshift</code></p>

	<?php
		array_push($months, $firstMonth);
		array_unshift($months, $lastName);
		print_r($months);
	?>

	<h3>tuts_sites</h3>

	Now let's loop through our array of tutorials with <code>foreach</code> and put them into an unordered list:
	<ul>
		<?php 

		// foreach ($tuts_sites as $site) {
		// 	echo "<li>$site</li>";
		// }

		foreach ($tuts_sites as $name => $url) {
			echo "<li><a href=$url>".ucwords($name)."</a></li>";
		}

		?>
	</ul>

	<p>Let's slice that array</p>

	<ul>
		<li><?php 
		$firstSlice = array_slice($tuts_sites, 2);
		print_r($firstSlice);
		?></li>
		<li><?php 
		$secondSlice = array_slice($tuts_sites, 2, 1);
		print_r($secondSlice);
		?></li>
		<li><?php 
		$thirdSlice = array_slice($tuts_sites, -1, 2);
		print_r($thirdSlice);
		?></li>
		<li><?php 
		print_r($tuts_sites);
		?></li>
	</ul>

	<p>Let's use a filter function on that array</p>

	<?php

		$isStrlengthBiggerThan25 = array_filter($tuts_sites, function($item){
			return strlen($item) >= 25;
		});
		print_r($isStrlengthBiggerThan25);

	?>