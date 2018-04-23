<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/20/2018
 * Time: 3:36 PM
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
    <h2 class="text-center">CREATING MEETING REQUEST
    </h2>
    <form method="get">
        <table cellspacing="0" border="0">
            <tr>
                <td>Team:</td>
                <td>
                    <select class="form-control">
                        <option>--Choose team--</option>
                        <option>Team 1</option>
                        <option>Team 2</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Slot</td>
                <td><input class="form-control" type="text"></td>
            </tr>
            <tr>
                <td>Time:</td>
                <td><input class="form-control" type="date"></td>
            </tr>
            <tr>
                <td></td>
                <td><button class="button" type="submit">Send</button></td>
            </tr>
        </table>
    </form></div>
</body>
</html>
