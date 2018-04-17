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
</head>
<body>

        <table cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Status</th>
            </tr>

            <?php
                foreach ($acc_list as $info){
                    $role='';

                    if($info['role_id']==1){
                        $role="Student";
                    }
                    elseif ($info['role_id']==2){
                        if($is_supervisor_head){
                            $role="Supervisor Head";
                        }else{
                            $role="Supervisor";
                        }

                    }
                    elseif ($info['role_id']==3){
                        if($is_admin){
                            $role="Admin";
                        }else{
                            $role="Academic Staff";
                        }

                    }
                    echo "<tr>";
                    echo "<th>".$info['acc_id']."</th>";
                    echo "<th>".$info['username']."</th>";
                    echo "<th>".$role."</th>";
                    echo $info['isactive']?"<th>Active</th>":"<th>Deactive</th>";
                    echo $info['isactive']?"<th><button>Deactive</button></th>":"<th><button>Active</button></th>";
                    echo "</tr>";
                }
            ?>

        </table>
</body>
</html>