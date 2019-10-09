<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $data['title'] ?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="theme-color" content="#fff">

	<link rel="shortcut icon" type="image/x-icon" href="/image/favicon.png">
	<link rel="stylesheet" href="/stylesheet/stylesheet.css">
</head>
<body>

<!-- Header -->
<header class="header">
	<div class="container header__container">
		<nav class="header__payroll">
			<?php
				function active($currect_page){
					$url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
					$url = end($url_array);  
					if($currect_page == $url){
						echo 'active';
					}	 
				}
			?>
			<?php if ($content_view == 'form_payroll_create'): ?>
				<a href="<?= url_origin.'create'; ?>" class="header__create-button">Create</a>
			<?php else: ?>
				<a href="<?= url_origin ?>" class="<?php active('');?>">Payroll View</a>
				<a href="<?= url_origin.'edit'; ?>" class="<?php active('edit');?>">Payroll Edit</a>
			<?php endif ?>
		</nav>
	</div>
</header>