<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
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
    <title>Supervisor Homepage</title>
    <link rel="stylesheet" href="css/spmfu.css">
</head>
<body>
        <header id="header">
        </header>
        <div id="container" >

            <div> Welcome back, <?php

                echo $username = $_SESSION['username'];
                ?> </div>
            <menu id="sidebar">
                <table cellspacing="0" border="1" id="Box">
                    <tr><th id="box_header">Personal setting</th></tr>
                    <tr><th id="menu"><ul>
                                <li><a href="./index.php?action=view_profile&controller=account">View profile</a></li>
                                <li><a href="./index.php?action=edit_profile&controller=account">Edit profile</a></li>
                                <li><a href="./index.php?action=change_password&controller=account">Change password</a></li>
                                <li><a href="./index.php?action=logout&controller=account">Logout</a></li>
                            </ul></th></tr>
                </table>
            </menu>

        </div>
        <footer>
            <div id="container-fluid">
                <div id="copyright">Copyright SPMFU</div>
            </div>
        </footer>
</body>
</html>