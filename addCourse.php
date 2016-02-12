<?php
include 'session.php';
include 'connection.php';

$sql_professor = "SELECT * FROM professors";
$results_professor = mysqli_query($conn, $sql_professor);

if(!$results_professor)
{
    exit("Professor SQL error: " . mysqli_error($conn));
}

$sql_college = "SELECT * FROM colleges";
$results_college = mysqli_query($conn, $sql_college);

if(!$results_college)
{
    exit("College SQL error: " . mysqli_error($conn));
}

$sql_department = "SELECT * FROM departments";
$results_department = mysqli_query($conn, $sql_department);

if(!$results_department)
{
    exit("Department SQL error: " . mysqli_error($conn));
}

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
            <h1>Add Course to Database</h1>
            <br>
            <br>


            <form action="addCourseCheck.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="courseName" class="col-sm-2 control-label">Course Name</label>
                    <div class="col-sm-4">
                        <input type="name" class="form-control" name="courseName" placeholder="Course">
                    </div>
                </div>
                <div class="form-group">
                    <label for="department_id" class="col-sm-2 control-label">Department:</label>
                    <div class="col-sm-4">
                        <select name="department_id">
                        <?php
                        while($row = mysqli_fetch_array($results_department))
                        {
                            echo "<option value='" .  $row['department_id']. "'>" . $row['department'] . "</option>";
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="professor_id" class="col-sm-2 control-label">Professor:</label>
                    <div class="col-sm-4">
                        <select name="professor_id">
                            <?php
                            while($row = mysqli_fetch_array($results_professor))
                            {
                                echo "<option value='" .  $row['professor_id']. "'>" . $row['professor'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="college_id" class="col-sm-2 control-label">College:</label>
                    <div class="col-sm-4">
                        <select name="college_id">
                            <?php
                            while($row = mysqli_fetch_array($results_college))
                            {
                                echo "<option value='" .  $row['college_id']. "'>" . $row['college'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
                <?php
                if($_SESSION['course_exists'] == true)
                {
                    echo "<label class='col-sm-offset-2 col-sm-10'>Course already exists!</label>";
                    $_SESSION['course_exists'] = false;
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
