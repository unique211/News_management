<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function index()
	{
		if (isset($this->session->userid)) {
			$this->session->unset_userdata('userid');
			//	$this->session->unset_userdata('role');  	
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('id');
		}
		$this->load->view('login');
		// $title['active_menu'] = "ind";
		// $this->load->view('index', $title);
	}

	public function login()
	{
		$this->load->view('login');
	}
	public function signup()
	{
		$this->load->view('signup');
	}
	public function forgot()
	{
		$this->load->view('forgot');
	}
	public function hotel()
	{
		if (isset($this->session->userid)) {

			$title['active_menu'] = "con";
			$this->load->view('hotel_master', $title);
		} else {
			redirect(base_url());
		}
		
	}
	public function master()
	{
		if (isset($this->session->userid)) {

			$title['active_menu'] = "master";
			$this->load->view('master', $title);
		} else {
			redirect(base_url());
		}
		
	}
	



	public function transaction()
	{
		if (isset($this->session->userid)) {

			$title['active_menu'] = "tra";	
		$this->load->view('transaction', $title);
		} else {
			redirect(base_url());
		}
		
	
	}
	public function report()
	{
		$title['active_menu'] = "report";
		$this->load->view('reports', $title);
	
	}
	public function dashboard()
	{


		$title['active_menu'] = "ind";
		$this->load->view('index', $title);
		// if (isset($this->session->userid)) {

		// 	$title['active_menu'] = "ind";
		// 	$this->load->view('index', $title);
		// } else {
		// 	redirect(base_url());
		// }
	}

	// public function birth_death()
	// {
	// if(isset($this->session->userid)){
	// $title['active_menu'] = "bir";
	// $this->load->view('birth_death',$title);
	// }
	// else{
	// redirect(base_url());
	// }

	// }




}
