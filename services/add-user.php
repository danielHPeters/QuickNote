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
    'lastName'  => 'Plese enter last name!',
    'firstName' => 'Plese enter first name!',
    'email'     => 'Plese enter an email address!',
    'username'  => 'Please enter a username!',
    'password'  => 'Please enter a password!',
    'passwordConfirm' => 'Please confirm your password!'
];

// Check if all fields are correctly filled out.
$msg = InputValidator::checkPostVars($fields);

$emailOrig = $_POST['email'];

// Make a sanitized copy of the submitted email address to check if they still match
$email = filter_var($emailOrig, FILTER_SANITIZE_EMAIL);

// Check if email is valid
if ($emailOrig !== $email && !filter_var($emailOrig, FILTER_VALIDATE_EMAIL)) {
    $msg['errors'][] = 'Please submit a valid email.';
}

if($_POST['password'] !==  $passwordVerify = $_POST['passwordConfirm']){
    $msg['errors'][] = 'Passwords do not match!';
}

if (!$conn) {
    $msg['errors'][] = 'Could not connect to database';
}

if (empty($msg['errors'])) {
    // Prepare insert query
    $statement
        = 'INSERT INTO user (
        lastName, firstName, email, username, password)' .
        'VALUES(:lastName, :firstName, :email, :username, :password)';
    $result = $conn->prepare($statement);
    $result->bindParam(':lastName', $lastName);
    $result->bindParam(':firstName', $firstName);
    $result->bindParam(':email', $email);
    $result->bindParam(':username', $username);
    $result->bindParam(':password', $password);
    $lastName = filter_input(
        INPUT_POST,
        'lastName',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $firstName = filter_input(
        INPUT_POST,
        'firstName',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $email = filter_input(
        INPUT_POST,
        'email',
        FILTER_SANITIZE_EMAIL
    );
    $username = filter_input(
        INPUT_POST,
        'username',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // Submit the user to db
    $submitted = $result->execute();

    // Test if insert was successful
    if (!$submitted) {
        $msg['errors'][] = 'Failed to add new user.';
    }
}

$msg['success'] = empty($msg['errors']);

echo json_encode($msg);
