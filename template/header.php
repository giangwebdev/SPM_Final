<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--    <link rel="icon" type="image/png" href="./image/icons/favicon.ico"/>-->
<!--    <!--===============================================================================================-->
<!--    <link rel="stylesheet" type="text/css" href="./vendor/bootstrap/css/bootstrap.min.css">-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
<!--    <link rel="stylesheet" type="text/css" href="./fonts/iconic/css/material-design-iconic-font.min.css">-->
<!--    <!--===============================================================================================-->
<!--    <link rel="stylesheet" type="text/css" href="./vendor/animate/animate.css">-->
<!--    <!--===============================================================================================-->
<!--    <link rel="stylesheet" type="text/css" href="./vendor/css-hamburgers/hamburgers.min.css">-->
<!--    <!--==================1=============================================================================-->
<!--    <link rel="stylesheet" type="text/css" href="./vendor/animsition/css/animsition.min.css">-->
<!--    <!--===============================================================================================-->
<!--    <link rel="stylesheet" type="text/css" href="./vendor/select2/select2.min.css">-->
<!--    <!--===============================================================================================-->
<!--    <link rel="stylesheet" type="text/css" href="./vendor/daterangepicker/daterangepicker.css">-->
<!--    <!--===============================================================================================-->
<!--    <link rel="stylesheet" type="text/css" href="./css/util.css">-->
<!--    <link rel="stylesheet" type="text/css" href="./css/main.css">-->
    <!--===============================================================================================-->
<!--    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->


    <!-- Custom fonts for this . -->
<!--    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">-->
<!--    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">-->


    <!-- Custom styles for this template -->
    <link href="./css/style.css" rel="stylesheet">
</head>
<body>
<header id="header">
    <div class="container-fluid">

        <div id="logo" class="pull-left">
            <a href="#intro" class="scrollto"><img src="./image/Logo-FU-01.png"></a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
<!--                Rieng-->
                <?php
                if($role ==1){
                    //Team Leader
                ?>
                    <li class="menu-has-children"><a href="">Manage Request</a>
                    <ul>
                        <li><a href="#">Create New</a></li>
                        <li><a href="#">View Request</a></li>
                    </ul>
                    </li>
                    <li class="menu-has-children"><a href="">Manage Task</a>
                        <ul>
                            <li><a href="#">View Task</a></li>
                        </ul>
                    </li>
                <?php
                }elseif($role == 2){
                    //SUPERVISOR
                    ?>

                    <li class="menu-has-children"><a href="">Manage Request</a>
                        <ul>
                            <li><a href="#">View Request</a></li>
                            <li><a href="#">Book Meeting Room</a></li>
                        </ul>
                    </li>
                    <li class="menu-has-children"><a href="">Manage Task</a>
                        <ul>
                            <li><a href="#">Team 1</a></li>
                            <li><a href="#">Team 2</a></li>
                        </ul>
                    </li>
                    <?php
                }elseif ($role == 3){
                    //STAFF
                    ?>

                    <li class="menu-has-children"><a href="">Manage Account</a>
                        <ul>
                            <li><a href="#">View List Account</a></li>
                            <li><a href="#">Import Students</a></li>
                        </ul>
                    </li>
                    <li class="menu-has-children"><a href="">Manage Request</a>
                        <ul>
                            <li><a href="#">View Request</a></li>
                        </ul>

                    </li>

                    <?php
                }elseif ($role == 5){
                    //SUPERVISOR HEAD
                    ?>
                    <li class="menu-has-children"><a href="">Manage Request</a>
                        <ul>
                            <li><a href="#">Approve Team Pending</a></li>
                            <li><a href="#">Create New</a></li>
                            <li><a href="#">View Request</a></li>
                        </ul>
                    </li>
                    <li class="menu-has-children"><a href="">Manage Task</a>
                        <ul>
                            <li><a href="#">Team 1</a></li>
                            <li><a href="#">Team 2</a></li>
                        </ul>
                    </li>

                    <?php
                }elseif($role ==4){
                            //ADMIN
                    ?>
                    <li class="menu-has-children"><a href=""><span
                                    class="glyphicon glyphicon-user"></span>Manage Account</a>
                        <ul>
                            <li><a href="#">Create New Account</a></li>
                            <li><a href="#">View List Account</a></li>
                            <li><a href="#">Import Students</a></li>
                        </ul>
                    </li>
                    <li class="menu-has-children"><a href="">Manage Request</a>
                        <ul>
                            <li><a href="#">View Request</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=add_student_list&controller=staff">Import student</a>
                    </li>

                    <?php
                }
                ?>
<!--                //Chung-->
                <li class="menu-has-children"><a href="#"><img src="./image/icon-user.png" style="max-width: 30px;"></a>
                <ul>
                    <li><a href="./index.php?action=view_profile&controller=account" >View Profile</a></li>
                    <li><a href="./index.php?action=edit_profile&controller=account">Edit profile</a></li>
                    <li><a href="./index.php?action=change_password&controller=account">Change password</a></li>
                    <li><a href="./index.php?action=logout&controller=account">Log Out</a></li>
                </ul>
                </li>
            </ul>
        </nav>
    </div>


</header>
<script src="./vendor/jquery/jquery.min.js"></script>
<script src="./js/superfish/superfish.min.js"></script>
<script src="./js/wow/wow.min.js"></script>
<script src="./js/js/main.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
