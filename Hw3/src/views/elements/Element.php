<?php namespace thrill_seekers\hw3\views\elements;

use thrill_seekers\hw3\views\View;

abstract class Element
{
	public $view;
	
	public function __construct(View $currentview)
	{
		$this->view=$currentview;
	}
	public abstract function render($data);
} ?>
