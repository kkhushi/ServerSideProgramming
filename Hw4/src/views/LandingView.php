<?php
namespace thrill_seekers\hw4\views;

use thrill_seekers\hw4\views\View;
use thrill_seekers\hw4\configs\Config;

class LandingView extends View
{
	public $headersdisplay;

	public function __construct()
	{
		
		$this->headersdisplay=new HeaderElement($this);
	}

	public function render($data)
	{
		$this->headersdisplay->render($data); ?>
		<body>
		<h1><?=$data['title']?></h1>
		<p>Share your data in charts!</p>
		<form action="<?=Config::BASE_URL?>?c=LandingController&a=process">
				<label for="titleid"><?=$this->data['texttitle']?></label>
				<input type="text" name="charttitle" id="charttitleid" value="<?=$this->data['charttitle']?>"/> <br/>
				<textarea rows="10" cols="10" id="chartdataid" name="chartdata" placeholder="<?=$this->data['placeholder']?>"></textarea><br/>
				<input type="submit" value="Share" name="sharebutton" />
		</form>
		
		
	<?php }
} ?>
