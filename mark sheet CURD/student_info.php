<?php
session_start();
require 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">\

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .two {
            border-style: solid;
            border-width: medium;
            text-align: center;
            padding-top: 5px;
            width: 70%;
            margin: auto;

        }

        table {
            border-collapse: solid;
            width: 100%;
        }

        th {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="two">
        <?php include('message.php'); ?>
        <h4>Student Details <br>
            <a href="add_student.php"> Add student </a>
        </h4>
        <h5> Full marks for every term is 20</h5>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mid 1</th>
                    <th>Mid 2</th>
                    <th>Final</th>
                    <th>Total Mark</th>
                    <th>Grade</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM student_info";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $student) {
                ?>
                        <tr>
                            <td><?= $student['ID']; ?></td>
                            <td><?= $student['Name']; ?></td>
                            <td><?= $student['Email']; ?></td>
                            <td><?= $student['Mid_1']; ?></td>
                            <td><?= $student['Mid_2']; ?></td>
                            <td><?= $student['Final']; ?></td>
                            <td><?= $student['Total_mark']; ?></td>
                            <td><?= $student['Grade']; ?></td>
                            <td>
                                <a href="student_edit.php?ID=<?= $student['ID']; ?>">
                                    Edit
                                </a>
                                <form action="code.php" method="POST">
                                    <button type="submit" name="delete_student" value="<?= $student['ID']; ?>">Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<h1> No Record Found </h1>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>