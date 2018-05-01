<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
        .pointer_btn{
            cursor: pointer;
            margin:0 auto;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        li a {
            display: inline-block;
            color: black;
            text-align: center;
            padding: 6px 16px;
            text-decoration: none;
        }
        li {
            float: left;
        }
        li a:hover {
            color: #0000FF;
        }
        table th, table td{
            padding: 1em; 3em;
        }
        table tbody tr{
            position: relative;
        }
        .menu-task{
            margin-top: -2.8em;
            margin-left: 5em;
            position: absolute;
        }

        .blur-animated{

            -webkit-animation: filter-animation 2s forwards ;
        }

        @-webkit-keyframes filter-animation {
            0% {
                -webkit-filter: blur(1px);
                filter:blur(1px) ;
            }
            100% {
                -webkit-filter: blur(3px);
                filter:blur(3px) ;
            }
        }
        .menu-task{
            background-color: #00FF7F;
            border-radius: 50px;
        }
    </style>

    <script>
        $( function() {
            $(".task").dialog({
                draggable: false,
                width: "auto",
                resizable: false,
                closeOnEscape: true,
                autoOpen: false,
                modal: true,
                show: {
                    effect: "fade",
                    duration: 150
                },
                hide: {
                    effect: "fade",
                    duration: 150
                }
            });
            var task_id_value;
            var pointer_btn = $(".pointer_btn");
            var menu_task =$(".menu-task");

            $( ".cancel-btn" ).button().on( "click", function() {
                $( "#create_task" ).dialog( "close" );
            });
            menu_task.hide();


            pointer_btn.on("click",function(e) {

                //get task_id
                var $task_id = $(this).parent().next();
                task_id_value = $task_id.data("value");
                $("#task_id_send").val(task_id_value);
                //show task menu
                var top = $(this).offset().top;
                var left = $(this).offset().left;
                if(menu_task.css("display","none")){
                    $(this).parent().nextAll().addClass("blur-animated");
                    menu_task.fadeIn(100);
                    menu_task.css("top",top + 41).css("left",left);
                }else{
                    $(this).parent().nextAll().removeClass("blur-animated");
                    menu_task.fadeOut(100);
                }


                $(this).parent().parent().prevAll().find("td").removeClass("blur-animated");
                $(this).parent().parent().nextAll().find("td").removeClass("blur-animated");


                $("#create-subtask-btn").on("click", function () {
                    $(".menu-task").hide();
                    $("tbody").find("td").removeClass("blur-animated");
                    $("#create_task").dialog({
                        title: "New Task"
                    }).dialog("open");
                });

                $(document).on("click", function (e) {
                    if ($(e.target).is(".menu-task")===false&&$(e.target).is( pointer_btn)===false) {
                        $(".menu-task").hide();
                        $("tbody").find("td").removeClass("blur-animated");
                    }
                });
            });


        });
    </script>
</head>
<body>
<div>
    <table border="1" cellspacing="0">
        <thead>
        <tr>
            <th></th>
            <th>ASSSSSS</th>
            <th>ASSSSSS</th>
            <th>ASSSSSS</th>
            <th>ASSSSSS</th>
            <th>ASSSSSS</th>
            <th>ASSSSSS</th>
            <th>ASSSSSS</th>
            <th>ASSSSSS</th>
        </tr>
        </thead>
        <tbody>
        <tr class="container">
            <td class="first-col">
                <img class="pointer_btn" src="../image/icons/plus_icon.png" width="20px">
            </td>
            <td data-value="30">30</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
        </tr>
        <tr class="container">
            <td class="first-col">
                <img class="pointer_btn" src="../image/icons/plus_icon.png" width="20px">
            </td>
            <td data-value="20">20</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
        </tr>
        <tr class="container">
            <td class="first-col">
                <img class="pointer_btn" src="../image/icons/plus_icon.png" width="20px">
            </td>
            <td data-value="60">60</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
            <td>ASSSSSS</td>
        </tr>
        </tbody>

    </table>
</div>

<div class="menu-task">
    <ul>
        <li><a href="#" id="create-subtask-btn">Create subtask</a></li>
        <li><a href="#">View</a></li>
        <li><a href="#">Delete</a></li>
    </ul>
</div>


<div id="create_task" class="task">
    <form>
        <input type="text" id ="task_id_send" value="">
        <button type="button" class="cancel-btn" >Cancel</button>
    </form>
</div>


<!--///////////////////////////////////////////////////////////////-->
<br/><br/><br/><br/><br/>

<div>
    <form>
        <table cellspacing="0" border="0">
            <tr>
                <td class="first-col"><img class="create_task_btn" src="../image/icons/plus_icon.png" width="20px"> </td>
                <td class="clickable task_id" data-value="30">30</td>
            </tr>
            <tr>
                <td><p>====</p></td>
                <td><p>====</p></td>
            </tr>

            <tr>
                <td class="first-col"><img class="create_task_btn" src="../image/icons/plus_icon.png" width="20px"> </td>
                <td class="clickable task_id" data-value="20">20</td>
            </tr>
        </table>
    </form>

</div>






</body>
</html>
