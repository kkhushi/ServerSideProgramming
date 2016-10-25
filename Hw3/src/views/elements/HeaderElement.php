<?php namespace cool_name_for_your_group\hw3\views\elements;

use cool_name_for_your_group\hw3\views\View;
use cool_name_for_your_group\hw3\configs\Config;

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
