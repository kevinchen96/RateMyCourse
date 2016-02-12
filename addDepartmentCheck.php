<?php include 'session.php';
include 'connection.php';
$department = $_POST['departmentName'];

$sql = "SELECT *
        FROM departments
        WHERE department = '$department'";

$resultsSql = mysqli_query($conn, $sql);
if(!$resultsSql)
{
    exit("Course error: " . mysqli_error($conn));
}
if(mysqli_num_rows($resultsSql) == 0)
{
    $sql = "INSERT INTO departments (department)
      VALUES ('$department')";
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
    $_SESSION['department_exists'] = true;
    header('Location: addDepartment.php');
}


?>