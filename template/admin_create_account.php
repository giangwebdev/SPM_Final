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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
    <!--    <script src="./js/spmfu.js"></script>-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--    <link rel="stylesheet" href="./css/spmfu.css">-->
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/spmfu.css">
</head>

<?php require_once(SITE_ROOT."/template/header.php"); ?>

<body style="margin: 150px 0">
<div class="main-login main-center">
    <h2 class="text-center">CREATE ACCOUNT
    </h2>


        <form action="./index.php?action=create_account&controller=staff" method="post">
            <br>
                <br><tr>
                    <td>Email: </td>
                <td><input class="form-control" type="text" name="email" required></td>
                </tr><br>
                <br><tr>
                    <td>Role:</td>

                    <br><td><select class="role form-control" name="role" >
                            <option  selected >- Choose role -</option>
                            <option  value="1">Student</option>
                            <option  value="2">Supervisor</option>
                            <option  value="3">Academic Staff</option>
                            <option  value="4">Administrator</option>
                            <option  value="5">Supervisor Head</option>
                        </select>
                    </td>
                </tr><br>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" type="submit" name="submit_btn"  >Create</button>
                        <button class="button" type="button" name="cancel" onclick="window.location.href='./index.php?action=homepage&controller=account'" >Cancel</button>
                    </td>
                </tr>
            </table>

            </form>
            </form></div></div></div>

</body>

</html>

