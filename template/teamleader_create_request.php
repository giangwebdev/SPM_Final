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
$role = $_SESSION['role_id'];
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
<?php require_once(SITE_ROOT."/template/header.php"); ?>

<body>
<div class="limiter">

    <div class="container-login100" style="background-image: url('./image/bg-01.jpg');">
        <div class="wrap-login100" style="color: white; width: auto">


                <span class="login100-form-title p-b-34 p-t-27">
						CREATE CHANGE CAPSTONE PROJECT NAME REQUEST
					</span>
        <form action="./index.php?action=create_request&controller=student" method="post">

            <table>
                <tr>
                    <td>New name in English:</td>
                    <td><textarea rows="2" cols="50" name="new_cpro_name_en" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td>New name in Vietnamese:</td>
                    <td><textarea rows="2" cols="50" name="new_cpro_name_vi" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td>Description (Optional):</td>
                    <td><textarea rows="4" cols="50" name="description" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><div class="container-login100-form-btn" >
                            <button class="login100-form-btn" type="submit" name="send_button" value="send">Send</button>
                        <button class="login100-form-btn" type="button" name="cancel"
                                onclick="window.location.href='./index.php?action=homepage&controller=account'">Cancel</button>
                        </div></td>
                </tr>
            </table>
        </form>
        </div></div></div>
</body>
</html>
