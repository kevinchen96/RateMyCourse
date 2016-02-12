<?php include 'session.php';
include 'connection.php';
$college = $_POST['collegeName'];

$sql = "SELECT *
        FROM colleges
        WHERE college = '$college'";

$resultsSql = mysqli_query($conn, $sql);
if(!$resultsSql)
{
    exit("Course error: " . mysqli_error($conn));
}
if(mysqli_num_rows($resultsSql) == 0)
{
    $sql = "INSERT INTO colleges (college)
      VALUES ('$college')";
    $results = mysqli_query($conn, $sql);
    if($results)
    {
        header('Location: ratemycourse.php');
        exit();
    }
    else
    {
        exit("There was an error: " . mysqli_error($conn));
    }
}
else
{
    $_SESSION['college_exists'] = true;
    header('Location: addCollege.php');
}


?>