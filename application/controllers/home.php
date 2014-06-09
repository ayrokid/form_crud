<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Application {

        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            if($this->session->userdata('login') == FALSE)
            {
                    $this->requestLogin();
            }
            else
            {
                    redirect(site_url('transaksi/guest_list'),'refresh');
            }      
        }	
	
    	private function requestLogin()
    	{
                $this->load->model('common');
                $this->form_validation->set_rules('username','Username','trim|required');
                $this->form_validation->set_rules('password','Password','trim|required');
                if($this->form_validation->run() == TRUE)
                {
                        $username   =   anti_injection($this->input->post('username'));
                        $password   =   trim($this->input->post('password'));

                        if($this->common->checkUser($username, $password) == TRUE)
                        {
                                $data	=   $this->common->getUser($username);
                                $this->session->set_userdata(array('username' => $data->username, 'level' => $data->level, 'login' => 'true'));

                                redirect(site_url(), 'refresh');
                        }
                        else
                        {
                                $this->session->set_flashdata("msg", "Login failed.!");
                                redirect("home");
                        }
                }
                else
                {
                        $this->load->view('login');
                }
    	}
        
        public function logout()
        {
            $this->session->unset_userdata(array('login','level','username'));
            $this->session->sess_destroy();
            redirect(base_url(), 'refresh');
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */