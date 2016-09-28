<!DOCTYPE html>
<html>
<head>
<title>Analytics</title>
<link rel="stylesheet" type="text/css" href="css/analytics.css" />
</head>
<body>

<?php 

define("URL_TO_TRACKER_SITE" , "http://localhost/analytics/index.php"); 

if(!isset($_REQUEST["activity"]) || !isset($_REQUEST["arg"]) || empty($_REQUEST["arg"]))
{	
	landing();	
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
?>
	<h1>Web Page Tagging Analytics</h1>
	<div class="forminput_info">
	<form name ="formanalysis" method="GET">
		<input type="text" name="arg" placeholder="Enter Site Magic String" /> </br>

		<select name="activity" id="analysisid">
			<option value="analytics">View Analytics</option>
			<option value="codes">Get Site Tracker Codes</option>
		</select> </br>

		<input name="submitbutton" type="submit" value="Go" />
	</form>
	</div>
<?php
}

function codes()
{
	
	if(!isset($_REQUEST["arg"]) || empty($_REQUEST["arg"]))
	{
		
		landing();
		return;
	}	
	
	$placeholdertext="Enter a URL to track";
	$XXXX="";
	$YYYY="";
	$valueoftext="";
	$lookups=[];
	$empty_form=true;

	if(isset($_REQUEST["arg2"]) && !empty($_REQUEST["arg2"]))
	{
		$empty_form=false;
		$valueoftext=$_REQUEST["arg2"];
		$XXXX=sha1($_REQUEST["arg"].$_REQUEST["arg2"]);
		$YYYY=sha1($_REQUEST["arg"]);

		if(file_exists("./url_lookups.txt"))
		{
			$contents=file_get_contents("./url_lookups.txt");
			$lookups=unserialize($contents);
		}
		
		$lookups[$XXXX]=$_REQUEST["arg2"];
		

		$lookupstofile=serialize($lookups);
		file_put_contents("./url_lookups.txt",$lookupstofile);	
	}
?>
	<h1>Tracker Codes - Web Page Tagging Analytics</h1>
	<div class="forminput_info">	
	<form name="formtrack" method="GET">
		<input type="hidden" name="activity" value="codes"/>
<?php
	
	print("<input type=\"hidden\" name=\"arg\" value=\"".$_REQUEST["arg"]."\"/>");
	print("<input type=\"text\" name=\"arg2\" placeholder=\"$placeholdertext\" value=\"$valueoftext\"> </br>");
?>
		<input type="submit" name="submitarg2" value="Go" />
	</form>
	</div>
	
<?php
	if(!$empty_form)
	{	
		print("<h2>Add the following code to the web page of the site with the url just entered</h2>");
		$codesnippet="<script src=\"".URL_TO_TRACKER_SITE."/?activity=counts&arg=$YYYY&arg2=$XXXX\"/>";
		print("<span>".htmlentities($codesnippet)."</span>");
	}
?>	

<?php	
}

function counts()
{

	if(!empty($_REQUEST["arg"]) && !empty($_REQUEST["arg2"]))
	{
		$IP=$_SERVER["REMOTE_ADDR"];	
		$counts=[];
	
		if(file_exists("./counts.txt"))
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
	print("<h2>Analytics for ". $_REQUEST["arg"]."</h2>");
	$lookups=[];
	$counts=[];
	if (file_exists("./url_lookups.txt") && file_exists("./counts.txt"))
	{
		$lookups=unserialize(file_get_contents("./url_lookups.txt"));
		$counts=unserialize(file_get_contents("./counts.txt"));
	}
	
	$arrayindex=sha1($_REQUEST["arg"]);
	if(!array_key_exists($arrayindex,$counts))
	{
		print("<h3 class=\"noanalytics_message\">No analytics information for ".$_REQUEST["arg"]." found!</h3>");
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
