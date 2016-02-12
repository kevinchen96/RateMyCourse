<?php
include 'session.php';
if($_SESSION['logged_in'])
{
    header('Location: ratemycourse.php');
}
?>
<!DOCTYPE html>
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
            <h1>Login to Rate My Course</h1>
            <br>
            <br>
            <form action="logincheck.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2">
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                    <label class="col-sm-1">or</label>
                    <div class="col-sm-4">
                        <a href="register.php" class="btn btn-default">Register for an Account</a>
                    </div>
                    <?php
                    if($_SESSION['incorrect_login'] == true)
                    {
                        echo "<label class='col-sm-offset-2 col-sm-10'>Invalid username or password!</label>";
                        $_SESSION['incorrect_login'] = false;
                    }
                    ?>
                </div>
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
