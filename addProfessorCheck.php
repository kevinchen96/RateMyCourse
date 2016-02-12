<?php include 'session.php';
include 'connection.php';
$professor = $_POST['professorName'];

$sql = "SELECT *
        FROM professors
        WHERE professor = '$professor'";

$resultsSql = mysqli_query($conn, $sql);
if(!$resultsSql)
{
    exit("Course error: " . mysqli_error($conn));
}
if(mysqli_num_rows($resultsSql) == 0)
{
    $sql = "INSERT INTO professors (professor)
      VALUES ('$professor')";
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
    $_SESSION['professor_exists'] = true;
    header('Location: addProfessor.php');
}


?>