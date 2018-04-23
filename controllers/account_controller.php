<?php


require_once __DIR__."/../config.php";
require_once SITE_ROOT . "/models/account_model.php";
require_once(SITE_ROOT . '/views/account_view.php');

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
                echo '<script type="text/javascript">
                 window.location.href = "./login.php";
                 </script>';

            }else{
                $this->_username  = $_POST['username'];
                $this->_password   = $_POST['password'];
            }
        }

        function check_Session(){
            if(!isset($_SESSION['acc_id'])){
                echo '<script type="text/javascript">
                 window.location.href = "../index.php";
                 </script>';
            }
        }

        function login()
        {

            $account = new account_model();
            $this->checkLogin();
            $check_acc = $account->check_account($this->_username, $this->_password);
            if($check_acc == true){
                $this->_current_account_info = $account->get_account_info($this->_username);
                if (isset($this->_current_account_info) && $this->_current_account_info != null) {
                    if ($this->_current_account_info['isactive'] == 1) {
                        $_SESSION["acc_id"] = $this->_current_account_info["acc_id"];
                        $_SESSION["username"] = $this->_current_account_info["username"];
                        $_SESSION["role_id"] = $this->_current_account_info["role_id"];
                        $site = new account_view();
                        $this->_role_id = $this->_current_account_info["role_id"];
                        $site->homepage($this->_role_id);
                    } else {
                        echo '<script type="text/javascript">
                 alert("Your account is locked!");
                 window.location = "../index.php";
                 </script>';
                    }
                }
            }else{
                echo '<script type="text/javascript">
                 alert("Wrong username or password! " +
                  " Please try again!");
                 window.location = "../index.php";
                 </script>';
            }

        }


        function homepage(){
            require_once (SITE_ROOT.'/views/account_view.php');
            $site = new account_view();
            $site->homepage($this->_role_id);
        }
        function change_password(){
                require_once (SITE_ROOT.'/views/account_view.php');
                $acc_view = new account_view();
                $acc_view->change_password();
            if(isset($_POST['new_password']) && $_POST['new_password']!=null){
                $new_password = $_POST['new_password'];
                $account = new account_model();
                $is_succeed = $account->change_password($new_password);
                if($is_succeed){
                    echo "Change password successful!";
                }else{
                    echo "Failed!";
                }
            }

        }


        function edit_profile(){
            $account = new account_model();
            $this->_current_account_detail = $account->get_profile();
            require_once (SITE_ROOT."/views/account_view.php");
            $acc_view = new account_view();
            foreach ($this->_current_account_detail as $key=>$detail){
                $acc_view->__set($key,$detail);
            }
            $acc_view->edit_profile();
            if(isset($_POST['edit']) && $_POST['edit'] !=null){
                $phone = $_POST['phone'];
                if(!isset($_POST['upload_avatar'])){
                    $profile_pic = $_POST['upload_avatar'];
                }else{
                    $profile_pic = null;
                }
               $check = $account->edit_profile($phone,$profile_pic);
                if($check == true){
                    echo "Edit profile successful.";
                }else{
                    echo "Failed!";
                }
            }
        }

        function view_profile(){
            $account = new account_model();
            $this->_current_account_detail = $account->get_profile();
            require_once (SITE_ROOT."/views/account_view.php");
            $acc_view = new account_view();
            foreach($this->_current_account_detail as $key=>$detail){
                $acc_view->__set($key,$detail);
            }
            $acc_view->view_profile();

        }

        function auto_gen_password(){
            $password = '';
            for($length = 0; $length < 8; $length++) {
                $password .= chr(rand(33, 126));
            }
            return $password;
        }

        function logout(){
            session_destroy();
            header('Location: index.php',true,301);
            exit();
        }
}

