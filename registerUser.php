<?php include 'session.php';
include 'connection.php';
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_email = $_POST['confirm_email'];
$confirm_password = $_POST['confirm_password'];

if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_email) || empty($confirm_password))
{
    $_SESSION['empty_fields'] = true;
    header('Location:register.php');
    exit();
}
if($email != $confirm_email)
{
    $_SESSION['different_emails'] = true;
    header('Location:register.php');
    exit();
}
if($password != $confirm_password)
{
    $_SESSION['different_passwords'] = true;
    header('Location:register.php');
    exit();
}
$password = hash('SHA512', $_POST['password']);
$sql = "SELECT *
        FROM users
        WHERE email = '$email'";

$resultsSql = mysqli_query($conn, $sql);
if(!$resultsSql)
{
    exit("Users error: " . mysqli_error($conn));
}
if(mysqli_num_rows($resultsSql) == 0)
{
    $sql = "INSERT INTO users (email, password, firstname, lastname)
      VALUES ('$email', '$password', '$first_name', '$last_name')";
    $results = mysqli_query($conn, $sql);
    if($results)
    {
        header('Location: login.php');
        exit();
    }
    else
    {
        exit("There was an error: " . mysqli_error($conn));
    }
}
else
{
    $_SESSION['account_exists'] = true;
    header('Location: register.php');
}


?>