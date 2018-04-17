<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/12/2018
 * Time: 9:09 AM
 */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
    <script src="../template/js/spmfu.js"></script>
    <link rel="stylesheet" href="../template/css/spmfu.css">
</head>


<body>
    <form action="../controllers/request_account.php" method="POST">
        Capstone project name (In English): <input type="text" name="cp_name_en" ><br>
        Capstone project name (In Vietnamese): <input type="text" name="cp_name_vi" ><br>
        <br>
        <table id="student_list" cellspacing="0">
            <thead>
            <tr>
                <th></th>
                <th><img src="../template/image/add_button.jpg" id="add_row1" width="32px" onclick="add_row('student_list')"></th>
                <th></th>
                <th>Fullname</th>
                <th>Student ID</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Is teamleader?</th>
            </tr>
            </thead>
            <tbody>
            <tr id="row0">
                <td></td>
                <td><img src="../template/image/minus_button.png" id="minus_row1" width="32px" onclick="minus_row(this)"></td>
                <td >Student 1</td>
                <td><input type="text" id="full_name1" name="full_name1" placeholder="" required></td>
                <td><input type="text" id="student_id1" name="student_id1" placeholder="" required></td>
                <td><input type="text" id="phone1" name="phone1" placeholder="" required></td>
                <td><input type="text" id="email1" name="email1" placeholder="" required></td>
                <td align="center"><input type="radio" id="is_teamleader1" name="is_teamleader" checked value="student1" placeholder=""></td>
            </tr>
            </tbody>
        </table>
        <br>
        <span>Supervisor: </span>

        <select id="supervisor" name="supervisor">
            <option value="">Choose supervisor</option>
            <?php

            include_once('../models/query_for_supervisor.php');
            $supervisor_name = get_supervisor();
            foreach ($supervisor_name as $name){
                echo "<option value='".$name['full_name']."'>".$name['full_name']."</option>";
            }
            ?>
        </select>
        <span>(Optional)</span>
        <br>
        <br>
        <span>Note (Optional)</span>
        <br>
        <textarea id="note" name="note" rows="6" cols="100"></textarea>
        <br><br>
        <button name="submit" value="submit">Submit</button>
    </form>
</body>
</html>
