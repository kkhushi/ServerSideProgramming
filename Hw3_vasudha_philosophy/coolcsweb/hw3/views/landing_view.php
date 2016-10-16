<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head><title>Five Thousand Characters</title></head>
<body>
<h1>Five Thousand Characters</h1>
<a href="Hw3/coolcsweb/hw3/index.php?c=controllerswrite&m=render">Write Something!</a> <br />
<p> Check out what people are writing...</p>
<form>
<input type="text" placeholder="Phrase Filter" name="phrases" /> <br />
<select name="genres">
<option selected="selected" value="all">All Genres</option>
</select> <br />
<input type="submit" value="Go" />
</form>

<?php
if(isset($_REQUEST['phrases']))
{
	$_SESSION['phrases']=$_REQUEST['phrases'];
	$_SESSION['genre']=$_REQUEST['genres'];
}
?>
<h3>Highest Rated</h3>
<ol>
</ol>
<h3>Most Viewed</h3>
<ol>
</ol>
<h3>Newest</h3>
<ol>
</ol>
</body>
</html>



