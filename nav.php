<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="ratemycourse.php">Rate My Course</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <form action="search.php" method="GET" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" name="query" class="form-control" placeholder="Search for a class">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if($_SESSION['logged_in'])
                {
                    echo
                    "<li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>".$_SESSION['name']. "<span class='caret'></span></a>
                        <ul class='dropdown-menu'>";
                    if($_SESSION['admin'])
                    {
                        echo "<li><a href='addCourse.php'>Add Course to Database</a></li>";
                        echo "<li><a href='addCollege.php'>Add College to Database</a></li>";
                        echo "<li><a href='addProfessor.php'>Add Professor to Database</a></li>";
                        echo "<li><a href='addDepartment.php'>Add Department to Database</a></li>";
                    }
                    echo
                    "<li role='separator' class='divider'></li>
                     <li><a href='logout.php'>Log Out</a></li>
                     </ul>
                     </li>";
                }
                else
                {
                    echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                }
                ?>

            </ul>
        </div>
    </div>
</nav>