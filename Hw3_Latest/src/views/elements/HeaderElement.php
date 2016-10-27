<?php namespace thrill_seekers\hw3\views\elements;

use thrill_seekers\hw3\views\View;
use thrill_seekers\hw3\configs\Config;

class HeaderElement extends Element
{
	public function render($data)
	{ ?>
		<!DOCTYPE html>
		<html>
		<head>
		<title><?= $data['titledisplay'] ?></title>
		<base href="<?= Config::BASE_URL ?>/">
		<link rel="stylesheet" type="text/css" href="src/styles/common.css">
    		</head>
		
	<?php }
} ?>
