<?php
/**
 * PHP Version 7.1
 *
 * @category Service
 * @package  Store
 * @author   Daniel Peters <daniel.peters.ch@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/danielHpeters
 */
header("Content-Type: application/json; charset=utf-8");
$msg = [];
$_SESSION = [];
session_destroy();
$msg['success'] = true;

echo json_encode($msg);
