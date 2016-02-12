<?php include 'session.php';
include 'connection.php';
$course = $_POST['courseName'];
$professor_id = $_POST['professor_id'];
$department_id = $_POST['department_id'];
$college_id = $_POST['college_id'];

$sql = "SELECT *
        FROM courses
        WHERE course = '$course'";

$resultsSql = mysqli_query($conn, $sql);
if(!$resultsSql)
{
    exit("Course error: " . mysqli_error($conn));
}
if(mysqli_num_rows($resultsSql) == 0)
{
    $sql = "INSERT INTO courses (course, college_id, professor_id, department_id)
      VALUES ('$course', '$college_id', '$professor_id', '$department_id')";
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
    $_SESSION['course_exists'] = true;
    header('Location: addCourse.php');
}


?>