<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/24/2018
 * Time: 6:12 PM
*/
require_once __DIR__ . "/../config.php";
require(SITE_ROOT . "/vendor/autoload.php");

//
//$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
//$reader->setReadDataOnly(TRUE);
//$spreadsheet = $reader->load("../upload/student_list.xlsx");
//
//$worksheet = $spreadsheet->getActiveSheet();
//
//echo '<table>' . PHP_EOL;
//foreach ($worksheet->getRowIterator() as $row) {
//echo '<tr>' . PHP_EOL;
//$cellIterator = $row->getCellIterator();
//$cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
////    even if a cell value is not set.
//// By default, only cells that have a value
////    set will be iterated.
//foreach ($cellIterator as $cell) {
//echo '<td>' .
//$cell->getValue() .
//'</td>' . PHP_EOL;
//}
//echo '</tr>' . PHP_EOL;
//}
//echo '</table>' . PHP_EOL;

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );

        // jQuery(document).ready(function($) {
        //     $(".clickable-row").click(function() {
        //         alert($(this).data('value'));
        //     });
        // });

        $( function() {
            $( "#dialog" ).dialog({
                autoOpen: false,
                show: {
                    effect: "fade",
                    duration: 200
                },
                hide: {
                    effect: "fade",
                    duration: 200
                }
            });

            $( "#row1" ).on( "click", function() {
                $( "#dialog" ).dialog( "open" );
            });
        } );
    </script>
    <style>
        table.table.table-striped.table-bordered tbody tr.clickable-row { cursor: pointer; background-color: #00FF7F }

        button:focus{
            outline: 0;
        }


        }
    </style>
</head>
<body>

<table id="example" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
    <thead>
    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Age</th>
        <th>Start date</th>
        <th>Salary</th>
    </tr>
    </thead>
    <tbody>
    <tr class='clickable-row' id="row1" data-value="1">
        <td>Tiger Nixon</td>
        <td>System Architect</td>
        <td>Edinburgh</td>
        <td>61</td>
        <td>2011/04/25</td>
        <td>$320,800</td>
    </tr>
    <tr >
        <td>Garrett Winters</td>
        <td>Accountant</td>
        <td>Tokyo</td>
        <td>63</td>
        <td>2011/07/25</td>
        <td>$170,750</td>
    </tr>
    <tr class='clickable-row'>
        <td>Ashton Cox</td>
        <td>Junior Technical Author</td>
        <td>San Francisco</td>
        <td>66</td>
        <td>2009/01/12</td>
        <td>$86,000</td>
    </tr>
    <tr>
        <td>Cedric Kelly</td>
        <td>Senior Javascript Developer</td>
        <td>Edinburgh</td>
        <td>22</td>
        <td>2012/03/29</td>
        <td>$433,060</td>
    </tr>
    <tr>
        <td>Airi Satou</td>
        <td>Accountant</td>
        <td>Tokyo</td>
        <td>33</td>
        <td>2008/11/28</td>
        <td>$162,700</td>
    </tr>
    <tr>
        <td>Brielle Williamson</td>
        <td>Integration Specialist</td>
        <td>New York</td>
        <td>61</td>
        <td>2012/12/02</td>
        <td>$372,000</td>
    </tr>
    </tbody>
</table>

<div id="dialog" title="Basic dialog">
    <p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>

</body>
</html>