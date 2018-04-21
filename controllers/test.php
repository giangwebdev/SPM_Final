<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript">
        function redirect() {
            window.location = "../index.php";
        }
        </script>
</head>
<body>
<form method="post" action="test.php" enctype="multipart/form-data">
<p>File :</p>
<input type="file" name="Filename">
<p>Description</p>
<textarea rows="10" cols="35" name="Description"></textarea>
<br/>
<input TYPE="button" name="upload" value="Submit" onclick="redirect()"/>
</form>
</body>
</html>