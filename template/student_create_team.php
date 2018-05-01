<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/24/2018
 * Time: 4:57 PM
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
        <h1>Create team</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td><span>Project name: </span></td>
                    <td><textarea cols="40" rows="2"></textarea> (In English)</td>
                </tr>
                <tr>
                    <td></td>
                    <td><textarea cols="40" rows="2"></textarea> (In Vietnamese)</td>
                </tr>
                <tr>
                    <td>Supervisor:</td>
                    <td><select>
                            <option>--Choose--</option>
                            <option></option>
                        </select></td>
                </tr>
                <tr>
                    <td>Team member:</td>
                    <td> <input type="text" name=""></td>
                </tr>
                <tr>
                    <td>Note:</td>
                    <td><textarea cols="40" rows="3"></textarea></td>
                </tr>
            </table>
            <br>
            <button type="submit" >Create</button>
            <button type="reset" >Reset</button>
            <button type="button" >Cancel</button>
        </form>
</body>
</html>
