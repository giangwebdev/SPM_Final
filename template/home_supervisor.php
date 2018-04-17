<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supervisor Homepage</title>
    <link rel="stylesheet" href="css/spmfu.css">
</head>
<body>
<header id="header">
</header>
<div id="container" >

    <div> Welcome back, <?php
        if(!isset($_SESSION['username'])) echo '<script type="text/javascript">
                                                        window.location = "../index.php";
                                                  </script>';
        echo $username = $_SESSION['username'];
        ?> </div>
    <menu id="sidebar">
        <table cellspacing="0" border="1" id="Box">
            <tr><th id="box_header">Main menu</th></tr>
            <tr><th id="menu">
                    <ul>
                        <li><a href="../approve_pending_acc.php">Manage account request</a></li>
                        <li><a href="#">Create account</a></li>
                        <li><a href="#">Edit account</a></li>
                        <li><a href="#">Manage team</a></li>
                        <li><a href="../controllers/logout.php">Logout</a></li>
                    </ul>
                </th>
            </tr>
        </table>
    </menu>
    <section>

    </section>

</div>
<footer>
    <div id="container-fluid">
        <div id="copyright">Copyright SPMFU</div>
    </div>
</footer>
</body>
</html>