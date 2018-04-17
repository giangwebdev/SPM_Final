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
<form action="index.php?action=change_password&controller=account" method="post">
    Current password: <input type="password" name="current_password"><br>
    New password: <input type="password" name="new_password"><br>
    Confirm new password: <input type="password" name="new_password_re"><br>
    <button type="submit" name="change_pass_btn">Change</button>
</form>
</body>
</html>