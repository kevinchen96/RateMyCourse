<?php
include 'session.php';
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>

<?php
include 'nav.php';
?>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
        </div>
        <div class="col-sm-8 text-left">
            <h1>Project Summary</h1>
            <h3>1.	Customization</h3>
            <p>This site has a more complete functionality than any of the assignments. It takes the concept of ratemyprofessor, but for courses. As such, the site provides searching, entering ratings, and administrative functions beyond what any of our labs and assignments have done.
            </p>
            <h3>2.	Database</h3>
            <p>Database has multiple tables, with 1/2 primary tables and 4 lookup tables. Each table encompasses a specific attribute needed for the site, such as department or course. Tables are populated with course and user information taken from colleges such as USC.
            </p>
            <h3>3.	Site Content</h3>
            <p>The site is designed with bootstrap’s css including their standard navigation bar and search. In addition, text titles, results, and error pages show context for what the content is about. Course ratings pages have stars showing the ratings which are also dynamically calculated based on average rating.
            </p>
            <h3>4.	Site Design</h3>
            <p>General site design occurs with the standard navigation bar at the top which exists throughout all pages. Within the navigation bar are the search so that you can search for courses from any page. The login/logout also appears on the navigation bar. In addition, general layout design for forms/queries are the same, which form fields and then a submit button at the bottom. Generally, submit errors redirect the same way, and warnings are also shown the same way.
            </p>
            <h3>5.	Administrative Functionality and Basic Security</h3>
            <p>Anyone can use the search bar to query for course results and see the ratings page. However, only users that are logged in can add ratings to review pages. To add on the administrative features, only the admin account can delete comments/ratings from these course ratings pages, so that they can monitor potential spam. In addition, only the admin account can add courses, departments, colleges, and professors to the database.  Security means also exist because
            </p>
            <h3>6.	Extras</h3>
            <p>The 2 extras I used were sessions and membership system. Sessions were used for a majority of the features. User login as well as admin login were kept track of through sessions. Any warnings that occurred, from adding things to the database that already existed, registering a person with the same email, and incorrectly logging in also used sessions to make the appropriate html warnings appear.  Membership system existed for registering users and logging them in. In addition to standard registration and login, the site also does appropriate checks during both. For registration, the site checks if an existing email already appears, if there are any empty fields, if email and confirm email are not the same, and if password and confirm password are not the same. When logged in, you can do appropriate functions. If not logged in and you try to do a rating, you will be redirected to the login page. When you logout, the session is destroyed and the login button at the top right corner will return.
            </p>
            <h3>Instructions</h3>
            <p>The site is fairly straightforward to use. To look through all the courses, simply enter nothing into the search bar in the navigation bar. Currently there are only 4 courses available. You can search for either a professor, course, or college and the courses will show up. On the course ratings page, you can see information about the courses and the current reviews and ratings. Average calculation is automated, so when ratings are added or deleted, the average ratings will change. You can login or register accounts. Currently, there is one user account and one administrative account.  The user email is test@usc.edu, password is test. The administrative email is admin@usc.edu, and password is admin. From the admin account, you can add schools, courses, colleges, and departments to the database. From the course add page, schools, departments, and professors are dynamic dropdowns of existing entries in the database.
            </p>
            <p>All of the site’s current workings are functional. It is not as complete as ratemyprofessor, but everything is functional and working. There is no pages for deleting courses, colleges, departments, or professors, however.
            </p>
            <p>Database Design is attached below.</p>
            <br>
            <img src="database.png" alt="Database">
        </div>
        <div class="col-sm-2 sidenav">
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
</footer>

</body>
</html>
