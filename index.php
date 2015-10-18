<?php
	$months = array('january','february','march','april','may','june','july','august','september','october','november','december');
	//$tuts_sites = array('nettuts+','psdtuts+','webdesigntuts+','wptuts+','mobiletuts+');
	$tuts_sites = array(
		'nettuts+' => 'http://net.tutsplus.com',
		'psdtuts+' => 'http://psd.tutsplus.com',
		'webdesigntuts+' => 'http://webdesign.tutsplus.com',
		'wptuts+' => 'http://wp.tutsplus.com',
		'mobiletuts+' => 'http://mobile.tutsplus.com');
	//var_dump($months);
?>

<?php require 'inc/header.php'; ?>

<p>Pleae have a look at the different php file in the include folder <i>"inc"</i></p>

<?php include 'inc/1_variables.php'; ?>

<?php include 'inc/2_arrays.php'; ?>
	
<?php include 'inc/3_conditionals_and_loops.php'; ?>

<?php include 'inc/4_printf.php'; ?>

<?php include 'inc/5_functions.php'; ?>

<h2>Objects (at low level)</h2>

<p>Let's have a look at how we saved the traits of a person in an array</p>

<?php

$person = array(
	'first' => 'John',
	'last' => 'Doe',
	'job' => 'Teacher'
);

var_dump($person);

?>

<p>Now let's do this within a class</p>

<?php

class Person {
	public $name;
	public $job;

	public function __construct($name, $job){
		$this->name = $name;
		$this->job = $job;
	}

	public function communicate($style = 'voice'){
		return $this->name.' is communicating with '.$style;
	}
}

$p = new Person('John Connor','Savior');
var_dump($p);
echo '<p>'.$p->communicate('telepathy').'</p>';

?>

<p>Sometimes we want to use a generic class</p>

<?php

$person2 = new stdClass;
$person2->firstName = 'Jason';
$person2->lastName = 'Bourne';
$person2->job = 'former Secret Agent';
var_dump($person);

?>

<p>Also we can cast an array to an object. Let's take the <<code>$person</code> array from above</p>

<?php

echo "<p>".$person['first']."</p>";

$o = (object)$person;

echo "<p>".$o->first."</p>";

var_dump($o);

?>

<h2>Heredocs</h2>

<?php 

$post = array(
	'author'		=> 'Thomas Eisbrenner',
	'title'			=> 'some post',
	'body'			=> 'Here is the message body',
	'publish-date'	=> '10-16-2015'
	);

//$email = "<h3>{$post['title']}</h3><p>By: {$post['author']}</p><div>{$post['body']}</div>";
// better way:
$email = sprintf("<h3>%s</h3><p>By: %s</p><div>%s</div>", $post['title'], $post['author'], $post['body']);

echo $email;

?>

<h4>even better would be to use Heredocs: </h4>


<?php 

$email = <<<EOT
<h3>{$post['title']}</h3>
<p>By: {$post['author']}</p>
<div>{$post['body']}</div>
EOT;

echo $email;

?>

<h4>a useful method to extract variables from an array is <code>extract</code>. This makes this thing even cleaner: </h4>

<?php 

extract($post);

$email = <<<EOT
<h3>$title</h3>
<p>By: $author</p>
<div>$body</div>
EOT;

echo $email;

?>


<h2>$_GET</h2>

we can fetch data from the query string using the html-verb <code>$_GET</code>. A query string is visible in the URL after the <code>?</code>. So let's put some strings there and see what happens:

<p>
<?php
	$info = 'no valid query string';
	if (isset($_GET['job'])){
		$info=$_GET['job'];
	} else if (isset($_GET['name'])){
		$info=$_GET['name'];
	}
	echo $info;

?>
</p>

(try out values like: 
<ul>
	<li>http://localhost/?job=superman</li>
	<li>http://localhost/?name=bob</li>
	<li>http://localhost/?name=bob&job=superman</li>
	<li>http://localhost/?name=<h3>malicious code</h3></li>
</ul>)


<h3>specialchars</h3>

the method <code>specialchars()</code> convert special characters to HTML entities. Consider the following:

<p>Here is the <\code> tag.</p>
<p>Here is the &lt;code> tag.</p>
<p>Here is the <?php echo htmlspecialchars('<code>'); ?> tag.</p>

<p>We can use that to make the parsing of our query safe</p>

<?php
	$info = 'no valid query string';
	if (isset($_GET['job'])){
		$info=htmlspecialchars($_GET['job']);
	} else if (isset($_GET['name'])){
		$info=htmlspecialchars($_GET['name']);
	}
	echo $info;

?>

<p>So let's pass the info to another page</p>
<a href='another_page.php?message=message%20from%20index%20page'>Link to another page</a>

<h2>$_POST</h2>
<p>Again let's use the "another page"</p>
<a href='another_page.php?message=look at the $_POST paragraph'>Link to another page</a>

<?php require 'inc/footer.php'; ?>