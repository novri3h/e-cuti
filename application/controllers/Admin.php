<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('m_user');
    }

    public function view_super_admin()
	{
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

        $data['admin_data'] = $this->m_user->get_all_admin()->result_array();

        $this->load->view('super_admin/admin', $data);
        
        }else{

            $this->session->set_flashdata('loggin_err','loggin_err');
            redirect('Login/index');

        }
        
        
    }

    public function tambah_admin()
    {

    if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {


        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $email = $this->input->post("email");
        $id_user_level = 2;
        $id = md5($username.$email.$password);

        
            $hasil = $this->m_user->pendaftaran_user($id, $username, $email, $password, $id_user_level);

            if($hasil==false){
                $this->session->set_flashdata('eror','eror');
                redirect('Admin/view_super_admin');
			}else{
				$this->session->set_flashdata('input','input');
				redirect('Admin/view_super_admin');
            }

    }else{

        $this->session->set_flashdata('loggin_err','loggin_err');
        redirect('Login/index');

    }

            
    }

    public function edit_admin()
    {

    if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

        $id_user = $this->input->post("id_user");
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $email = $this->input->post("email");
        $id_user_level = 2;

        
            $hasil = $this->m_user->update_user($id_user, $username, $email, $password, $id_user_level);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Admin/view_super_admin');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Admin/view_super_admin');
            }

    }else{

        $this->session->set_flashdata('loggin_err','loggin_err');
        redirect('Login/index');

    }

            
    }

    public function hapus_admin()
    {

    if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

        $id_user = $this->input->post("id_user");
        
            $hasil = $this->m_user->delete_admin($id_user);

            if($hasil==false){
                $this->session->set_flashdata('eror_hapus','eror_hapus');
                redirect('Admin/view_super_admin');
			}else{
				$this->session->set_flashdata('hapus','hapus');
				redirect('Admin/view_super_admin');
            }

    }else{

        $this->session->set_flashdata('loggin_err','loggin_err');
        redirect('Login/index');

    }

            
    }
    
		
    
}