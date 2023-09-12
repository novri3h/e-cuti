<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}

    public function view_super_admin()
	{

	if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

		$data['pegawai'] = $this->m_user->get_all_pegawai()->result_array();
		$data['jenis_kelamin_p'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('super_admin/pegawai', $data);
		
	}else{

		$this->session->set_flashdata('loggin_err','loggin_err');
		redirect('Login/index');

	}

    }
    
	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {
			
			$data['pegawai'] = $this->m_user->get_all_pegawai()->result_array();
			$data['jenis_kelamin_p'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$this->load->view('admin/pegawai', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
	
		}
	}

	public function tambah_pegawai()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {

		$username = $this->input->post("username");
        $password = $this->input->post("password");
		$email = $this->input->post("email");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		$id_user_level = 1;
        $id = md5($username.$email.$password);

        
            $hasil = $this->m_user->insert_pegawai($id, $username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat);

            if($hasil==false){
                $this->session->set_flashdata('eror','eror');
                redirect('Pegawai/view_admin');
			}else{
				$this->session->set_flashdata('input','input');
				redirect('Pegawai/view_admin');
            }

     	}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
	
		}
	}

	public function edit_pegawai()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {

		$username = $this->input->post("username");
        $password = $this->input->post("password");
		$email = $this->input->post("email");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		$id_user_level = 1;
        $id = $this->input->post("id_user");

        
            $hasil = $this->m_user->update_pegawai($id, $username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Pegawai/view_admin');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Pegawai/view_admin');
			}
			
		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
	
		}
     
	}

	public function hapus_pegawai()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {
		
        	$id = $this->input->post("id_user");

        
            $hasil = $this->m_user->delete_pegawai($id);

            if($hasil==false){
                $this->session->set_flashdata('eror_hapus','eror_hapus');
                redirect('Pegawai/view_admin');
			}else{
				$this->session->set_flashdata('hapus','hapus');
				redirect('Pegawai/view_admin');
			}
			
		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
	
		}
	}

	public function super_admin_tambah_pegawai()
	{
	if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {
		$username = $this->input->post("username");
        $password = $this->input->post("password");
		$email = $this->input->post("email");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		$id_user_level = 1;
        $id = md5($username.$email.$password);

        
            $hasil = $this->m_user->insert_pegawai($id, $username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat);

            if($hasil==false){
                $this->session->set_flashdata('eror','eror');
                redirect('Pegawai/view_super_admin');
			}else{
				$this->session->set_flashdata('input','input');
				redirect('Pegawai/view_super_admin');
            }
		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
	
		}
     
	}

	public function super_admin_edit_pegawai()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

		$username = $this->input->post("username");
        $password = $this->input->post("password");
		$email = $this->input->post("email");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		$id_user_level = 1;
        $id = $this->input->post("id_user");

        
            $hasil = $this->m_user->update_pegawai($id, $username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Pegawai/view_super_admin');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Pegawai/view_super_admin');
            }

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
	
		}
	}

	public function super_admin_hapus_pegawai()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {
		
        	$id = $this->input->post("id_user");

        
            $hasil = $this->m_user->delete_pegawai($id);

            if($hasil==false){
                $this->session->set_flashdata('eror_hapus','eror_hapus');
                redirect('Pegawai/view_super_admin');
			}else{
				$this->session->set_flashdata('hapus','hapus');
				redirect('Pegawai/view_super_admin');
			}
			
			
		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
	
		}
	}
	
    
}