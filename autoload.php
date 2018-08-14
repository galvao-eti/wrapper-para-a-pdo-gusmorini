<?php

spl_autoload_register(function($nameClass){

	$dirClass = 'src';
	$filename = $dirClass.DIRECTORY_SEPARATOR.$nameClass.".php";

	//gambiarra linux
	$filename = str_replace('\\', '/', $filename);


	if(file_exists($filename))
	{
		require_once($filename);
	}

	require_once($filename);
	

});