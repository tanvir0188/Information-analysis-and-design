<html>
<?php
require 'code1.php';
?>

<head>
    <title>
        Add Student
    </title>
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

<!-- student adding form -->

<body>

    <div class="two">
        <?php include('message.php'); ?>
        <h3>Add student</h3>


        <form method="post" action="code1.php">
            Name: <input type="text" name="Name"> <br><br>
            Email: <input type="email" name="Email"> <br> <br>
            Mid 1: <input type="number" name="Mid_1"> <br><br>
            Mid 2: <input type="number" name="Mid_2"> <br><br>
            Final: <input type="number" name="Final"> <br><br>
            <button type="submit" name="save_student">Save Student</button>
            <input type="reset">
        </form>
        <a href="student_info.php">
            <button>Homepage</button>
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>