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
                        $this->_role_id = $this->_current_account_info["role_id"];
                        if($this->_role_id == 1){
                            require_once(SITE_ROOT . '/views/student_view.php');
                            require_once(SITE_ROOT . "/models/student_model.php");
//                            $student_model = new student_model();
//                            if($student_model->has_team($this->_role_id)==false) {
//                                $student_view = new student_view();
//                                $student_view->create_team();
//                            }else{
                                $this->homepage();
//                            }
                        }else{
                            $this->homepage();
                        }

                    } else {
                        echo '<script type="text/javascript">
                 alert("Your account is locked!");
                 window.location = "./index.php";
                 </script>';
                    }
                }
            }else{
                echo '<script type="text/javascript">
                 alert("Wrong username or password! " +
                  " Please try again!");
                 window.location = "./index.php";
                 </script>';
            }

        }


        function homepage(){
            $acc_view = new account_view();
            $acc_view->homepage();
        }
        function change_password(){
                $acc_view = new account_view();
                $acc_view->change_password();
            if(isset($_POST['new_password']) && $_POST['new_password']!=null){
                $new_password = $_POST['new_password'];
                $acc_name = $_SESSION['username'];
                $account = new account_model();
                $is_succeed = $account->change_password($acc_name ,$new_password);
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

        function sendMail($email,$msg){
            $subject= "Auto email from SPMFU - Reset password";
               $msg = wordwrap($msg, 70);
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'From: SPMFU Auto mail system <vn15fps@gmail.com>';

                if(mail($email,$subject,$msg,implode("\r\n",$headers))){
                    return true;
                }else{
                    return false;
                }
        }

        function logout(){
            session_destroy();
            ob_end_flush();
            header('Location: index.php',true,301);
            exit();
        }

        function reset_password(){
            $acc_view = new account_view();
            if(isset($_POST['reset_username']) && $_POST['reset_username'] !=null){
                $_reset_user = $_POST['reset_username'];
                $account = new account_model();
                $check_user = $account->get_account_info($_reset_user);
            if(isset($check_user) && $check_user != null){
                $password_temp = $this->auto_gen_password();
                $acc_id = $check_user['acc_id'];
                $role_id = $check_user['role_id'];
                $user_detail = $account->get_profile_by_id($acc_id,$role_id);
                $email = $user_detail[0]['email'];
                //email messenge
                $msg ='
                <html>
                <head>
                  <title>Auto email from SPMFU</title>
                </head>
                <body>
                  <p>Your temporary password is <span style="color: #0000FF; font-size: medium;">'. $password_temp .'</span></p>              
                  <p>Click <a href="google.com.vn">Here</a> to change your password.</p>
                  <h3>Remember: Don\'t give password to anyone. This will lead you losing sensitive data when doing project</h3>
                  <p>'.date("m-m-Y h:i:sa").'</p>
                </body>
                </html>
                ';
                if($account->save_password_temp($acc_id,$password_temp) && $this->sendMail($email,$msg)){
                    $_SESSION['msg_noti'] = "Your password has been sent to your email!";
                    $acc_view->reset_password();
                }else{
                    $_SESSION['msg_noti'] = "Failed to send mail, report this issue to administrator to get help.";
                    $acc_view->reset_password();
                }
            }else{
                $_SESSION['msg_noti'] = "This account does not exists. Please check again.";
                $acc_view->reset_password();
            }
            }else{

                $acc_view->reset_password();
            }

        }

        function change_pass_nologin(){
            $acc_view = new account_view();
            $acc_view->change_password_nologin();
            if(isset($_POST['password_temp']) && $_POST['password_temp']!=null){
                $password_temp = $_POST['password_temp'];
                $acc_name= $_POST['acc_name'];
                $account = new account_model();
                if($account->check_account($acc_name,$password_temp)){
                    if(isset($_POST['password_new']) && $_POST['password_new']!=null){
                        $is_succeed = $account->change_password($acc_name, $_POST['password_new']);
                        if($is_succeed){
                            echo "Change password successful!";
                        }else{
                            echo "Failed!";
                        }
                    }
                }else{
                    echo "Wrong temporary password. You should copy and paste it to avoid missing characters. 
                    \n Remember: Temporary password contains no space.";
                }
            }
        }
}

