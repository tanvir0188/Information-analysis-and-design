<?php
session_start();
require 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit the student</title>
    <style>
        .two {
            border-style: solid;
            border-width: medium;
            text-align: center;
            padding-top: 25px;
            padding-bottom: 5px;
            width: 50%;
            margin: auto auto;
            margin-top: 50px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div>
        <div class="two">
            <?php include('message.php'); ?>

            <h3>Edit student</h3>
            <a href="student_info.php">
                <button>
                    Back
                </button>
            </a>
        </div>
        <div class="two">
            <?php
            if (isset($_GET['ID'])) {
                $id = mysqli_real_escape_string($con, $_GET['ID']);
                $query = "SELECT * FROM student_info WHERE ID='$id' ";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $student = mysqli_fetch_assoc($query_run);
            ?>
                    <form action="code.php" method="post">
                        ID: <input type="number" name="ID" value="<?= $student['ID']; ?>">
                        Name: <input type="text" name="Name" value="<?= $student['Name']; ?>"> <br><br>
                        Email: <input type="email" name="Email" value="<?= $student['Email']; ?>"> <br> <br>

                        Mid 1(20): <input type="number" name="Mid_1" value="<?= $student['Mid_1']; ?>"> <br><br>
                        Mid 2(20): <input type="number" name="Mid_2" value="<?= $student['Mid_2']; ?>"> <br><br>
                        Final(20): <input type="number" name="Final" value="<?= $student['Final']; ?>"> <br><br>
                        <button type="submit" name="update_student">Update Student</button>
                        <input type="reset">
                    </form>

            <?php
                } else {
                    echo "<h3>No Id</h3>";
                }
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>