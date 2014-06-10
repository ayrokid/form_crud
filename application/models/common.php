<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Model{
    
        function __construct() {
            parent::__construct();
        }
        
        function checkUser($user, $password){
            $sql = $this->db->get_where('user',  array('username' => $user, 'password'=>md5($password)));
            if($sql->num_rows() > 0){
                return true;
            }
            return false;
        }
        
        function getUser($user){
            $sql = $this->db->get_where('user', array('username'=>$user));
            return $sql->row();
        }
        
        function saveArtikel($data, $kode){
            if($kode == 'i'){
                $this->db->insert("artikel", $data);
            }else{
                $this->db->update("artikel", $data, array('arid' => $kode));
            }
            if($this->db->affected_rows() > 0){
                return true;
            }
            return false;
        }
        
}

