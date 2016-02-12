<?php
include 'session.php';
include 'connection.php';

?>
<html lang="en">
<?php include 'header.php'; ?>
<body>

<?php include 'nav.php'; ?>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
        </div>
        <div class="col-sm-8 text-left">
            <br>
            <h1>Add College to Database</h1>
            <br>
            <br>


            <form action="addCollegeCheck.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="collegeName" class="col-sm-2 control-label">College Name</label>
                    <div class="col-sm-4">
                        <input type="name" class="form-control" name="collegeName" placeholder="College">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
                <?php
                if($_SESSION['college_exists'] == true)
                {
                    echo "<label class='col-sm-offset-2 col-sm-10'>College already exists!</label>";
                    $_SESSION['college_exists'] = false;
                }
                ?>
            </form>
        </div>
        <div class="col-sm-2 sidenav">
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
</footer>

</body>
</html>
