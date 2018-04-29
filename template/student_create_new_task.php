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
<div id="create_task" class="task">
    <form>
        <fieldset>
            <table cellspacing="0" border="0">
                <tr>
                    <td>Priority</td>
                    <td><select>
                            <option>High</option>
                            <option>Medium</option>
                            <option>Low</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Task name</td>
                    <td><input type="text" name="taskname" class="text ui-widget-content ui-corner-all"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea rows="5" cols="50" name="description" class="text ui-widget-content ui-corner-all"></textarea></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="assign_by" class="text ui-widget-content ui-corner-all"></td>
                </tr>
                <tr>
                    <td>Assign to</td>
                    <td><input type="text" name="assign_to" class="text ui-widget-content ui-corner-all"></td>
                </tr>
                <tr>
                    <td>Deadline</td>
                    <td><input type="date" name="deadline" class="text ui-widget-content ui-corner-all"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" name="edit">Create</button>
                        <button type="button" class="cancel-btn" >Cancel</button></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>
</body>
</html>