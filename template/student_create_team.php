<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/24/2018
 * Time: 4:57 PM
 */
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
require_once (SITE_ROOT."/models/supervisor_model.php");

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="./css/spmfu.css">
    <script src="./js/spmfu.js"></script>

</head>
<body onload="form.reset();"  >
<div class="limiter">
<div class="container-login100">

    <div class="wrap-login100">
        <h1>Create team</h1>
        <form id ="form" action="./index.php?action=create_team&controller=student" method="post">
            <table>
                <tr>
                    <td><span>Project name: </span></td>
                    <td><textarea name="project_en" cols="40" rows="2"></textarea> (In English)</td>
                </tr>
                <tr>
                    <td></td>
                    <td><textarea name="project_vi" cols="40" rows="2"></textarea> (In Vietnamese)</td>
                </tr>
                <tr>
                <td>Project code: </td>
                <td><input type="text" name="project_code"></td>
                </tr>
                <tr>
                    <td>Supervisor:</td>
                    <td><select name="supervisor">
                            <option>--Choose--</option>
                            <?php
                            $supervisor = new supervisor_model();
                            $supervisors  = $supervisor->get_supervisor_list();
                            foreach ( $supervisors as $supervisor) {
                                echo  "<option value=\"".$supervisor['acc_id']."\">" .$supervisor['full_name']. "</option>";
                            }

                            ?>

                        </select></td>
                </tr>
                <tr class="ui-widget search_member">
                    <td>Team member:</td>
                    <td><input type="text" id="search_member" onfocus="this.value=''" placeholder="Search member"></td>
                </tr>

                <tr class="note">
                    <td>Note:</td>
                    <td><textarea name="note" cols="40" rows="3"></textarea></td>
                </tr>
<!--                <input type="hidden" name="student5" id="student5" value="">-->
<!--                <input type="hidden" name="student5" id="student5" value="">-->
<!--                <input type="hidden" name="student5" id="student5" value="">-->
<!--                <input type="hidden" name="student5" id="student5" value="">-->
<!--                <input type="hidden" name="student5" id="student5" value="">-->

            </table>
            <br>
            <button class="button" type="submit" name="create_team_btn">Create</button>
            <button class="button" type="reset" >Reset</button>
        </form>
    </div>
</div>
</div>
</body>
</html>

<style>
    .ui-autocomplete-loading {
        background: white url("./image/spinner.gif") right center no-repeat;
    }
</style>


<script>
    $(function () {

        var old_data = [];

        $(function () {
            $('input').blur();
        });
        var count =0;
        function log( data_value ) {
            count++;
            var sid = data_value.substr(data_value.indexOf("-") + 1);
            old_data.push(sid);
            $(".note").before($('<tr class="student_list"> <td></td> <td><span> '+ data_value + '</span> <img data-value="'+count+'" class="clickable delete_student" src="./image/remove-x.png" width="20px"></td> </tr> '));
            //
            // for(var i=1<; i<=5; i++){
            //     if($("table").find("#student"+i).val()==" "){
            //         $("table").find("#student"+i).val(sid);
            //     }
            //
            // }

            $(".note").after($('<input type="hidden" id="student'+count+'" name="student'+count+'" value="'+sid+'" >'));


            if(count == 5){
                $(".search_member").hide();
                $("tr.student_list:first").find("td:first-child").html("Team member:");
            }
            $('.delete_student').on("click",function () {
                    $(this).parent().parent().remove();
                    var student_id = "#student" + $(this).data("value");
                    $("table").find(student_id).val(" ");
                    count--;
            });
        }

        $( "#search_member" ).autocomplete({
            source: function( request, response ) {
                $.ajax( {
                    url: "./ajax_Handler.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        _action : "search_member",
                       // old_data : JSON.stringify({ paramName: old_data }),
                        term: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                } )
            },
            minLength: 2,
            select: function( event, ui ) {
                $("#search_member").blur().val(" ");
                log(ui.item.value);
            }
        });
    });

</script>