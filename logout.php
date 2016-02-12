<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 11/30/15
 * Time: 2:35 AM
 */
include 'session.php';
session_unset();
session_destroy();
header('Location: ratemycourse.php');
exit();