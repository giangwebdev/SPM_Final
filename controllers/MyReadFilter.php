<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 5/4/2018
 * Time: 5:38 PM
 */

class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
    public function readCell($column, $row, $worksheetName = '') {
        //  Read rows 1 to 7 and columns A to E only
        if ($row >1) {
            return true;
        }
        return false;
    }
}