<h2>Functions</h2>

<?php 

$description = 'Now let\'s work with functions.';

function describe_functions(){
	$description = "Functions are pices of code that can be reused and are written for a certain purpose. ";
	return $description;
}

echo "$description ".describe_functions();

function print_this_string($input = '<i>thisString. </i>'){
	echo $input;
}

print_this_string("Functions can expect parameters and they can also be given an optional parameter, like ");
print_this_string();


echo '<p>Let\'s assume an array like this: </p>';

$arr = array('name' => "Joe", 'age' => "40", 'occupation' => "SW tester");

print_r($arr);

function pp_prettyPrint($value){
	echo '<p>We print a pretty version of $value using <code>pp_prettyPrint()</code><p>';
	echo '<pre>';
	print_r($value);
	echo '</pre>';	
}

pp_prettyPrint($arr);


function array_pluck($toPluck, $arr){
	$pluckedValues = array();

	foreach($arr as $item){
		$pluckedValues[] =$item[$toPluck];
	}

	return $pluckedValues;
}

$people = array(
	array('name' => "Joe", 'age' => "40", 'occupation' => "SW tester"),
	array('name' => "Thomas", 'age' => "38", 'occupation' => "SW tester"),
	array('name' => "Kiara", 'age' => "21", 'occupation' => "SW developer")
);

echo '<p>Let\'s write another function printing out a certain <i>attribute</i> of the array <code>$people</code></p>';

pp_prettyPrint(array_pluck('name',$people));
pp_prettyPrint(array_pluck('age',$people));
pp_prettyPrint(array_pluck('occupation',$people));

echo '<p>Let\'s have a look at array maps</p>';

function array_pluck_too($toPluck, $arr){
	return array_map(function($item) use($toPluck){
		return $item[$toPluck];
	}, $arr);
}

pp_prettyPrint(array_pluck_too('name',$people));

?>