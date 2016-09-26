<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Analytics</title>
<link rel="stylesheet" type="text/css" href="css/analytics.css" />
</head>
<body>

<?php 

define("URL_TO_TRACKER_SITE" , "http://localhost/analytics/index.php"); 

if(isset($_REQUEST['arg']))
{
	$_SESSION['arg']=$_REQUEST['arg'];
}

if(!isset($_REQUEST['activity']))
{
	if(isset($_SESSION['activity']) && $_SESSION['activity']=="codes")
	{
		codes();
	}
	else if(!isset($_SESSION['arg']) || empty($_SESSION['arg']))
	{
		landing();
	}
}

else if($_REQUEST["activity"]=="codes")
{
	codes();
}

else if($_REQUEST["activity"]=="counts")
{
	counts();
}

else if($_REQUEST["activity"]=="analytics")
{
	analytics();
}


function landing()
{	
	print("<h1>Web Page Tagging Analytics</h1>");
	print("
	<form name =\"formanalysis\" method=\"GET\">
		<input type=\"text\" name=\"arg\" placeholder=\"Enter Site Magic String\" /> </br>

		<select name=\"activity\" id=\"analysisid\">
			<option value=\"analytics\">View Analytics</option>
			<option value=\"codes\">Get Site Tracker Codes</option>
		</select> </br>

		<input name=\"submitbutton\" type=\"submit\" value=\"Go\" />
	</form>");
}

function codes()
{
	
	if(!isset($_SESSION["arg"]) || empty($_SESSION["arg"]))
	{
		
		landing();
		return;
	}	
	
	$placeholdertext="Enter a URL to track";
	$XXXX="";
	$YYYY="";
	$_SESSION['activity']="codes";
	print("<h1>Tracker Codes - Web Page Tagging Analytics</h1>");	
	print("<form name=\"formtrack\" method=\"GET\">");
	if(!isset($_REQUEST['arg2']) || empty($_REQUEST['arg2']))
	{
		print("<input type=\"text\" name=\"arg2\" placeholder=\"$placeholdertext\"> </br>");
		print("<input type=\"submit\" name=\"submitarg2\" />");
			
	}	
	else
	{
		$valueoftext=$_REQUEST['arg2'];
		$XXXX=sha1($_SESSION['arg'].$_REQUEST['arg2']);
		$YYYY=sha1($_SESSION['arg']);
		print("<input type=\"text\" name=\"arg2\" value=$valueoftext> </br>");
		print("<input type=\"submit\" name=\"submitarg2\" />");	
		print("<h2>Add the following code to the web page of the site with the url just entered</h2>");
		$codesnippet="<script src=\"".URL_TO_TRACKER_SITE."/?activity=counts&arg=$YYYY&arg2=$XXXX\"/>";
		echo htmlentities($codesnippet);

		session_unset();
		session_destroy();
	
		if(!file_exists("./url_lookups.txt"))
		{
			$lookups=[];
			$lookups[$XXXX] = $_REQUEST['arg2'];
				
		}
		else
		{
			$contents=file_get_contents("./url_lookups.txt");
			$lookups=unserialize($contents);
			$lookups[$XXXX]=$_REQUEST['arg2'];
		}

		$lookupstofile=serialize($lookups);
		file_put_contents("./url_lookups.txt",$lookupstofile);	
	}	
	
}

function counts()
{

	if(!empty($_REQUEST['arg']) && !empty($_REQUEST['arg2']))
	{
		$IP=$_SERVER["REMOTE_ADDR"];

		if(!file_exists("./counts.txt"))
		{	
			$counts=[];
			
		}
		else
		{
			$contentsraw=file_get_contents("./counts.txt");
			$counts=unserialize($contentsraw);
		}
		
		if(!isset($counts[$_REQUEST["arg"]][$_REQUEST["arg2"]][$IP]))
		{
			$counts[$_REQUEST["arg"]][$_REQUEST["arg2"]][$IP]=1;
		}
		else
		{
			$counts[$_REQUEST["arg"]][$_REQUEST["arg2"]][$IP]++;
		}
		
		file_put_contents("./counts.txt",serialize($counts));
	}
}

function analytics()
{
	print("<h1>View Analytics - Web Page Tagging Analytics</h1>");
	print("<h2>Analytics for ". $_REQUEST['arg']."</h2>");
	$lookups=[];
	$counts=[];
	if (file_exists("./url_lookups.txt") && file_exists("./counts.txt"))
	{
		$lookups=unserialize(file_get_contents("./url_lookups.txt"));
		$counts=unserialize(file_get_contents("./counts.txt"));
	}
	
	$arrayindex=sha1($_REQUEST['arg']);
	if(!array_key_exists($arrayindex,$counts))
	{
		print("<h3>No analytics information for ".$_REQUEST['arg']." found!</h3>");
		return;
	}
	else
	{
		$magiclocator=$counts[$arrayindex];
		foreach($magiclocator as $urlindexing=>$ipcountinfo)
		{
			$corresponding_url=$lookups[$urlindexing];
			$sum=0;
			foreach($ipcountinfo as $countip=>$countinfo)
			{
				$sum+=$countinfo;
			}
			print("<h3>".$corresponding_url."  ".$sum."</h3>");
		
			print("<table>");
			print("<tr><th>IP</th><th>Count</th></tr>");
			foreach($ipcountinfo as $key=>$value)
			{
				print("<tr>");
				print("<td>".$key."</td>");
				print("<td>".$value."</td>");
				print("</tr>");
			}
			print("</table>");
		
		}
	}
	
}
?>

</body>
</html>
