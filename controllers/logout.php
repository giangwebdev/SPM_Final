<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/6/2018
 * Time: 9:35 AM
 */
session_start();
session_destroy();
echo '<script type="text/javascript">
         window.location = "../index.php";
      </script>';