<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
		$this->load->model('m_cuti');
	}

	public function dashboard_super_admin()
	{
	if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

		$data['cuti'] = $this->m_cuti->count_all_cuti()->row_array();
		$data['cuti_acc'] = $this->m_cuti->count_all_cuti_acc()->row_array();
		$data['cuti_confirm'] = $this->m_cuti->count_all_cuti_confirm()->row_array();
		$data['cuti_reject'] = $this->m_cuti->count_all_cuti_reject()->row_array();
		$data['pegawai'] = $this->m_user->count_all_pegawai()->row_array();
		$data['admin'] = $this->m_user->count_all_admin()->row_array();
		$this->load->view('super_admin/dashboard', $data);

	}else{

		$this->session->set_flashdata('loggin_err','loggin_err');
		redirect('Login/index');

	}
	}

	public function dashboard_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {
			$data['cuti'] = $this->m_cuti->count_all_cuti()->row_array();
			$data['cuti_acc'] = $this->m_cuti->count_all_cuti_acc()->row_array();
			$data['cuti_confirm'] = $this->m_cuti->count_all_cuti_confirm()->row_array();
			$data['cuti_reject'] = $this->m_cuti->count_all_cuti_reject()->row_array();
			$data['pegawai'] = $this->m_user->count_all_pegawai()->row_array();
			$this->load->view('admin/dashboard', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
	
		}
	}
	
	public function dashboard_pegawai()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

			$data['cuti_pegawai'] = $this->m_cuti->get_all_cuti_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['cuti'] = $this->m_cuti->count_all_cuti_by_id($this->session->userdata('id_user'))->row_array();
			$data['cuti_acc'] = $this->m_cuti->count_all_cuti_acc_by_id($this->session->userdata('id_user'))->row_array();
			$data['cuti_confirm'] = $this->m_cuti->count_all_cuti_confirm_by_id($this->session->userdata('id_user'))->row_array();
			$data['cuti_reject'] = $this->m_cuti->count_all_cuti_reject_by_id($this->session->userdata('id_user'))->row_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			// echo var_dump($data);
			// die();
			$this->load->view('pegawai/dashboard', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
    }
    
}