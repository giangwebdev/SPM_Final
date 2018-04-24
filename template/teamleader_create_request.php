<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/24/2018
 * Time: 2:30 PM
 */
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/student_controller.php");
require_once (SITE_ROOT."/models/student_model.php");

$account = new account();
$account->check_Session();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <form action="./index.php?action=create_request&controller=student" method="post">
            <h1>Create change capstone project name request</h1>
            <table>
                <tr>
                    <td>New name in English:</td>
                    <td><textarea rows="2" cols="50" name="new_cpro_name_en"></textarea></td>
                </tr>
                <tr>
                    <td>New name in Vietnamese:</td>
                    <td><textarea rows="2" cols="50" name="new_cpro_name_vi"></textarea></td>
                </tr>
                <tr>
                    <td>Description (Optional):</td>
                    <td><textarea rows="4" cols="50" name="description"></textarea></td>
                </tr>
                <tr>
                    <td><button type="submit" name="send_button" value="send">Send</button>
                        <button type="button" name="cancel"
                                onclick="window.location.href='./index.php?action=homepage&controller=account'">Cancel</button>
                    </td>
                </tr>
            </table>
        </form>
</body>
</html>
