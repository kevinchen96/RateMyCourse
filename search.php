<?php
include 'session.php';
include 'connection.php';

$search = $_GET['query'];

$sqlSearch = "SELECT course_id, course, avg_rating, total_rating, num_rating, college, professor
              FROM courses, colleges, professors
              WHERE courses.college_id = colleges.college_id
                AND courses.professor_id = professors.professor_id
                AND (courses.course LIKE '%$search%' OR professors.professor LIKE '%$search%' OR colleges.college LIKE '%$search%')";

$resultsSearch = mysqli_query($conn, $sqlSearch);


if(!$resultsSearch)
{
    exit("Search Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include 'header.php';
include 'nav.php';?>
<body>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
        </div>
        <div class="col-sm-8 text-left">
            <?php

            echo "<h3> Search Results for '$search'</h3>";
            echo "<h1> Showing " . mysqli_num_rows($resultsSearch) . " results </h1>";
            while($row = mysqli_fetch_array($resultsSearch))
            {
                echo "<div class='list-group'>
        <a href='courseRatings.php?course_id=" . $row['course_id'] . "' class='list-group-item'>
            <h4 class='list-group-item-heading'>" . $row['course'] . "</h4>
            <p class='list-group-item-text'>" . $row['college'] . "</p>
        </a>
    </div>";
            }
            ?>
        </div>
        <div class="col-sm-2 sidenav">
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
</footer>

</body>
</html>

