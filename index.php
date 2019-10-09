<?php

require_once 'conf.php';
require_once 'app/engine/Model.php';
require_once 'app/engine/View.php';
require_once 'app/engine/Controller.php';
require_once 'app/engine/Router.php';
require_once 'routes.php';

// Adding Routes (routes.php)
Router::addRoute($routes);
Router::start();