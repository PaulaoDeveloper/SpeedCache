<?php
	
	spl_autoload_register(function($class){

		$class = $class.'.class.php';
		if(!file_exists($class)){
			throw new Exception("Arquivo '{$class}' Nao Foi Encontrado");
		}
		require_once( $class );

	});
