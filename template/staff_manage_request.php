<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/20/2018
 * Time: 1:57 PM
 */
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/spmfu.css">
</head>
<?php //require_once(SITE_ROOT."/template/header.php"); ?>

<body style="margin: 150px 0">
<div class="main-login main-center">
    <h2 class="text-center">MANAGE REQUEST
    </h2>
    <form>
        <div>
            <form>
                Search:<br> <input class="form-control" type="text" name="request_search" >
                <button class="button" type="submit" name="request_search_btn">Search</button>
            </form>
        </div>
        <br>

        <div>Request type:<br>
            <select class="form-control">
                <option selected>All requests</option>
                <option>Meeting request</option>
                <option>Change project name</option>
            </select></div>
        <br>
        <table class="main" cellspacing="0" border="1">
            <tr>
                <td>Request type</td>
                <td>Request by</td>
                <td>Team</td>
                <td>Status</td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
        </table>
    </form></div>
</body>
</html>
