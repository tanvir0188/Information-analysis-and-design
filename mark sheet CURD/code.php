<?php

session_start();
require 'dbconnect.php';

// Saving the students in the database
if (isset($_POST['save_student'])) {
    $id = mysqli_real_escape_string($con, $_POST['ID']);
    $name = mysqli_real_escape_string($con, $_POST['Name']);
    $email = mysqli_real_escape_string($con, $_POST['Email']);
    $mid1 = mysqli_real_escape_string($con, $_POST['Mid_1']);
    $mid2 = mysqli_real_escape_string($con, $_POST['Mid_2']);
    $final = mysqli_real_escape_string($con, $_POST['Final']);
    $total_mark = intval($mid1) + intval($mid2) + intval($final);
    $grade = ((($total_mark / 60) * 4));
    $formatted_grade = number_format($grade, 2);

    $query = "INSERT INTO student_info (ID, Name, Email, Mid_1, Mid_2, Final, Total_mark, Grade) VALUES ('$id','$name', '$email', '$mid1', '$mid2', '$final', '$total_mark', '$formatted_grade')";


    if (!empty($name) && !empty($email) && (!empty($mid1) && $mid1 >= 0 && $mid1 <= 20) && (!empty($mid2) && $mid2 >= 0 && $mid2 <= 20) && (!empty($final) && $final >= 0 && $final <= 20)) {
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            $_SESSION['message'] = "Student Created Successfully";
            header("Location: add_student.php");
            exit(0);
        }
    } else {

        $_SESSION['message'] = "Student Not Created";
        header("Location: add_student.php");
        exit(0);
    }
}

//Updating the student information
if (isset($_POST['update_student'])) {
    $id = mysqli_real_escape_string($con, $_POST['ID']);
    $name = mysqli_real_escape_string($con, $_POST['Name']);
    $email = mysqli_real_escape_string($con, $_POST['Email']);
    $mid1 = mysqli_real_escape_string($con, $_POST['Mid_1']);
    $mid2 = mysqli_real_escape_string($con, $_POST['Mid_2']);
    $final = mysqli_real_escape_string($con, $_POST['Final']);
    $total_mark = intval($mid1) + intval($mid2) + intval($final);
    $grade = ((($total_mark / 60) * 4));
    $formatted_grade = number_format($grade, 2);

    $query = "UPDATE student_info SET Name='$name', Email='$email', Mid_1='$mid1',
    Mid_2='$mid2', Final='$final', Total_Mark='$total_mark', Grade='$formatted_grade' WHERE ID= '$id'";


    if (!empty($name) && !empty($email) && (!empty($mid1) && $mid1 >= 0 && $mid1 <= 20) && (!empty($mid2) && $mid2 >= 0 && $mid2 <= 20) && (!empty($final) && $final >= 0 && $final <= 20)) {
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            $_SESSION['message'] = "Student Updated Successfully";
            header("Location: student_info.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: student_edit.php");
        exit(0);
    }
}

//Deleting the student information
if (isset($_POST['delete_student'])) {
    $id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM student_info WHERE ID='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: student_info.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: student_info.php");
        exit(0);
    }
}
