<?php


require_once __DIR__."/../config.php";
require_once SITE_ROOT . "/models/account_model.php";


class account
{
        protected $_acc_id='';
        protected $_username='';
        protected $_password='';
        protected $_role='';
        protected $_current_account_info = array();
        function __construct()
        {
            $this->_acc_id = $_SESSION['acc_id'];
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
            if(!isset($_SESSION['username'])) echo '<script type="text/javascript">
                                                        window.location = "../index.php";
                                                  </script>';
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
                    $site = new Login();
                    $this->_role = $this->_current_account_info["role_id"];
                    $site->Homepage($this->_role);
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

        }
}

