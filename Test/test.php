<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"> </script>
    <script type="text/javascript">
        $(function() {
            $('.byrole').hide();
            $('#search').change(function(){
                if($('#search').val() == 1) {
                    $('.byuser').show();
                    $('.byrole').hide();
                } else {
                    $('.byrole').show();
                    $('.byuser').hide();
                }
            });

        });
        $(document).ready(function() {
            $('#page-help').each(function() {
                var $link = $(this);
                var $dialog = $('<div></div>')
                    .load($link.attr('href'))
                    .dialog({
                        autoOpen: false,
                        title: $link.attr('title'),
                        width: 500,
                        height: 300
                    });

                $link.click(function() {
                    $dialog.dialog('open');

                    return false;
                });
            });
        });
    </script>
</head>
<body>
        <select id="search"">
            <option value="1" >Username</option>
            <option value="2" >Role</option>
        </select>
        <input type="text" class="byuser" >
        <select class="byrole">
            <option>Student</option>
            <option>Staff</option>
        </select>
        <button type="button">Find</button>

        <a id="page-help" href="./test2.php" onclick="window.open(this.href, 'popupwindow', 'width=500,height=300'); return false;">what is this?</a>
</body>
</html>