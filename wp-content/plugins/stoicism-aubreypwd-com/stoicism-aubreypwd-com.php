<?php

/*
Plugin Name: Aubrey on Stoicism
Plugin URI: https://github.com/aubreypwd/stoicism.aubreypwd.com
Description: The main plugin for <a href="http://stoicism.aubreypwd.com" target="_blank">stoicism.aubreypwd.com.</a>
Version: 1.0.0
Author: Aubrey Portwood
Author URI: http://aubreypwd.com
License: GPL2
Text Domain: aubreypwd-stoicism
*/

/*
 * Copyright 2015 Aubrey Portwood <aubreypwd@gmail.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// Our Namespace.
namespace aubreypwd\Stoicism;

// Load the loader.
require_once( 'class-app.php' );

// Start a new loader.
$app = new App();

