<?php namespace cool_name_for_your_group\hw3\views\elements;

use cool_name_for_your_group\hw3\views\View;

abstract class Element
{
	public $view;
	
	public function __construct(View $currentview)
	{
		$this->view=$currentview;
	}
	public abstract function render($data);
} ?>
