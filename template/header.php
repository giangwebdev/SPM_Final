<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--    <link rel="stylesheet" href="./css/spmfu.css">-->
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <a class="navbar-brand" href="#"><img src="./image/Logo-FU-01.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
<!--                Rieng-->
                <?php
                if($role ==1){
                    //STUDENT
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=display_all_account_info&controller=staff">Student</a>
                </li>

                <?php
                }elseif($role == 2){
                    //SUPERVISOR
                    ?>

                        <li class="nav-item">
                            <a class="nav-link" href="../approve_pending_acc.php">Manage account request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?action=create_meeting_request&controller=supervisor">Create meeting request</a>
                        </li>
                    <?php
                }elseif ($role == 3){
                    //STAFF
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=display_all_account_info&controller=staff">View account</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=add_student_list&controller=staff">Import student</a>
                    </li>

                    <?php
                }elseif ($role == 5){
                    //SUPERVISOR HEAD
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=display_all_account_info&controller=staff">Supervisor Head</a>
                    </li>

                    <?php
                }elseif($role ==4){
                            //ADMIN
                    ?>
                    <li class="nav-item">

                        <a class="nav-link" href="./index.php?action=display_all_account_info&controller=staff">View account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=create_account&controller=staff">Create account</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=add_student_list&controller=staff">Import student</a>
                    </li>

                    <?php
                }
                ?>
<!--                //Chung-->


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

</body>
</html>
