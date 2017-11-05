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

session_start();

$fields = [
    'password' => 'Plese enter current password.',
    'newPassword' => 'Plese enter a new Password.',
    'passwordVerify' => 'Please comfirm the new password.'
];

$msg = InputValidator::checkPostVars($fields);
$msg['data'] = $_POST;
if (!$conn) {
    $msg['errors'][] = 'Could not connect to database. Try again later.';
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $msg['errors'][] = 'Only POST requests are allowed.';
}

if (empty($msg['errors'])) {
    $newPassword = $_POST['newPassword'];
    $passwordVerify = $_POST['passwordVerify'];

    if ($newPassword === $passwordVerify) {
        $statement = 'SELECT id, lastName, firstName, email, username, 
            password, role FROM user WHERE username = :username';
        $result = $conn->prepare($statement);
        $result->bindParam(':username', $username);
        $username = $_SESSION['username'];
        $password = filter_input(INPUT_POST, 'password');
        $result->setFetchMode(PDO::FETCH_OBJ);
        $result->execute();
        $user = $result->fetchObject();

        if (empty($user)) {
            $msg['errors'][] = 'Incorrect username or password.';
        } elseif (password_verify($password, $user->password)) {
            $updateStatement = 'UPDATE user SET password=:newpassword WHERE username=:username';
            $updateResult = $conn->prepare($updateStatement);
            $updateResult->bindParam(':username', $username);
            $updateResult->bindParam(':newpassword', $newPassword);
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updated = $updateResult->execute();

            if (!$updated) {
                $msg['errors'][] = 'Failed to update password.';
            }
        } else {
            $msg['errors'][] = 'You entered your current password incorrectly.';
        }
    } else {
        $msg['errors'][] = 'The new Password doesn\'t match.';
    }
}

$msg['success'] = empty($msg['errors']);

echo json_encode($msg);

session_write_close();
