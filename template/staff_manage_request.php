<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/20/2018
 * Time: 1:57 PM
 */
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
    <h1>Manage request</h1>
    <form>
        <div>
            <form>
                Search: <input type="text" name="request_search" >
                <button type="submit" name="request_search_btn">Search</button>
            </form>
        </div>
        <br>
        <div>Request type:
            <select>
                <option value="1" selected>All requests</option>
                <option value="2">Meeting request</option>
                <option value="3">Change project name</option>
            </select></div>
        <br>
        <table cellspacing="0" border="1">
            <tr>
                <td>Request type</td>
                <td>Request by</td>
                <td>Team</td>
                <td>Status</td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
        </table>
    </form>
</body>
</html>
