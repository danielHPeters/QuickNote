<?php

/**
 * PHP Version 7.1
 *
 * @category Database
 * @package  QuickNote
 * @author   Daniel Peters <daniel.peters.ch@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/danielHpeters
 */

use rafisa\lib\database\DbConfiguration;
use rafisa\lib\database\Connection;

// Reusable database connection info
$config = new DbConfiguration('localhost', 'quicknote', 'root', '');
// DB connection with PDO
$conn = new Connection('mysql', $config);
