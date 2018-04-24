<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/14/2018
 * Time: 2:32 PM
 */

class DB_Driver
{
    private $__conn;

    //Hàm kết nối
    function connect(){
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$this->__conn){
            // Kết nối
            $this->__conn = mysqli_connect('localhost', 'root', '', 'spmfu') or die ('Lỗi kết nối');

            // Xử lý truy vấn UTF8 để tránh lỗi font
            mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }

    function get_conn(){
        return $this->__conn;
    }

    //Hàm ngắt kết nối
    function disconnect(){
        // Nếu đang kết nối thì ngắt
        if ($this->__conn){
            mysqli_close($this->__conn);
        }
    }


}