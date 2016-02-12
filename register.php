<?php include 'session.php';?>
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
            <h1>Create An Account</h1>
            <br>
            <br>


            <form action="registerUser.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="firstName" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-4">
                        <input type="name" class="form-control" name="firstName" placeholder="First Name">
                    </div>
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-4">
                        <input type="name" class="form-control" name="lastName" placeholder="Last Name">
                    </div>
                    <label for="confirm_email" class="col-sm-2 control-label">Confirm Email</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="confirm_email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="confirm_password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2">
                        <button type="submit" class="btn btn-default">Register</button>
                    </div>
                    <label class="col-sm-4 control-label">or if you already have an account</label>
                    <div class="col-sm-2">
                        <a href="login.php" class="btn btn-default">Login</a>
                    </div>
                </div>
                <?php
                if($_SESSION['account_exists'] == true)
                {
                    echo "<label class='col-sm-offset-2 col-sm-10'>Account already exists!</label>";
                    $_SESSION['account_exists'] = false;
                }
                if($_SESSION['empty_fields'] == true)
                {
                    echo "<label class='col-sm-offset-2 col-sm-10'>Fill out all fields</label>";
                    $_SESSION['empty_fields'] = false;
                }
                if($_SESSION['different_emails'] == true)
                {
                    echo "<label class='col-sm-offset-2 col-sm-10'>Emails do not match</label>";
                    $_SESSION['different_emails'] = false;
                }
                if($_SESSION['different_passwords'] == true)
                {
                    echo "<label class='col-sm-offset-2 col-sm-10'>Passwords do not match</label>";
                    $_SESSION['different_passwords'] = false;
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
