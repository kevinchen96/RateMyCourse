<?php
include 'session.php';
if(!$_SESSION['logged_in'])
{
    header('Location: login.php');
}
include 'connection.php';
$courseid = $_GET['course_id'];
if(empty($courseid))
{
    header('Location: invalidReviewAccess.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php
include 'nav.php';?>

<!-- Page Content -->
<div class="container">
    <div class="col-sm-8 text-left">
        <br>
        <h1>Add a Review</h1>
        <br>
        <br>
        <form action='addRating.php' method='get' class='form-horizontal'>
        <div class="form-group">
            <label for="rating" class="col-sm-2 control-label">Rating</label>
            <div class="col-sm-4">
                <input class="form-control" name="rating" placeholder="(1-5)">
            </div>
        </div>
        <div class="form-group">
            <label for="comment" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-4">
                    <textarea name="comment"  cols="76" rows="6"></textarea>
                        </div>
        </div><!--/.form-group-->
        <?php
        echo "<input type='hidden' name='course_id' value='" . $courseid . "'>";
        ?>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
<br/>

</div>
    </div>

<!-- /.container -->
<footer class="container-fluid text-center">
</footer>

</body>
</html>
