<?php
//require_once __DIR__."/../config.php";
//require_once (SITE_ROOT."/controllers/account_controller.php");
//$account = new account();
//$account->check_Session();
//
//?>

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
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--    <link rel="stylesheet" href="./css/spmfu.css">-->
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="home_staff.php"><img src="./image/Logo-FU-01.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=display_all_account_info&controller=staff">View account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=create_account&controller=staff">Create account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=view_profile&controller=account">View profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=edit_profile&controller=account">Edit profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=change_password&controller=account">Change password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=logout&controller=account">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body style="margin: 150px 0">
<div class="main-login main-center">
    <h2 class="text-center">VIEW ACCOUNT
    </h2>


        <form action="./index.php?action=create_account&controller=staff" method="post">
            <br>
                <br><tr>
                    <td>Email: </td>
                <td><input class="form-control" type="text" name="email" required></td>
                </tr><br>
                <br><tr>
                    <td>Role:</td>
                    <td><select class="role form-control" name="role" >
                            <option class="no-role" selected >- Choose role -</option>
                            <option class="no-role" value="1">Student</option>
                            <option id="role2" value="2">Academic Staff</option>
                            <option id="role3" value="3">Supervisor</option>
                        </select>
                    </td>
                </tr><br>
                <br><tr>
                    <td>
                        <div class="role3 form-check" style="display: none;">Is supervisor head?:</div>
                        <div class="role2 form-check" style="display: none;">Is admin?:</div>
                    </td>
                    <td>
                        <div  class="role3" style="display: none;" >
                            <input type="radio" name="is_spv_head" value="yes">Yes
                            <input type="radio" name="is_spv_head" value="no" checked>No
                        </div>

                        <div class="role2" style="display: none;">
                            <input type="radio" name="is_ad" value="yes">Yes
                            <input type="radio" name="is_ad" value="no" checked>No
                        </div>
                    </td>

                </tr><br>
                <tr>
                    <td></td>
                    <td>
                        <button class="button" type="submit" name="submit_btn" >Create</button>
                        <button class="button" type="button" name="cancel" onclick="window.location.href='./index.php?action=homepage&controller=account'">Cancel</button>
                    </td>
                </tr>
            </table>

            </form>
            </form></div></div></div>
</body>
</html>
<style>
    /*
/* Created by Filipe Pina
 * Specific styles of signin, register, component
 */
    /*
     * General styles
     */
    #playground-container {
        height: 500px;
        overflow: hidden !important;
        -webkit-overflow-scrolling: touch;
    }
    body, html{
        height: 100%;
        background-repeat: no-repeat;
        background:url(https://i.ytimg.com/vi/4kfXjatgeEU/maxresdefault.jpg);
        font-family: 'Oxygen', sans-serif;
        background-size: cover;
    }

    .main{
        margin:50px 15px;
    }

    h1.title {
        font-size: 50px;
        font-family: 'Passion One', cursive;
        font-weight: 400;
    }

    hr{
        width: 10%;
        color: #fff;
    }

    .form-group{
        margin-bottom: 15px;
    }

    label{
        margin-bottom: 15px;
    }

    input,
    input::-webkit-input-placeholder {
        font-size: 11px;
        padding-top: 3px;
    }

    .main-login{
        background-color: #fff;
        /* shadows and rounded borders */
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

    }
    .form-control {
        height: auto!important;
        padding: 8px 12px !important;
    }
    .input-group {
        -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
        -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
        box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    }
    .button {
        border: 1px solid #ccc;
        margin-top: 28px;
        padding: 6px 12px;
        /*color: #666;*/
        text-shadow: 0 1px #fff;
        cursor: pointer;
        -moz-border-radius: 3px 3px;
        -webkit-border-radius: 3px 3px;
        border-radius: 3px 3px;
        -moz-box-shadow: 0 1px #fff inset, 0 1px #ddd;
        -webkit-box-shadow: 0 1px #fff inset, 0 1px #ddd;
        box-shadow: 0 1px #fff inset, 0 1px #ddd;
        background: #f5f5f5;
        background: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f5f5f5), color-stop(100%, #eeeeee));
        background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
        background: -o-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
        background: -ms-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
        background: linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#eeeeee', GradientType=0);
    }
    .main-center{
        margin-top: 30px;
        margin: 0 auto;
        max-width: 500px;
        padding: 10px 40px;
        background:#009edf;
        color: #FFF;
        text-shadow: none;
        -webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
        -moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
        box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);

    }
    span.input-group-addon i {
        color: #009edf;
        font-size: 17px;
    }

    .login-button{
        margin-top: 5px;
    }

    .login-register{
        font-size: 11px;
        text-align: center;
    }

    input, textarea {
        max-width: 100%;
    }

</style>
