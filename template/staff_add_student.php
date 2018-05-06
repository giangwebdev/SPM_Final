<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
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
    <?php require_once(SITE_ROOT."/template/header.php"); ?>
    <link rel="stylesheet" href="./css/spmfu.css">
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">

    <STYLE>
        .table-header{
           width: 100px;
            text-align: center;
        }
        #add_btn,#back_btn{
            display: inline;
            float: right;
            margin-right: 30px !important;
        }

        .success{
            color: lawngreen;
            text-align: center;
        }
        .failed{
            color: red;
            text-align: center;
        }
    </STYLE>
</head>


<body>
<div class="limiter">

    <div class="container-login100" >
        <div class="wrap-login100" style="color: white; min-width: 600px">


                <span class="login100-form-title p-b-34 p-t-27">
						ADD STUDENT
					</span>
    <h5>Import student</h5>
<form action="./index.php?action=add_student_list&controller=staff" method="post" enctype="multipart/form-data">
    <p>Choose file to import (.xlsx)</p>
    <input type="file" name="filename">
    <button class="login100-form-btn" type="submit" name="upload" value="Upload">Upload</button>

</form>
            <?php
            if(isset($worksheet) && $worksheet != null){
            ?>
            <h5> Student List</h5>
            <table cellspacing="0" border="1">
                <tr>
                    <th class="table-header">Student ID</th>
                    <th class="table-header">Name</th>
                    <th class="table-header">DoB</th>
                    <th class="table-header">Gender</th>
                    <th class="table-header">Phone</th>
                    <th class="table-header">Email</th>
                    <th class="table-header">Major</th>
                </tr>
                <?php
                foreach ($worksheet->getRowIterator() as $row) {
                    ?>
                    <tr style="text-align: center">
                        <?php
                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(FALSE);
                        foreach ($cellIterator as $cell) {
                            if($cell->getValue() != null){
                                echo
                                    '<td>' .
                                    $cell->getValue() .
                                    ' </td>';
                            }

                        }
                        ?>
                    </tr>
                    <?php
                }

        ?>
    </table> <br>
    <br>
                <form action="./index.php?action=add_student_list&controller=staff" method="post">
                    <button class="login100-form-btn" id="add_btn" type="submit" value="add_btn" name="add_btn" style="margin: 0 auto;">Add</button>
                </form>

            <?php
            }
            if(isset($rows) && $rows != null){

            ?>
            <table cellspacing="0" border="1">
                <tr>
                    <th class="table-header">Student ID</th>
                    <th class="table-header">Name</th>
                    <th class="table-header">DoB</th>
                    <th class="table-header">Gender</th>
                    <th class="table-header">Phone</th>
                    <th class="table-header">Email</th>
                    <th class="table-header">Major</th>
                </tr>
                <?php foreach ($rows as $row) {
                    if($row[7] == "success"){
                        $class="success";
                    }else{
                        $class="failed";
                    }
                    ?>
                    <tr class="<?php echo $class;?>">
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>
                        <td><?php echo $row[6]; ?></td>
                    </tr>
                    <?php
                }
            }?>

            </table>
            <button class="login100-form-btn" id="back_btn" type="button" onclick="window.location.href='./index.php?action=homepage&controller=account'" style="margin: 0 auto;">Back</button>
        </div>
    </div>
</div>

</body>
</html>
