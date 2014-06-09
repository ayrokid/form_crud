<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
  |--------------------------------------------------------------------------
  | Class Application 
  | Parent class from this application
  |--------------------------------------------------------------------------
 */
class Application extends CI_Controller {
    
    protected $subTitle;
    protected $data;
    protected $dataContent;
    protected $content;

    public function __construct() {
        parent::__construct();
        
        $this->load->library(array('system'));
        
    }
    
    /**
     * validation member login
     */
    public function valid_login(){
        if($this->session->userdata('login') <> 'true'){
            show_404();
        }
    }
    
    /**
     * validation admin
     */
    public function valid_admin(){
        if($this->session->userdata('level') <> 'A'){
            show_404();
        }
    }
    
    /**
     * @return HTML
     * @param type array
     */
    protected function view(){
        if(isset($this->subTitle)){
            $this->data['title'] = strtoupper($this->subTitle).' - '.name_system();
        }else{
            $this->data['title'] = name_system();
        }
        $this->data['subTitle']  = $this->subTitle;
        $this->data['data']      = $this->dataContent;
        $this->data['content']   = $this->content;
        return $this->load->view("template", $this->data);
    }

    /**
     * password encryption
     * @return String
     */
    protected function encrypt($str = "") {
        $pengacak = "AJWKXLAJSCLWLWDAKDKSAJDADKEOIJEOQWENQWENQONEQWAJSNDKASO";
        return md5($pengacak . md5($str) . $pengacak);        
    }

}
