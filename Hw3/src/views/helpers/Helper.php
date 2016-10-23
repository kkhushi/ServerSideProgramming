<?php
namespace cool_name_for_your_group\hw3\views\helpers;

use cool_name_for_your_group\hw3\views;

class Helper
{
	public $view;
	
	public function __construct(View $currentview)
	{
		$this->view=$currentview;
	}
}
