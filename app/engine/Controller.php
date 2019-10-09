<?php
/**
* Controller class
*/
class Controller {
	
	public $model;
	public $view;

	public function __construct($modelName) {
		$this->model = new $modelName();
		$this->view = new View();
	}

	public function index() {
	}

}