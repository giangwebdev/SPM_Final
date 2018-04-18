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
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#role2').click(function() {
                $('.role2').show();
                $('.role3').hide();
            });

            $('#role3').click(function() {
                $('.role3').show();
                $('.role2').hide();
            });

            $('.no-role').click(function() {
                $('.role3').hide();
                $('.role2').hide();
            });

        });
    </script>
</head>
<body>
        <h1>Create account</h1>
        <form action="./index.php?action=create_account&controller=staff" method="post">
            <table>
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" required></td>
                </tr>
                <tr>
                    <td>Role:</td>
                    <td><select class="role" name="role" >
                            <option class="no-role" selected >- Choose role -</option>
                            <option class="no-role" value="1">Student</option>
                            <option id="role2" value="2">Academic Staff</option>
                            <option id="role3" value="3">Supervisor</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="role2" style="display: none;">Is supervisor head?:</div>
                        <div class="role3" style="display: none;">Is admin?:</div>
                    </td>
                    <td>
                        <div  class="role2" style="display: none;" >
                            <input type="radio" name="is_spv_head" value="yes">Yes
                            <input type="radio" name="is_spv_head" value="no" checked>No
                        </div>

                        <div class="role3" style="display: none;">
                            <input type="radio" name="is_ad" value="yes">Yes
                            <input type="radio" name="is_ad" value="no" checked>No
                        </div>
                    </td>

                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="submit_btn" >Create</button>
                        <button type="button" name="cancel" onclick="window.location.href='./index.php?action=homepage&controller=account'">Cancel</button>
                    </td>
                </tr>
            </table>

            </form>
</body>
</html>
