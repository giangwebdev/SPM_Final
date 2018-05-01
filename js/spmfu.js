$( function() {
    $( ".task" ).dialog({
        draggable:false,
        width:"auto",
        resizable:false,
        closeOnEscape: false,
        autoOpen: false,
        modal:true,
        show: {
            effect: "fade",
            duration: 150
        },
        hide: {
            effect: "fade",
            duration: 150
        }
    });

    $( "#create_task_btn" ).button();
    $(".reset-btn").button();
    $(".edit-btn").button();

    $( "#create_main_task" ).button().on( "click", function() {

        $( "#create_task_btn" ).val("new_maintask");

        $( "#create_task" ).dialog({
            title: "New Main Task"
        }).dialog( "open" );
    });



    $( ".clickable" ).on( "click", function() {
        $( "#task_detail" ).dialog({
            title: "Task Detail"
        }).dialog( "open" );
    });

    $( ".cancel-btn" ).on( "click", function() {
        $( "#task_detail" ).dialog( "close" );
        $( "#create_task" ).dialog( "close" );
    });

    $("#detail_priority").on("load",function (){
        var task_prio = $(this).data("value");
        if(task_prio === "High"){

        }else if(task_prio === "Medium"){

        }else if(task_prio === "Low"){

        }
    });

    $('#task_table').DataTable();
    $('#bug_table').DataTable();
    $('#supervisor_view_request').DataTable();
    $('#teamleader_view_request').DataTable();

    var task_id_value;
    var pointer_btn = $(".pointer_btn");
    var menu_task =$(".menu-task");


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

    $("thead").find("th").removeClass("sorting");
} );



