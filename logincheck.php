<?php
include 'session.php';
include 'connection.php';

$email = $_POST['email'];
$password = hash('SHA512', $_POST['password']);

$sqlLogin = "SELECT *
        FROM users
        WHERE users.email = '$email'
            AND users.password = '$password'";

$resultsLogin = mysqli_query($conn, $sqlLogin);
if(!$resultsLogin)
{
    exit("Users error: " . mysqli_error($conn));
}
$user = mysqli_fetch_array($resultsLogin);

if(mysqli_num_rows($resultsLogin) == 0)
{
    $_SESSION['incorrect_login'] = true;
    header('Location: login.php');
    exit();
}
else{
    $_SESSION['logged_in'] = true;
    $_SESSION['name'] = $user['firstname'];
    $_SESSION['user_id'] = $user['user_id'];

    if($user['email'] == "admin@usc.edu")
    {
        $_SESSION['admin'] = true;
    }
    header('Location: ratemycourse.php');
    exit();
}