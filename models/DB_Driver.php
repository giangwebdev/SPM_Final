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
            $this->__conn = mysqli_connect('localhost', 'root', 'root', 'spmfu') or die ('Lỗi kết nối');

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

    //Insert
    function insert($table, $data){
        // Kết nối
        $this->connect();

        // Lưu trữ danh sách field
        $field_list = '';
        // Lưu trữ danh sách giá trị tương ứng với field
        $value_list = '';

        // Lặp qua data
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".mysqli_escape_string($value)."'";
        }

        // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';

        return mysqli_query($this->__conn, $sql);
    }

    //Update
    function update($table, $data, $where){
        // Kết nối
        $this->connect();
        $sql = '';
        // Lặp qua data
        foreach ($data as $key => $value){
            $sql .= "$key = '".mysqli_escape_string($value)."',";
        }

        // Vì sau vòng lặp biến $sql sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;

        return mysqli_query($this->__conn, $sql);
    }

    //Xoá
    function  delete($table, $where){
        // Kết nối
        $this->connect();

        // Delete
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->__conn, $sql);
    }

    // Hàm lấy danh sách
    function get_list($table, $select, $where){
        // Kết nối
        $this->connect();
        $sql = 'select '.$select.' from '.$table.' where '.$where;
        $result = mysqli_query($this->__conn, $sql);

        if (!$result){
            die ('Câu truy vấn bị sai');
        }

        $return = array();

        // Lặp qua kết quả để đưa vào mảng
        while ($row = mysqli_fetch_assoc($result)){
            $return[] = $row;
        }

        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);

        return $return;
    }

    // Hàm lấy 1 record
    function get_row($table, $select, $where){
        // Kết nối
        $this->connect();
        $sql = 'select '.$select.' from '.$table.' where '.$where;
        $result = mysqli_query($this->__conn, $sql);

        if (!$result){
            die ('Câu truy vấn bị sai');
        }

        $row = mysqli_fetch_assoc($result);

        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);

        if ($row){
            return $row;
        }

        return false;
    }
}