<?php
namespace cool_name_for_your_group\hw3\views;

abstract class View
{
    public function __construct()
    {}
    public abstract function render($data);
}?>