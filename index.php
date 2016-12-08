<?php  

	require 'speedcache/autoload.php';

	$cache = new SpeedCache\Cached();
	$cache->page('exemplo-page');
	$cache->time(2);
	$cache->reload(true);
	$cache->init();

	/* VER TEMPO DA REQUISIÇAO OPCIONAL */
	$request = new SpeedCache\GetTimeRequest();
	echo "<br/><h2>O Time Request da Pagina Foi : {$request::getTime()} </h2>";