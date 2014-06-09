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
            $link .= "<a href='javascript:void(0)' onclick='load_page(\"".site_url('artikel/edit/'.$val->arid)."\")' class='edit' title='edit'></a>&nbsp;&nbsp;";
            $link .= "<a href='javascript:void(0)' onclick='confirm_page(\"".site_url('artikel/delete/'.$val->arid)."\",\"Data removed?\",\"".site_url('artikel')."\")' class='delete' title='delete'></a>&nbsp;&nbsp;";
            
            $row[] = array("ar_title" => $val->ar_title, "date" => dateToIndo($val->ar_exp_date), "action" => $link);
        }
        $result['rows'] = $row;   
        echo json_encode($result);
    }
    
    function image(){
        //Check if we are getting the image
        if(isset($_FILES['image'])){
            //Get the image array of details
            $img = rand().$_FILES['image']["name"]; 
            //The new path of the uploaded image, rand is just used for the sake of it
            
            $path = "./upload/media/" . $img;
            //Move the file to our new path
            move_uploaded_file($_FILES['image']['tmp_name'],$path);
            //Get image info, reuiqred to biuld the JSON object
            $data = getimagesize($path);
            //The direct link to the uploaded image, this might varyu depending on your script location    
            $link = path_upload().$img;
            //Here we are constructing the JSON Object
            $res = array("upload" => array(
                                    "links" => array("original" => $link),
                                    "image" => array("width" => $data[0],
                                                     "height" => $data[1]
                                                    )                              
                        ));
            //echo out the response :)
            echo json_encode($res);
        }
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
    
    public function edit_miscell(){
        $code = anti_injection($this->uri->segment(3));
        $data['data']   = $this->mod_transaksi->getMiscell($code);
        $this->load->view("transaksi/editMiscell", $data);
    }
    
    public function delete_miscell(){
        $msg    = 'failed';
        $back   = 'false';
        $code = anti_injection($this->uri->segment(3));
        if($this->mod_transaksi->deleteMiscell($code) == true){
            $msg    = 'Successfully';
            $back   = 'true';
        }
        echo json_encode(array('msg' => $msg, 'back' => $back));
    }
    
}

