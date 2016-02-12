<?php
include 'session.php';
include 'connection.php';
$courseid = $_GET['course_id'];
if(empty($courseid))
{
    header('Location: invalid.php');
    exit();
}
$sql = "SELECT course_id, course, avg_rating, total_rating, num_rating, college, professor, department
              FROM courses, colleges, professors, departments
              WHERE courses.college_id = colleges.college_id
                AND courses.professor_id = professors.professor_id
                AND courses.department_id = departments.department_id
                AND courses.course_id = '$courseid'";

$results = mysqli_query($conn, $sql);


if(!$results)
{
    exit("Search Error: " . mysqli_error($conn));
}

if(mysqli_num_rows($results) == 0)
{
    header('Location: invalid.php');
    exit();
}

$sqlReviews = "SELECT review, rating, course_id, review_id
              FROM reviews
              WHERE reviews.course_id = '$courseid'";

$resultsReviews = mysqli_query($conn, $sqlReviews);


if(!$resultsReviews)
{
    exit("Reviews Error: " . mysqli_error($conn));
}

$course = mysqli_fetch_array($results);
?>

    <!DOCTYPE html>
    <html lang="en">
<?php include 'header.php'; ?>
    <body>
    <?php
    include 'nav.php';?>

    <!-- Page Content -->
    <div class="container">
            <div>

                <div class="thumbnail">
                    <div class="caption-full">
                        <?php echo "<h4>" . $course['course'] . "</h4>";
                            echo "<p>Department: " . $course['department'] . "</p>";
                            echo "<p>Instructor: " . $course['professor'] . "</p>";
                            echo "<p>" . $course['college'] . "</p>";?>
                    </div>
                    <div class="ratings">
                        <?php
                        echo "<p class='pull-right'>" . $course['num_rating'] . " review(s)";
                        if(!$_SESSION['admin']) {
                            echo "<a href='rate.php?course_id=" . $courseid . "' class='btn btn-success'>Rate This Course</a>";
                        }
                        echo "</p>

                        <p>";
                        $numStars = $course['avg_rating'];
                        $numEmptyStars = 5 - $numStars;
                        while($numStars >= 1)
                        {
                            echo "<span class='glyphicon glyphicon-star'></span>";
                            $numStars--;
                        }

                        while($numEmptyStars > 0)
                        {
                            echo "<span class='glyphicon glyphicon-star-empty'></span>";
                            $numEmptyStars--;
                        }
                        echo " " . $course['avg_rating'] . " star(s)</p>";
                        ?>
                    </div>
                </div>

                <div class="well">
                    <?php
                    $row = mysqli_fetch_array($resultsReviews);
                    if($row) {
                        echo "<div class='row'>
                            <div class='col-md-12'>";
                        $numStars = $row['rating'];
                        $numEmptyStars = 5 - $numStars;
                        while ($numStars >= 1) {
                            echo "<span class='glyphicon glyphicon-star'></span>";
                            $numStars--;
                        }

                        while ($numEmptyStars > 0) {
                            echo "<span class='glyphicon glyphicon-star-empty'></span>";
                            $numEmptyStars--;
                        }
                        echo "<p>" . $row['review'];
                        if($_SESSION['admin']==true)
                        {
                             echo "<a href='delete.php?review_id=" . $row['review_id'] . "' type='button' class='btn btn-default pull-right'>
                            Delete
                            </a>";
                         }
                         echo "</p>
                            </div>

                        </div>";

                    }
                    while($row = mysqli_fetch_array($resultsReviews))
                    {
                        echo "<hr>";
                        echo "<div class='row'>
                        <div class='col-md-12'>";
                            $numStars = $row['rating'];
                            $numEmptyStars = 5 - $numStars;
                        while($numStars >= 1)
                        {
                            echo "<span class='glyphicon glyphicon-star'></span>";
                            $numStars--;
                        }

                        while($numEmptyStars > 0)
                        {
                            echo "<span class='glyphicon glyphicon-star-empty'></span>";
                            $numEmptyStars--;
                        }
                        echo "<p>" . $row['review'];
                        if($_SESSION['admin']==true)
                        {
                            echo "<a href='delete.php?review_id=" . $row['review_id'] . "' type='button' class='btn btn-default pull-right'>
                            Delete
                            </a>";
                        }
                        echo "</p>
                            </div>

                        </div>";
                    }
                    ?>
                </div>

            </div>
    <!-- /.container -->
    <footer class="container-fluid text-center">
    </footer>

    </body>
</html>
