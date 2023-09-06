<?php
// connecting the database
$con = mysqli_connect("localhost", "root", "", "student_db");

if (!$con) {
    die('Connection Failed' . mysqli_connect_error());
}
