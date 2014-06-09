<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Artikel extends Application {
    
    public function __construct() {
        parent::__construct();
        $this->valid_login();
        $this->subTitle = 'Artikel';
    }
    
    public function index(){
        $this->subTitle = 'Daftar Artikel';
        $this->content = 'artikel/list';
        $this->view();
    }
    
    public function load_artikel(){
        $page   = isset($_POST['page']) ? intval($_POST['page']) : 1;  
        $rows   = isset($_POST['rows']) ? intval($_POST['rows']) : 20;  
        $sort   = isset($_POST['sort']) ? strval($_POST['sort']) : 'gu_in';  
        $order  = isset($_POST['order']) ? strval($_POST['order']) : 'desc';  
        $offset = ($page-1)*$rows;  
        $row    = array();  
        $result = array();            
        $result["total"] = $this->sql->count_all('artikel');       
        $sql   = "SELECT * FROM artikel LIMIT $rows OFFSET $offset ORDER BY $sort $order";
        $hasil = $this->sql->select_result($sql);  
        foreach($hasil as $val){
            $link = "";
            $link .= "<a href='javascript:void(0)' onclick='load_page(\"".site_url('transaksi/edit_miscell/'.$val->mis_code)."\")' class='edit' title='edit'></a>&nbsp;&nbsp;";
            $link .= "<a href='javascript:void(0)' onclick='confirm_page(\"".site_url('transaksi/delete_miscell/'.$val->mis_code)."\",\"Data removed?\",\"".site_url('transaksi/miscell')."\")' class='delete' title='delete'></a>&nbsp;&nbsp;";
            $link .= "<a href='javascript:void(0)' onclick='new_page(\"".site_url('transaksi/miscell_bill/'.$val->mis_code)."\", 800)' class='print' title='print'></a>&nbsp;";
            
            $row[] = array('room'=>$val->gu_room,'guest'=> $val->gu_first.' '.$val->gu_middle.' '.$val->gu_last, 'deposit'=> format_idr($val->gu_deposit) , "balance"=> format_idr($val->gu_balance), 'in' => "$day, ".$val->gu_in, 'out' => "$out, ".$val->gu_out, "action" => $link);
        }
        $result['rows'] = $row;   
        echo json_encode($result);
    }
}

