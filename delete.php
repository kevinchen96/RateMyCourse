<?php include 'session.php';
include 'connection.php';
$review_id = $_GET['review_id'];

if(empty($review_id)) {
    header('Location: invalidDelete.php');
    exit();
}
$sqlGet = "SELECT *
        FROM  reviews
        WHERE review_id = '$review_id'";

$resultsGet = mysqli_query($conn, $sqlGet);
if(!$resultsGet)
{
    exit("Review error: " . mysqli_error($conn));
}
if(mysqli_num_rows($resultsGet) == 0)
{
    header('Location: invalidDelete.php');
    exit();
}
else {
    $review = mysqli_fetch_array($resultsGet);
    $course_id = $review['course_id'];
    $rating = $review['rating'];

    $sql = "DELETE FROM reviews
      WHERE review_id = '$review_id'";
    $results = mysqli_query($conn, $sql);

    if(!$results) {
        exit("Review error: " . mysqli_error($conn));
    }
    else {
        $sqlRating = "SELECT total_rating, num_rating
              FROM courses
              WHERE courses.course_id = '$course_id'";

        $resultsRating = mysqli_query($conn, $sqlRating);
        if (!$resultsRating) {
            exit("Course error: " . mysqli_error($conn));
        }

        $ratings = mysqli_fetch_array($resultsRating);
        $total = $ratings['total_rating'];
        $num = $ratings['num_rating'];
        $num--;
        $total -= $rating;
        if($num == 0)
        {
            $avg = 0;
        }
        else
        {
            $avg = $total / $num;
        }
        $courseUrl = "Location: courseRatings.php?course_id=" . $course_id;

        $editRating = "UPDATE courses
                   SET total_rating='$total', num_rating='$num', avg_rating='$avg'
                   WHERE course_id='$course_id'";
        $editResults = mysqli_query($conn, $editRating);
        if (!$editResults) {
            exit("Course error: " . mysqli_error($conn));
        }

        header($courseUrl);
    }
}
?>