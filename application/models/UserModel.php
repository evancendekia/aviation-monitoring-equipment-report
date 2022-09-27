<?php
class UserModel extends CI_Model {
    function __construct(){
        parent::__construct();
    }
    function CheckUniversal($table,$col,$par){
        $this->db->select('*');
        $this->db->from($table);
        for($i=0;$i<count($col);$i++){
            $this->db->where($col[$i],$par[$i]);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    function GetData($select,$table,$col,$par){
        $this->db->select($select);
        $this->db->from($table);
        for($i=0;$i<count($col);$i++){
            $this->db->where($col[$i],$par[$i]);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    function InsertData($table,$data){
        $this->db->db_debug = false;
        $this->db->insert($table, $data);
        return $this->db->error();
    }
    function UpdateData($table,$col,$par,$data){
        $this->db->db_debug = false;
        for($i=0;$i<count($col);$i++){
            $this->db->where($col[$i],$par[$i]);
        }
        $this->db->update($table,$data);
        return $this->db->error();
    }
    function DeleteData($table, $col, $par){
        $this->db->db_debug = false;
        for($i=0;$i<count($col);$i++){
            $this->db->where($col[$i],$par[$i]);
        }
        $this->db->delete($table);
        return $this->db->error();
    } 
}
?>