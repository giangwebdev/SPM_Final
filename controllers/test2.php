<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/24/2018
 * Time: 6:12 PM
*/
require_once __DIR__."/../config.php";
require (SITE_ROOT."/vendor/autoload.php");


$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load("../upload/student_list.xlsx");

$worksheet = $spreadsheet->getActiveSheet();

echo '<table>' . PHP_EOL;
foreach ($worksheet->getRowIterator() as $row) {
echo '<tr>' . PHP_EOL;
$cellIterator = $row->getCellIterator();
$cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
//    even if a cell value is not set.
// By default, only cells that have a value
//    set will be iterated.
foreach ($cellIterator as $cell) {
echo '<td>' .
$cell->getValue() .
'</td>' . PHP_EOL;
}
echo '</tr>' . PHP_EOL;
}
echo '</table>' . PHP_EOL;