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
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $.ajax({url: "../Test/test_class.php", async: false, type:"POST", data: "name=Jay", success: function(result){
                        $("#clgt").html(result);
                    }});
            });
        });
    </script>
</head>
<body>

<div><h2>Let AJAX change this text</h2></div>
<div id="clgt"></div>
<button>Change Content</button>
</body>
</html>