<?php
/*
PHP Picture Index 1.2.0
--------------------------
Created by: Brendan Ryan (http://www.pixelizm.com/)
Site: http://code.google.com/p/phppi/
Licence: GNU General Public License v3                   		 

This file is part of PHP Picture Index (PHPPI).

PHPPI is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

PHPPI is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with PHPPI. If not, see <http://www.gnu.org/licenses/>.
*/
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (is_file('phppi/version.txt')) {
	$installed_version = file_get_contents('phppi/version.txt');	
} else {
	$installed_version = "1.2.0";
}
	
$version = "1.2.0";

//Check if settings exist otherwise run first setup
if (!is_file('phppi/phppi_settings.php') || $version !== $installed_version) {
	header('Location: phppi/admin/');
} else {
	require('phppi/includes/classes/phppi.php');
	
	$phppi = new PHPPI;
	$phppi->vars['installed_version'] = $installed_version;
	$phppi->vars['version'] = $version;
	$phppi->startTimer();
	$phppi->loadSettings();
	$phppi->initialize();
}
?>