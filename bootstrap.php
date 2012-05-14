<?php

Autoloader::add_core_namespace('Background');

Autoloader::add_classes(array(
	/**
	 * Background classes.
	 */
	'Background\\Background'							=> __DIR__.'/classes/background.php',
	'Background\\Background_Driver'						=> __DIR__.'/classes/background/driver.php',
	'Background\\Background_Driver_Windows'         	=> __DIR__.'/classes/background/driver/windows.php',
	'Background\\Background_Driver_Linux'           	=> __DIR__.'/classes/background/driver/linux.php',
	
));