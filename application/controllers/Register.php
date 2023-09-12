<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

	public function index()
	{
		$this->load->view('register');
    }

    public function proses()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $email = $this->input->post("email");
        $re_password = $this->input->post("re_password");
        $id_user_level = 1;
        $id = md5($username.$email.$password);

        if($password == $re_password)
        {
            $hasil = $this->m_user->pendaftaran_user($id, $username, $email, $password, $id_user_level);

            if($hasil==false){
                $this->session->set_flashdata('eror','eror');
                redirect('register/index');
			}else{
				$this->session->set_flashdata('input','input');
				redirect('login/index');
            }

        }else{
            $this->session->set_flashdata('password_err','password_err');
			redirect('register/index');
        }
        
    }
}