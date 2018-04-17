<?php


require_once __DIR__."/../config.php";
require_once SITE_ROOT . "/models/account_model.php";


class account
{
        protected $_acc_id='';
        protected $_username='';
        protected $_password='';
        protected $_role_id='';
        protected $_current_account_info = array();
        protected $_current_account_detail = array();
        function __construct()
        {
            if($this->_acc_id == null && isset($_SESSION['acc_id']) && $_SESSION['acc_id'] != null){
                $this->_acc_id = $_SESSION['acc_id'];
                $this->_role_id = $_SESSION['role_id'];
            }
        }

        function __destruct()
        {
            // TODO: Implement __destruct() method.
        }

        function checkLogin(){
            if(!isset($_POST['username']) || !isset($_POST['password']) || $_POST['username'] ==null || $_POST['password'] == null){
                require_once (SITE_ROOT.'/views/account_view.php');
                $site = new Login();
                $site->inputLogin();

            }else{
                $this->_username  = $_POST['username'];
                $this->_password   = $_POST['password'];
            }
        }

        function check_Session(){
            if(!isset($_SESSION['username'])){
                echo '<script type="text/javascript">
                 window.location = "../index.php";
                 </script>';
            }
        }

        function Login()
        {
            $account = new account_model();
            $this->checkLogin();
            $this->_current_account_info = $account->get_account_info($this->_username, $this->_password);
            if (isset($this->_current_account_info) && $this->_current_account_info != null) {
                if ($this->_current_account_info['isactive'] == 1) {
                    $_SESSION["acc_id"] = $this->_current_account_info["acc_id"];
                    $_SESSION["username"] = $this->_current_account_info["username"];
                    $_SESSION["role_id"] = $this->_current_account_info["role_id"];
                    require_once (SITE_ROOT.'/views/account_view.php');
                    $site = new account_view();
                    $this->_role_id = $this->_current_account_info["role_id"];
                    $site->homepage($this->_role_id);
                }
            }else {
                echo '<script type="text/javascript">
                 alert("Wrong username or password! " +
                  " Please try again!");
                 window.location = "../views/account_view.php";
                 </script>';

            }
        }

        function change_password(){
            $new_password = $_SESSION['new_password'];
            $account = new account_model();
            $account->change_password($new_password);
        }

        function edit_profile(){
            $account = new account_model();
            $account->edit_profile($this->_acc_id);
        }

        function view_profile(){
            $account = new account_model();
            $this->_current_account_detail = $account->get_profile();
            require_once (SITE_ROOT."/views/account_view.php");
            $acc_view = new account_view();
            foreach ($this->_current_account_detail as $key=>$detail){
                $acc_view->__set($key,$detail);
            }
            //$acc_view->view_profile();

        }

        function logout(){
            session_destroy();
            header('Location: index.php',true,301);
            exit();
        }
}

