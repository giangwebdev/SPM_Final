<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/22/2018
 * Time: 10:14 PM
 */

require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/supervisor_controller.php");

class supervisor_view{
    function create_meeting_request(){
        require_once (SITE_ROOT."/template/supervisor_create_meeting_request.php");
    }
}