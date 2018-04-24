<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/20/2018
 * Time: 3:23 PM
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
    <h2 class="text-center">CHECK PROJECT STATUS
    </h2>

    <form>
        Team: <input class="form-control" type="text" name="cpro_status_search">
        <button class="button" type="submit" name="cpro_status_search_btn">Search</button>
    </form>
    <br>
    <table class="main" cellspacing="0" border="1">
        <tr>
            <th>STT</th>
            <th>Team</th>
            <th>Project</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>
                //Data shows here
            </td>
        </tr>
    </table>
</div>
</body>
</html>
