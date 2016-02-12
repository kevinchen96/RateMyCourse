<?php include 'session.php';
include 'connection.php';

$rating = $_GET['rating'];
$comment = $_GET['comment'];
$user_id = $_SESSION['user_id'];
$course_id = $_GET['course_id'];

if(empty($rating) || empty($comment) || empty($course_id)) {
    header('Location: invalidReview.php');
    exit();
}

$sqlRating = "SELECT total_rating, num_rating
              FROM courses
              WHERE courses.course_id = '$course_id'";

$resultsRating = mysqli_query($conn, $sqlRating);
if(!$resultsRating)
{
    exit("Course error: " . mysqli_error($conn));
}

if(mysqli_num_rows($resultsRating) == 0)
{
    header('Location: invalidInsert.php');
    exit();
}

$sql = "INSERT INTO reviews (review, rating, course_id, user_id)
      VALUES ('$comment', '$rating', '$course_id', '$user_id')";
$results = mysqli_query($conn, $sql);


if($results)
{
    $ratings = mysqli_fetch_array($resultsRating);
    $total = $ratings['total_rating'];
    $num = $ratings['num_rating'];
    $num++;
    $total += $rating;
    $avg = $total/$num;

    $courseUrl = "Location: courseRatings.php?course_id=" . $course_id;

    $editRating = "UPDATE courses
                   SET total_rating='$total', num_rating='$num', avg_rating='$avg'
                   WHERE course_id='$course_id'";
    $editResults = mysqli_query($conn, $editRating);
    if(!$editResults)
    {
        exit("Course error: " . mysqli_error($conn));
    }

    header($courseUrl);
}
else
{
    exit("There was an error: " . mysqli_error($conn));
}
?>