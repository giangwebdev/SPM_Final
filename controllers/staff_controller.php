<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/16/2018
 * Time: 12:31 PM
 */

require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/staff_model.php");
require_once (SITE_ROOT."/controllers/account_controller.php");
require_once (SITE_ROOT."/vendor/autoload.php");

class staff extends account {

    private $__acc_list = array();

    function display_all_account_info(){
            $acc_info = new staff_model();
            $this->__acc_list = $acc_info->get_all_account_info();
            require_once (SITE_ROOT.'/views/staff_view.php');
            $acc_view = new staff_view();
            $acc_view->view_account($this->__acc_list);
    }

    function check_admin(){
        $staff = new staff_model();
        return $staff->check_admin($this->_acc_id);
    }

    function create_account(){
        require_once (SITE_ROOT.'/views/staff_view.php');
        $staff_view =  new staff_view();
        $staff_view->create_account();
        if(isset($_POST['email']) && $_POST['email'] !=null ){
            $staff =new staff_model();
            $email = $_POST['email'];
            $username = substr($email, 0, strpos($email, "@"));
            $password = $this->auto_gen_password();
            $role_id = $_POST['role'];
            $check = $staff->create_account($username,$password,$role_id);
            require_once (SITE_ROOT.'/models/account_model.php');
            $acc = new account_model();
            $acc_id = $acc->get_acc_id($username);
            $student_id = substr($username, 0, strpos($username, "SE"));
            if($check == true){
                $acc->insert_profile($acc_id, $student_id,$email, $role_id);
                echo "Create account successful.";
            }else{
                echo "Failed to create new account.";
            }
        }

    }

    function admin_edit_profile(){

        require_once (SITE_ROOT.'/models/account_model.php');
        $acc_id = $_POST['acc_id'];
        $acc_role = $_POST['acc_role'];
        $acc_info = new account_model();
        $acc_info->get_profile_by_id($acc_id,$acc_role);
        require_once (SITE_ROOT.'/views/staff_view.php');
        $staff_view =  new staff_view();
        $staff_view->view_account();
    }

    function add_student_list(){

    }

}