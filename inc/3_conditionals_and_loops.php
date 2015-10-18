<h2>Conditionals and Loops</h2>

	Lets loop over the <code>$months</code> and see if the months end with "y"

	<ul>
	<?php

		for ($i = 0; $i < count($months); $i++) {
			if (substr($months[$i],-1)==='y'){
				echo "<li>".$months[$i]." does end with an 'y'</li>";
			} else{
				echo "<li>".$months[$i]." ... No</li>";
			}
		}
	?>
	</ul>

	Let's loop again, this time we use <code>switch</code> to see if the month will be hot

	<ul>
	<?php

		foreach ($months as $value) {

			switch ($value) {
				case 'november':
				case 'december':
				case 'january':
				case 'february':
					echo "<li>".$value.": probably cold!</li>";
					break;
				case 'june':
				case 'july':
				case 'august':
					echo "<li>".$value.": probably hot!</li>";
					break;
				case 'Thomas':
					echo "<li>".$value.": definitively hot!</li>";
					break;
				default:
					echo "<li>".$value.": whatever</li>";
					break;
			}
		}
	?>
	</ul>

	Let's have a look at the <code>tuts_site</code> again and loop through there to print the urls of the ones starting with 'w' or 'p'


	<ul>
	<?php

		foreach ($tuts_sites as $name => $url) {
			if (substr($name,0,1)==='w' || substr($name,0,1)==='p'){
				echo "<li>url of ".$name." is ".$url."</li>";
			} 
		}
	?>
	</ul>