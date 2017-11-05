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
use rafisa\lib\filters\InputValidator;

require_once dirname(__FILE__) . '/connection.php';

header('Content-Type: application/json; charset=utf-8');

$fields = [
    'username' => 'Please enter username.',
    'password' => 'Please enter password.'
];

$msg = InputValidator::checkPostVars($fields);

if (!$conn) {
    $msg['errors'][] = 'Could not connect to database. Try again later.';
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $msg['errors'][] = 'Only POST requests are allowed.';
}

if (empty($msg['errors'])) {
    $statement = 'SELECT id, lastName, firstName, email, username, password FROM user WHERE username = :username';
    $result = $conn->prepare($statement);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password');
    $result->bindParam(':username', $username);
    $result->setFetchMode(PDO::FETCH_OBJ);
    $result->execute();
    $user = $result->fetchObject();

    if (empty($user)) {
        $msg['errors'][] = 'Incorrect username or password.';
    } elseif (password_verify($password, $user->password)) {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
    } else {
        $msg['errors'][] = 'Incorrect password.';
    }
}

$msg['success'] = empty($msg['errors']);

echo json_encode($msg);

session_write_close();