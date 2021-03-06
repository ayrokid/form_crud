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
        $sort   = isset($_POST['sort']) ? strval($_POST['sort']) : 'arid';  
        $order  = isset($_POST['order']) ? strval($_POST['order']) : 'desc';  
        $offset = ($page-1)*$rows;  
        $row    = array();  
        $result = array();            
        $result["total"] = $this->sql->count_all('artikel');       
        $sql   = "SELECT * FROM artikel ORDER BY $sort $order LIMIT $rows OFFSET $offset";
        $hasil = $this->sql->select_result($sql);  
        foreach($hasil as $val){
            $link = "";
            $link .= anchor("artikel/edit/$val->arid", '&nbsp;', array('class'=>'edit')).'&nbsp;&nbsp;';
            $link .= "<a href='javascript:void(0)' onclick='confirm_page(\"".site_url('artikel/delete/'.$val->arid)."\",\"Data removed?\",\"".site_url('artikel')."\")' class='delete' title='delete'></a>&nbsp;&nbsp;";
            
            $row[] = array("ar_title" => $val->ar_title, "date" => dateToIndo($val->ar_exp_date), "action" => $link);
        }
        $result['rows'] = $row;   
        echo json_encode($result);
    }

    public function baru(){
        $this->subTitle = 'Artikel Baru';
        $this->content  = "artikel/new";
        $this->view();
    }
    
    public function save(){
        $msg    = 'gagal disimpan';
        $code   = $this->uri->segment(3);
        $arr    = array(
            'arid'        => $this->input->post('id'),
            'ar_title'    => filter_string($this->input->post('judul')),
            'ar_content'  => $this->input->post('content'),
            'ar_expired'  => $this->input->post('expired'),
            'ar_exp_date' => dateToIndo($this->input->post('date'))
        );
        if($this->common->saveArtikel($arr, $code) == true){
            $msg  = "berhasil disimpan";
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('artikel', 'refresh');
    }
    
    public function edit(){
        $code = filter_string($this->uri->segment(3));
        $this->subTitle = 'Ubah Artikel';
        $this->content  = "artikel/edit";
        $this->dataContent = $this->sql->select_row("SELECT * FROM artikel where arid=$code limit 1 ");
        $this->view();
    }
    
    public function delete(){
        $msg    = 'failed';
        $back   = 'false';
        $code   = filter_string($this->uri->segment(3));
        $sql    = "DELETE FROM artikel where arid=$code ";
        if($this->sql->delete($sql) == true){
            $msg    = 'Successfully';
            $back   = 'true';
        }
        echo json_encode(array('msg' => $msg, 'back' => $back));
    }
    
    public function views(){
        $this->subTitle = 'Lihat Artikel';
        $this->content  = "artikel/view";
        $this->dataContent = $this->sql->select_result("SELECT * FROM artikel ORDER BY arid DESC ");
        $this->view();
    }
    
}

